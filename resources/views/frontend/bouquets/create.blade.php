@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.bouquet.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.bouquets.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="name">{{ trans('cruds.bouquet.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}">
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.bouquet.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="description">{{ trans('cruds.bouquet.fields.description') }}</label>
                            <textarea class="form-control" name="description" id="description">{{ old('description') }}</textarea>
                            @if($errors->has('description'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.bouquet.fields.description_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="durability">{{ trans('cruds.bouquet.fields.durability') }}</label>
                            <textarea class="form-control" name="durability" id="durability">{{ old('durability') }}</textarea>
                            @if($errors->has('durability'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('durability') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.bouquet.fields.durability_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="elements">{{ trans('cruds.bouquet.fields.element') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="elements[]" id="elements" multiple required>
                                @foreach($elements as $id => $element)
                                    <option value="{{ $id }}" {{ in_array($id, old('elements', [])) ? 'selected' : '' }}>{{ $element }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('elements'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('elements') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.bouquet.fields.element_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="sizes">{{ trans('cruds.bouquet.fields.size') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="sizes[]" id="sizes" multiple required>
                                @foreach($sizes as $id => $size)
                                    <option value="{{ $id }}" {{ in_array($id, old('sizes', [])) ? 'selected' : '' }}>{{ $size }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('sizes'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sizes') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.bouquet.fields.size_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="bouquetcategories">{{ trans('cruds.bouquet.fields.bouquetcategory') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="bouquetcategories[]" id="bouquetcategories" multiple>
                                @foreach($bouquetcategories as $id => $bouquetcategory)
                                    <option value="{{ $id }}" {{ in_array($id, old('bouquetcategories', [])) ? 'selected' : '' }}>{{ $bouquetcategory }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('bouquetcategories'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('bouquetcategories') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.bouquet.fields.bouquetcategory_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="colors">{{ trans('cruds.bouquet.fields.color') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="colors[]" id="colors" multiple>
                                @foreach($colors as $id => $color)
                                    <option value="{{ $id }}" {{ in_array($id, old('colors', [])) ? 'selected' : '' }}>{{ $color }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('colors'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('colors') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.bouquet.fields.color_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="events">{{ trans('cruds.bouquet.fields.event') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="events[]" id="events" multiple>
                                @foreach($events as $id => $event)
                                    <option value="{{ $id }}" {{ in_array($id, old('events', [])) ? 'selected' : '' }}>{{ $event }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('events'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('events') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.bouquet.fields.event_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="height">{{ trans('cruds.bouquet.fields.height') }}</label>
                            <input class="form-control" type="number" name="height" id="height" value="{{ old('height', '') }}" step="1">
                            @if($errors->has('height'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('height') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.bouquet.fields.height_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="all_size">{{ trans('cruds.bouquet.fields.all_size') }}</label>
                            <input class="form-control" type="text" name="all_size" id="all_size" value="{{ old('all_size', '') }}">
                            @if($errors->has('all_size'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('all_size') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.bouquet.fields.all_size_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="price">{{ trans('cruds.bouquet.fields.price') }}</label>
                            <input class="form-control" type="number" name="price" id="price" value="{{ old('price', '') }}" step="1">
                            @if($errors->has('price'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('price') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.bouquet.fields.price_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="discount_price">{{ trans('cruds.bouquet.fields.discount_price') }}</label>
                            <input class="form-control" type="number" name="discount_price" id="discount_price" value="{{ old('discount_price', '') }}" step="1">
                            @if($errors->has('discount_price'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('discount_price') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.bouquet.fields.discount_price_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="in_stock" value="0">
                                <input type="checkbox" name="in_stock" id="in_stock" value="1" {{ old('in_stock', 0) == 1 || old('in_stock') === null ? 'checked' : '' }}>
                                <label for="in_stock">{{ trans('cruds.bouquet.fields.in_stock') }}</label>
                            </div>
                            @if($errors->has('in_stock'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('in_stock') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.bouquet.fields.in_stock_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="images">{{ trans('cruds.bouquet.fields.images') }}</label>
                            <div class="needsclick dropzone" id="images-dropzone">
                            </div>
                            @if($errors->has('images'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('images') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.bouquet.fields.images_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    var uploadedImagesMap = {}
Dropzone.options.imagesDropzone = {
    url: '{{ route('frontend.bouquets.storeMedia') }}',
    maxFilesize: 500, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 500,
      width: 8192,
      height: 8192
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="images[]" value="' + response.name + '">')
      uploadedImagesMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedImagesMap[file.name]
      }
      $('form').find('input[name="images[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($bouquet) && $bouquet->images)
      var files = {!! json_encode($bouquet->images) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="images[]" value="' + file.file_name + '">')
        }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection