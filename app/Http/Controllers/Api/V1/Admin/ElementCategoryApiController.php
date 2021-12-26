<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreElementCategoryRequest;
use App\Http\Requests\UpdateElementCategoryRequest;
use App\Http\Resources\Admin\ElementCategoryResource;
use App\Models\ElementCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ElementCategoryApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('element_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ElementCategoryResource(ElementCategory::all());
    }

    public function store(StoreElementCategoryRequest $request)
    {
        $elementCategory = ElementCategory::create($request->all());

        if ($request->input('image', false)) {
            $elementCategory->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        return (new ElementCategoryResource($elementCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ElementCategory $elementCategory)
    {
        abort_if(Gate::denies('element_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ElementCategoryResource($elementCategory);
    }

    public function update(UpdateElementCategoryRequest $request, ElementCategory $elementCategory)
    {
        $elementCategory->update($request->all());

        if ($request->input('image', false)) {
            if (!$elementCategory->image || $request->input('image') !== $elementCategory->image->file_name) {
                if ($elementCategory->image) {
                    $elementCategory->image->delete();
                }
                $elementCategory->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($elementCategory->image) {
            $elementCategory->image->delete();
        }

        return (new ElementCategoryResource($elementCategory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ElementCategory $elementCategory)
    {
        abort_if(Gate::denies('element_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $elementCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
