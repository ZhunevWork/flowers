@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.deliveryPeriod.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.delivery-periods.update", [$deliveryPeriod->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="start">{{ trans('cruds.deliveryPeriod.fields.start') }}</label>
                            <input class="form-control date" type="text" name="start" id="start" value="{{ old('start', $deliveryPeriod->start) }}" required>
                            @if($errors->has('start'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('start') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.deliveryPeriod.fields.start_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="end">{{ trans('cruds.deliveryPeriod.fields.end') }}</label>
                            <input class="form-control date" type="text" name="end" id="end" value="{{ old('end', $deliveryPeriod->end) }}" required>
                            @if($errors->has('end'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('end') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.deliveryPeriod.fields.end_helper') }}</span>
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