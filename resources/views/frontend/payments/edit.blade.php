@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.payment.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.payments.update", [$payment->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="transaction">{{ trans('cruds.payment.fields.transaction') }}</label>
                            <input class="form-control" type="text" name="transaction" id="transaction" value="{{ old('transaction', $payment->transaction) }}">
                            @if($errors->has('transaction'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('transaction') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.payment.fields.transaction_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="summ">{{ trans('cruds.payment.fields.summ') }}</label>
                            <input class="form-control" type="number" name="summ" id="summ" value="{{ old('summ', $payment->summ) }}" step="1" required>
                            @if($errors->has('summ'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('summ') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.payment.fields.summ_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.payment.fields.status') }}</label>
                            <select class="form-control" name="status" id="status" required>
                                <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Payment::STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('status', $payment->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.payment.fields.status_helper') }}</span>
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