@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.promoCode.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.promo-codes.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="code">{{ trans('cruds.promoCode.fields.code') }}</label>
                            <input class="form-control" type="text" name="code" id="code" value="{{ old('code', '') }}" required>
                            @if($errors->has('code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('code') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.promoCode.fields.code_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.promoCode.fields.type') }}</label>
                            <select class="form-control" name="type" id="type" required>
                                <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\PromoCode::TYPE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('type', 'summ') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.promoCode.fields.type_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="summ">{{ trans('cruds.promoCode.fields.summ') }}</label>
                            <input class="form-control" type="number" name="summ" id="summ" value="{{ old('summ', '') }}" step="1">
                            @if($errors->has('summ'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('summ') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.promoCode.fields.summ_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="percent">{{ trans('cruds.promoCode.fields.percent') }}</label>
                            <input class="form-control" type="number" name="percent" id="percent" value="{{ old('percent', '') }}" step="1">
                            @if($errors->has('percent'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('percent') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.promoCode.fields.percent_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="checkbox" name="is_active" id="is_active" value="1" required {{ old('is_active', 0) == 1 || old('is_active') === null ? 'checked' : '' }}>
                                <label class="required" for="is_active">{{ trans('cruds.promoCode.fields.is_active') }}</label>
                            </div>
                            @if($errors->has('is_active'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('is_active') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.promoCode.fields.is_active_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="active_until">{{ trans('cruds.promoCode.fields.active_until') }}</label>
                            <input class="form-control date" type="text" name="active_until" id="active_until" value="{{ old('active_until') }}" required>
                            @if($errors->has('active_until'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('active_until') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.promoCode.fields.active_until_helper') }}</span>
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