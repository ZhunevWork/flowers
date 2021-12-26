@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.address.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.addresses.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="city">{{ trans('cruds.address.fields.city') }}</label>
                            <input class="form-control" type="text" name="city" id="city" value="{{ old('city', '') }}">
                            @if($errors->has('city'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('city') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.address.fields.city_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="street">{{ trans('cruds.address.fields.street') }}</label>
                            <input class="form-control" type="text" name="street" id="street" value="{{ old('street', '') }}">
                            @if($errors->has('street'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('street') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.address.fields.street_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="home">{{ trans('cruds.address.fields.home') }}</label>
                            <input class="form-control" type="text" name="home" id="home" value="{{ old('home', '') }}">
                            @if($errors->has('home'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('home') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.address.fields.home_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="entrance">{{ trans('cruds.address.fields.entrance') }}</label>
                            <input class="form-control" type="text" name="entrance" id="entrance" value="{{ old('entrance', '') }}">
                            @if($errors->has('entrance'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('entrance') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.address.fields.entrance_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="floor">{{ trans('cruds.address.fields.floor') }}</label>
                            <input class="form-control" type="text" name="floor" id="floor" value="{{ old('floor', '') }}">
                            @if($errors->has('floor'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('floor') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.address.fields.floor_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="apartment">{{ trans('cruds.address.fields.apartment') }}</label>
                            <input class="form-control" type="text" name="apartment" id="apartment" value="{{ old('apartment', '') }}">
                            @if($errors->has('apartment'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('apartment') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.address.fields.apartment_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="intercom">{{ trans('cruds.address.fields.intercom') }}</label>
                            <input class="form-control" type="text" name="intercom" id="intercom" value="{{ old('intercom', '') }}">
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

        </div>
    </div>
</div>
@endsection