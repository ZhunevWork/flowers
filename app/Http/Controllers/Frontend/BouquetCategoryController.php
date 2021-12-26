<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBouquetCategoryRequest;
use App\Http\Requests\StoreBouquetCategoryRequest;
use App\Http\Requests\UpdateBouquetCategoryRequest;
use App\Models\BouquetCategory;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class BouquetCategoryController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('bouquet_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bouquetCategories = BouquetCategory::with(['media'])->get();

        return view('frontend.bouquetCategories.index', compact('bouquetCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('bouquet_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.bouquetCategories.create');
    }

    public function store(StoreBouquetCategoryRequest $request)
    {
        $bouquetCategory = BouquetCategory::create($request->all());

        if ($request->input('image', false)) {
            $bouquetCategory->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $bouquetCategory->id]);
        }

        return redirect()->route('frontend.bouquet-categories.index');
    }

    public function edit(BouquetCategory $bouquetCategory)
    {
        abort_if(Gate::denies('bouquet_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.bouquetCategories.edit', compact('bouquetCategory'));
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

        return redirect()->route('frontend.bouquet-categories.index');
    }

    public function show(BouquetCategory $bouquetCategory)
    {
        abort_if(Gate::denies('bouquet_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.bouquetCategories.show', compact('bouquetCategory'));
    }

    public function destroy(BouquetCategory $bouquetCategory)
    {
        abort_if(Gate::denies('bouquet_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bouquetCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyBouquetCategoryRequest $request)
    {
        BouquetCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('bouquet_category_create') && Gate::denies('bouquet_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new BouquetCategory();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
