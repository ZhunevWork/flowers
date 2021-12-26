<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreBouquetRequest;
use App\Http\Requests\UpdateBouquetRequest;
use App\Http\Resources\Admin\BouquetResource;
use App\Models\Bouquet;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BouquetApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('bouquet_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BouquetResource(Bouquet::with(['elements', 'sizes', 'bouquetcategories', 'colors', 'events'])->get());
    }

    public function store(StoreBouquetRequest $request)
    {
        $bouquet = Bouquet::create($request->all());
        $bouquet->elements()->sync($request->input('elements', []));
        $bouquet->sizes()->sync($request->input('sizes', []));
        $bouquet->bouquetcategories()->sync($request->input('bouquetcategories', []));
        $bouquet->colors()->sync($request->input('colors', []));
        $bouquet->events()->sync($request->input('events', []));
        foreach ($request->input('images', []) as $file) {
            $bouquet->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('images');
        }

        return (new BouquetResource($bouquet))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Bouquet $bouquet)
    {
        abort_if(Gate::denies('bouquet_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BouquetResource($bouquet->load(['elements', 'sizes', 'bouquetcategories', 'colors', 'events']));
    }

    public function update(UpdateBouquetRequest $request, Bouquet $bouquet)
    {
        $bouquet->update($request->all());
        $bouquet->elements()->sync($request->input('elements', []));
        $bouquet->sizes()->sync($request->input('sizes', []));
        $bouquet->bouquetcategories()->sync($request->input('bouquetcategories', []));
        $bouquet->colors()->sync($request->input('colors', []));
        $bouquet->events()->sync($request->input('events', []));
        if (count($bouquet->images) > 0) {
            foreach ($bouquet->images as $media) {
                if (!in_array($media->file_name, $request->input('images', []))) {
                    $media->delete();
                }
            }
        }
        $media = $bouquet->images->pluck('file_name')->toArray();
        foreach ($request->input('images', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $bouquet->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('images');
            }
        }

        return (new BouquetResource($bouquet))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Bouquet $bouquet)
    {
        abort_if(Gate::denies('bouquet_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bouquet->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
