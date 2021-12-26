@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.setting.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.settings.update", [$setting->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.setting.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $setting->name) }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.setting.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="logo">{{ trans('cruds.setting.fields.logo') }}</label>
                            <div class="needsclick dropzone" id="logo-dropzone">
                            </div>
                            @if($errors->has('logo'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('logo') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.setting.fields.logo_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="phone">{{ trans('cruds.setting.fields.phone') }}</label>
                            <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone', $setting->phone) }}">
                            @if($errors->has('phone'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('phone') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.setting.fields.phone_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="address">{{ trans('cruds.setting.fields.address') }}</label>
                            <input class="form-control" type="text" name="address" id="address" value="{{ old('address', $setting->address) }}">
                            @if($errors->has('address'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('address') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.setting.fields.address_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="vk">{{ trans('cruds.setting.fields.vk') }}</label>
                            <input class="form-control" type="text" name="vk" id="vk" value="{{ old('vk', $setting->vk) }}">
                            @if($errors->has('vk'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('vk') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.setting.fields.vk_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="instagram">{{ trans('cruds.setting.fields.instagram') }}</label>
                            <input class="form-control" type="text" name="instagram" id="instagram" value="{{ old('instagram', $setting->instagram) }}">
                            @if($errors->has('instagram'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('instagram') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.setting.fields.instagram_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="youtube">{{ trans('cruds.setting.fields.youtube') }}</label>
                            <input class="form-control" type="text" name="youtube" id="youtube" value="{{ old('youtube', $setting->youtube) }}">
                            @if($errors->has('youtube'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('youtube') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.setting.fields.youtube_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="telegram">{{ trans('cruds.setting.fields.telegram') }}</label>
                            <input class="form-control" type="text" name="telegram" id="telegram" value="{{ old('telegram', $setting->telegram) }}">
                            @if($errors->has('telegram'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('telegram') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.setting.fields.telegram_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="whats_app">{{ trans('cruds.setting.fields.whats_app') }}</label>
                            <input class="form-control" type="text" name="whats_app" id="whats_app" value="{{ old('whats_app', $setting->whats_app) }}">
                            @if($errors->has('whats_app'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('whats_app') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.setting.fields.whats_app_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="vyber">{{ trans('cruds.setting.fields.vyber') }}</label>
                            <input class="form-control" type="text" name="vyber" id="vyber" value="{{ old('vyber', $setting->vyber) }}">
                            @if($errors->has('vyber'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('vyber') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.setting.fields.vyber_helper') }}</span>
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
    Dropzone.options.logoDropzone = {
    url: '{{ route('frontend.settings.storeMedia') }}',
    maxFilesize: 100, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 100,
      width: 8192,
      height: 8192
    },
    success: function (file, response) {
      $('form').find('input[name="logo"]').remove()
      $('form').append('<input type="hidden" name="logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($setting) && $setting->logo)
      var file = {!! json_encode($setting->logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="logo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
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