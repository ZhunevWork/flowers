<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreBouquetCategoryRequest;
use App\Http\Requests\UpdateBouquetCategoryRequest;
use App\Http\Resources\Admin\BouquetCategoryResource;
use App\Models\BouquetCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BouquetCategoryApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('bouquet_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BouquetCategoryResource(BouquetCategory::all());
    }

    public function store(StoreBouquetCategoryRequest $request)
    {
        $bouquetCategory = BouquetCategory::create($request->all());

        if ($request->input('image', false)) {
            $bouquetCategory->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        return (new BouquetCategoryResource($bouquetCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(BouquetCategory $bouquetCategory)
    {
        abort_if(Gate::denies('bouquet_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BouquetCategoryResource($bouquetCategory);
    }

    public function update(UpdateBouquetCategoryRequest $request, BouquetCategory $bouquetCategory)
    {
        $bouquetCategory->update($request->all());

        if ($request->input('image', false)) {
            if (!$bouquetCategory->image || $request->input('image') !== $bouquetCategory->image->file_name) {
                if ($bouquetCategory->image) {
                    $bouquetCategory->image->delete();
                }
                $bouquetCategory->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($bouquetCategory->image) {
            $bouquetCategory->image->delete();
        }

        return (new BouquetCategoryResource($bouquetCategory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(BouquetCategory $bouquetCategory)
    {
        abort_if(Gate::denies('bouquet_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bouquetCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
