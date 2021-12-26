<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreElementRequest;
use App\Http\Requests\UpdateElementRequest;
use App\Http\Resources\Admin\ElementResource;
use App\Models\Element;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ElementApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('element_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ElementResource(Element::with(['categories', 'colors'])->get());
    }

    public function store(StoreElementRequest $request)
    {
        $element = Element::create($request->all());
        $element->categories()->sync($request->input('categories', []));
        $element->colors()->sync($request->input('colors', []));
        if ($request->input('image', false)) {
            $element->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        return (new ElementResource($element))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Element $element)
    {
        abort_if(Gate::denies('element_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ElementResource($element->load(['categories', 'colors']));
    }

    public function update(UpdateElementRequest $request, Element $element)
    {
        $element->update($request->all());
        $element->categories()->sync($request->input('categories', []));
        $element->colors()->sync($request->input('colors', []));
        if ($request->input('image', false)) {
            if (!$element->image || $request->input('image') !== $element->image->file_name) {
                if ($element->image) {
                    $element->image->delete();
                }
                $element->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($element->image) {
            $element->image->delete();
        }

        return (new ElementResource($element))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Element $element)
    {
        abort_if(Gate::denies('element_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $element->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
