<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyElementCategoryRequest;
use App\Http\Requests\StoreElementCategoryRequest;
use App\Http\Requests\UpdateElementCategoryRequest;
use App\Models\ElementCategory;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ElementCategoryController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('element_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $elementCategories = ElementCategory::with(['media'])->get();

        return view('admin.elementCategories.index', compact('elementCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('element_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.elementCategories.create');
    }

    public function store(StoreElementCategoryRequest $request)
    {
        $elementCategory = ElementCategory::create($request->all());

        if ($request->input('image', false)) {
            $elementCategory->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $elementCategory->id]);
        }

        return redirect()->route('admin.element-categories.index');
    }

    public function edit(ElementCategory $elementCategory)
    {
        abort_if(Gate::denies('element_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.elementCategories.edit', compact('elementCategory'));
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

        return redirect()->route('admin.element-categories.index');
    }

    public function show(ElementCategory $elementCategory)
    {
        abort_if(Gate::denies('element_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.elementCategories.show', compact('elementCategory'));
    }

    public function destroy(ElementCategory $elementCategory)
    {
        abort_if(Gate::denies('element_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $elementCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyElementCategoryRequest $request)
    {
        ElementCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('element_category_create') && Gate::denies('element_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ElementCategory();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
