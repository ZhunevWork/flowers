<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyElementRequest;
use App\Http\Requests\StoreElementRequest;
use App\Http\Requests\UpdateElementRequest;
use App\Models\Color;
use App\Models\Element;
use App\Models\ElementCategory;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ElementController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('element_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $elements = Element::with(['categories', 'colors', 'media'])->get();

        return view('admin.elements.index', compact('elements'));
    }

    public function create()
    {
        abort_if(Gate::denies('element_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = ElementCategory::pluck('name', 'id');

        $colors = Color::pluck('name', 'id');

        return view('admin.elements.create', compact('categories', 'colors'));
    }

    public function store(StoreElementRequest $request)
    {
        $element = Element::create($request->all());
        $element->categories()->sync($request->input('categories', []));
        $element->colors()->sync($request->input('colors', []));
        if ($request->input('image', false)) {
            $element->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $element->id]);
        }

        return redirect()->route('admin.elements.index');
    }

    public function edit(Element $element)
    {
        abort_if(Gate::denies('element_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = ElementCategory::pluck('name', 'id');

        $colors = Color::pluck('name', 'id');

        $element->load('categories', 'colors');

        return view('admin.elements.edit', compact('categories', 'colors', 'element'));
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

        return redirect()->route('admin.elements.index');
    }

    public function show(Element $element)
    {
        abort_if(Gate::denies('element_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $element->load('categories', 'colors');

        return view('admin.elements.show', compact('element'));
    }

    public function destroy(Element $element)
    {
        abort_if(Gate::denies('element_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $element->delete();

        return back();
    }

    public function massDestroy(MassDestroyElementRequest $request)
    {
        Element::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('element_create') && Gate::denies('element_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Element();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
