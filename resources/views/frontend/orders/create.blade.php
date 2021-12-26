@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.order.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.orders.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="user_id">{{ trans('cruds.order.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id">
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="offers">{{ trans('cruds.order.fields.offers') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="offers[]" id="offers" multiple>
                                @foreach($offers as $id => $offer)
                                    <option value="{{ $id }}" {{ in_array($id, old('offers', [])) ? 'selected' : '' }}>{{ $offer }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('offers'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('offers') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.offers_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="sub_total">{{ trans('cruds.order.fields.sub_total') }}</label>
                            <input class="form-control" type="number" name="sub_total" id="sub_total" value="{{ old('sub_total', '') }}" step="1">
                            @if($errors->has('sub_total'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sub_total') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.sub_total_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="delivery">{{ trans('cruds.order.fields.delivery') }}</label>
                            <input class="form-control" type="number" name="delivery" id="delivery" value="{{ old('delivery', '') }}" step="1">
                            @if($errors->has('delivery'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('delivery') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.delivery_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="discount">{{ trans('cruds.order.fields.discount') }}</label>
                            <input class="form-control" type="number" name="discount" id="discount" value="{{ old('discount', '') }}" step="1">
                            @if($errors->has('discount'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('discount') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.discount_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="promocode_id">{{ trans('cruds.order.fields.promocode') }}</label>
                            <select class="form-control select2" name="promocode_id" id="promocode_id">
                                @foreach($promocodes as $id => $entry)
                                    <option value="{{ $id }}" {{ old('promocode_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('promocode'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('promocode') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.promocode_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="total">{{ trans('cruds.order.fields.total') }}</label>
                            <input class="form-control" type="number" name="total" id="total" value="{{ old('total', '') }}" step="1">
                            @if($errors->has('total'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('total') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.total_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="status_id">{{ trans('cruds.order.fields.status') }}</label>
                            <select class="form-control select2" name="status_id" id="status_id">
                                @foreach($statuses as $id => $entry)
                                    <option value="{{ $id }}" {{ old('status_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="payment_id">{{ trans('cruds.order.fields.payment') }}</label>
                            <select class="form-control select2" name="payment_id" id="payment_id">
                                @foreach($payments as $id => $entry)
                                    <option value="{{ $id }}" {{ old('payment_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('payment'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('payment') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.payment_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="delivery_data">{{ trans('cruds.order.fields.delivery_data') }}</label>
                            <input class="form-control date" type="text" name="delivery_data" id="delivery_data" value="{{ old('delivery_data') }}">
                            @if($errors->has('delivery_data'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('delivery_data') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.delivery_data_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="delivery_time">{{ trans('cruds.order.fields.delivery_time') }}</label>
                            <input class="form-control timepicker" type="text" name="delivery_time" id="delivery_time" value="{{ old('delivery_time') }}">
                            @if($errors->has('delivery_time'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('delivery_time') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.delivery_time_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="exact_time" value="0">
                                <input type="checkbox" name="exact_time" id="exact_time" value="1" {{ old('exact_time', 0) == 1 ? 'checked' : '' }}>
                                <label for="exact_time">{{ trans('cruds.order.fields.exact_time') }}</label>
                            </div>
                            @if($errors->has('exact_time'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('exact_time') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.exact_time_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="address_id">{{ trans('cruds.order.fields.address') }}</label>
                            <select class="form-control select2" name="address_id" id="address_id">
                                @foreach($addresses as $id => $entry)
                                    <option value="{{ $id }}" {{ old('address_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('address'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('address') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.address_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="anonim" value="0">
                                <input type="checkbox" name="anonim" id="anonim" value="1" {{ old('anonim', 0) == 1 ? 'checked' : '' }}>
                                <label for="anonim">{{ trans('cruds.order.fields.anonim') }}</label>
                            </div>
                            @if($errors->has('anonim'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('anonim') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.anonim_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="recipient">{{ trans('cruds.order.fields.recipient') }}</label>
                            <input class="form-control" type="text" name="recipient" id="recipient" value="{{ old('recipient', '') }}">
                            @if($errors->has('recipient'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('recipient') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.recipient_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="recipient_phone">{{ trans('cruds.order.fields.recipient_phone') }}</label>
                            <input class="form-control" type="text" name="recipient_phone" id="recipient_phone" value="{{ old('recipient_phone', '') }}">
                            @if($errors->has('recipient_phone'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('recipient_phone') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.recipient_phone_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="check_address_recipient" value="0">
                                <input type="checkbox" name="check_address_recipient" id="check_address_recipient" value="1" {{ old('check_address_recipient', 0) == 1 ? 'checked' : '' }}>
                                <label for="check_address_recipient">{{ trans('cruds.order.fields.check_address_recipient') }}</label>
                            </div>
                            @if($errors->has('check_address_recipient'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('check_address_recipient') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.check_address_recipient_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="check_time_recipient" value="0">
                                <input type="checkbox" name="check_time_recipient" id="check_time_recipient" value="1" {{ old('check_time_recipient', 0) == 1 ? 'checked' : '' }}>
                                <label for="check_time_recipient">{{ trans('cruds.order.fields.check_time_recipient') }}</label>
                            </div>
                            @if($errors->has('check_time_recipient'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('check_time_recipient') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.check_time_recipient_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="photo_with_recipient" value="0">
                                <input type="checkbox" name="photo_with_recipient" id="photo_with_recipient" value="1" {{ old('photo_with_recipient', 0) == 1 ? 'checked' : '' }}>
                                <label for="photo_with_recipient">{{ trans('cruds.order.fields.photo_with_recipient') }}</label>
                            </div>
                            @if($errors->has('photo_with_recipient'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('photo_with_recipient') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.photo_with_recipient_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="postcard">{{ trans('cruds.order.fields.postcard') }}</label>
                            <input class="form-control" type="text" name="postcard" id="postcard" value="{{ old('postcard', '') }}">
                            @if($errors->has('postcard'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('postcard') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.postcard_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="comment">{{ trans('cruds.order.fields.comment') }}</label>
                            <input class="form-control" type="text" name="comment" id="comment" value="{{ old('comment', '') }}">
                            @if($errors->has('comment'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('comment') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.comment_helper') }}</span>
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