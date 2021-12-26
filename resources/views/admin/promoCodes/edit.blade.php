@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.promoCode.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.promo-codes.update", [$promoCode->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="code">{{ trans('cruds.promoCode.fields.code') }}</label>
                <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code', $promoCode->code) }}" required>
                @if($errors->has('code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.promoCode.fields.code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.promoCode.fields.type') }}</label>
                <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type" required>
                    <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\PromoCode::TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('type', $promoCode->type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
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
                <input class="form-control {{ $errors->has('summ') ? 'is-invalid' : '' }}" type="number" name="summ" id="summ" value="{{ old('summ', $promoCode->summ) }}" step="1">
                @if($errors->has('summ'))
                    <div class="invalid-feedback">
                        {{ $errors->first('summ') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.promoCode.fields.summ_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="percent">{{ trans('cruds.promoCode.fields.percent') }}</label>
                <input class="form-control {{ $errors->has('percent') ? 'is-invalid' : '' }}" type="number" name="percent" id="percent" value="{{ old('percent', $promoCode->percent) }}" step="1">
                @if($errors->has('percent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('percent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.promoCode.fields.percent_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_active') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" {{ $promoCode->is_active || old('is_active', 0) === 1 ? 'checked' : '' }} required>
                    <label class="required form-check-label" for="is_active">{{ trans('cruds.promoCode.fields.is_active') }}</label>
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
                <input class="form-control date {{ $errors->has('active_until') ? 'is-invalid' : '' }}" type="text" name="active_until" id="active_until" value="{{ old('active_until', $promoCode->active_until) }}" required>
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



@endsection