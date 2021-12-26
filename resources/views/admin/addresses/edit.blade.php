@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.address.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.addresses.update", [$address->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="city">{{ trans('cruds.address.fields.city') }}</label>
                <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" value="{{ old('city', $address->city) }}">
                @if($errors->has('city'))
                    <div class="invalid-feedback">
                        {{ $errors->first('city') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.city_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="street">{{ trans('cruds.address.fields.street') }}</label>
                <input class="form-control {{ $errors->has('street') ? 'is-invalid' : '' }}" type="text" name="street" id="street" value="{{ old('street', $address->street) }}">
                @if($errors->has('street'))
                    <div class="invalid-feedback">
                        {{ $errors->first('street') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.street_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="home">{{ trans('cruds.address.fields.home') }}</label>
                <input class="form-control {{ $errors->has('home') ? 'is-invalid' : '' }}" type="text" name="home" id="home" value="{{ old('home', $address->home) }}">
                @if($errors->has('home'))
                    <div class="invalid-feedback">
                        {{ $errors->first('home') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.home_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="entrance">{{ trans('cruds.address.fields.entrance') }}</label>
                <input class="form-control {{ $errors->has('entrance') ? 'is-invalid' : '' }}" type="text" name="entrance" id="entrance" value="{{ old('entrance', $address->entrance) }}">
                @if($errors->has('entrance'))
                    <div class="invalid-feedback">
                        {{ $errors->first('entrance') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.entrance_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="floor">{{ trans('cruds.address.fields.floor') }}</label>
                <input class="form-control {{ $errors->has('floor') ? 'is-invalid' : '' }}" type="text" name="floor" id="floor" value="{{ old('floor', $address->floor) }}">
                @if($errors->has('floor'))
                    <div class="invalid-feedback">
                        {{ $errors->first('floor') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.floor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="apartment">{{ trans('cruds.address.fields.apartment') }}</label>
                <input class="form-control {{ $errors->has('apartment') ? 'is-invalid' : '' }}" type="text" name="apartment" id="apartment" value="{{ old('apartment', $address->apartment) }}">
                @if($errors->has('apartment'))
                    <div class="invalid-feedback">
                        {{ $errors->first('apartment') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.apartment_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="intercom">{{ trans('cruds.address.fields.intercom') }}</label>
                <input class="form-control {{ $errors->has('intercom') ? 'is-invalid' : '' }}" type="text" name="intercom" id="intercom" value="{{ old('intercom', $address->intercom) }}">
                @if($errors->has('intercom'))
                    <div class="invalid-feedback">
                        {{ $errors->first('intercom') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.intercom_helper') }}</span>
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