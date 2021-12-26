@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.size.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sizes.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.size.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.size.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="multiplier">{{ trans('cruds.size.fields.multiplier') }}</label>
                <input class="form-control {{ $errors->has('multiplier') ? 'is-invalid' : '' }}" type="number" name="multiplier" id="multiplier" value="{{ old('multiplier', '') }}" step="1" required>
                @if($errors->has('multiplier'))
                    <div class="invalid-feedback">
                        {{ $errors->first('multiplier') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.size.fields.multiplier_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection