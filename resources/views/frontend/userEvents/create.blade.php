@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.userEvent.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.user-events.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="user_id">{{ trans('cruds.userEvent.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id" required>
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.userEvent.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="event_type">{{ trans('cruds.userEvent.fields.event_type') }}</label>
                            <input class="form-control" type="text" name="event_type" id="event_type" value="{{ old('event_type', '') }}" required>
                            @if($errors->has('event_type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('event_type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.userEvent.fields.event_type_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.userEvent.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.userEvent.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="date">{{ trans('cruds.userEvent.fields.date') }}</label>
                            <input class="form-control date" type="text" name="date" id="date" value="{{ old('date') }}" required>
                            @if($errors->has('date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.userEvent.fields.date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="notification_today" value="0">
                                <input type="checkbox" name="notification_today" id="notification_today" value="1" {{ old('notification_today', 0) == 1 || old('notification_today') === null ? 'checked' : '' }}>
                                <label for="notification_today">{{ trans('cruds.userEvent.fields.notification_today') }}</label>
                            </div>
                            @if($errors->has('notification_today'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('notification_today') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.userEvent.fields.notification_today_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="notification_before_three_day" value="0">
                                <input type="checkbox" name="notification_before_three_day" id="notification_before_three_day" value="1" {{ old('notification_before_three_day', 0) == 1 ? 'checked' : '' }}>
                                <label for="notification_before_three_day">{{ trans('cruds.userEvent.fields.notification_before_three_day') }}</label>
                            </div>
                            @if($errors->has('notification_before_three_day'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('notification_before_three_day') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.userEvent.fields.notification_before_three_day_helper') }}</span>
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