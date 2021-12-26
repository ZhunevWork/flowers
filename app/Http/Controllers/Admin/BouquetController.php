<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBouquetRequest;
use App\Http\Requests\StoreBouquetRequest;
use App\Http\Requests\UpdateBouquetRequest;
use App\Models\Bouquet;
use App\Models\BouquetCategory;
use App\Models\Color;
use App\Models\Element;
use App\Models\Event;
use App\Models\Size;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class BouquetController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('bouquet_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bouquets = Bouquet::with(['elements', 'sizes', 'bouquetcategories', 'colors', 'events', 'media'])->get();

        return view('admin.bouquets.index', compact('bouquets'));
    }

    public function create()
    {
        abort_if(Gate::denies('bouquet_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $elements = Element::pluck('name', 'id');

        $sizes = Size::pluck('name', 'id');

        $bouquetcategories = BouquetCategory::pluck('name', 'id');

        $colors = Color::pluck('name', 'id');

        $events = Event::pluck('name', 'id');

        return view('admin.bouquets.create', compact('elements', 'sizes', 'bouquetcategories', 'colors', 'events'));
    }

    public function store(StoreBouquetRequest $request)
    {
        $bouquet = Bouquet::create($request->all());
        //////////////////////////////////////////////////////////////
        $elements = $request->input('ids', []);
        $counts = $request->input('counts', []);

        foreach ($elements as $j => $element) {
            foreach ($counts as $key => $count){
                if ($j == $key) {
                    $bouquet->elements()->attach($element, ['count' => $count]);
                }
            }
        }
        //////////////////////////////////////////////////////////////
        $bouquet->sizes()->sync($request->input('sizes', []));
        $bouquet->bouquetcategories()->sync($request->input('bouquetcategories', []));
        $bouquet->colors()->sync($request->input('colors', []));
        $bouquet->events()->sync($request->input('events', []));
        foreach ($request->input('images', []) as $file) {
            $bouquet->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('images');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $bouquet->id]);
        }

        return redirect()->route('admin.bouquets.index');
    }

    public function edit(Bouquet $bouquet)
    {
        abort_if(Gate::denies('bouquet_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $elements = Element::pluck('name', 'id', 'pivot_bouquet_id', 'pivot_element_id', 'pivot_count');

        $sizes = Size::pluck('name', 'id');

        $bouquetcategories = BouquetCategory::pluck('name', 'id');

        $colors = Color::pluck('name', 'id');

        $events = Event::pluck('name', 'id');

        $bouquet->load('elements', 'sizes', 'bouquetcategories', 'colors', 'events');

        $els = $bouquet->elements()->get();

        $counts = collect();

        foreach ( $els as $el) {
            $counts->push(['id' => $el->pivot->element_id, 'name' => $el->name, 'count' => $el->pivot->count]);
        }

        return view('admin.bouquets.edit', compact('elements', 'sizes', 'bouquetcategories', 'colors', 'events', 'bouquet', 'counts'));
    }

    public function update(UpdateBouquetRequest $request, Bouquet $bouquet)
    {
        $bouquet->update($request->all());
//        $bouquet->elements()->sync($request->input('elements', []));
        //////////////////////////////////////////////////////////////
        $bouquet->elements()->detach();
        $elements = $request->input('ids', []);
        $counts = $request->input('counts', []);

        foreach ($elements as $j => $element) {
            foreach ($counts as $key => $count){
                if ($j == $key) {
                    $bouquet->elements()->attach($element, ['count' => $count]);
                }
            }
        }
        //////////////////////////////////////////////////////////////
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

        return redirect()->route('admin.bouquets.index');
    }

    public function show(Bouquet $bouquet)
    {
        abort_if(Gate::denies('bouquet_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bouquet->load('elements', 'sizes', 'bouquetcategories', 'colors', 'events');

        return view('admin.bouquets.show', compact('bouquet'));
    }

    public function destroy(Bouquet $bouquet)
    {
        abort_if(Gate::denies('bouquet_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bouquet->delete();

        return back();
    }

    public function massDestroy(MassDestroyBouquetRequest $request)
    {
        Bouquet::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('bouquet_create') && Gate::denies('bouquet_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Bouquet();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
