@extends('layouts.admin')
@section('content')
@can('user_event_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.user-events.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.userEvent.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.userEvent.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-UserEvent">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.userEvent.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.userEvent.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.userEvent.fields.event_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.userEvent.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.userEvent.fields.date') }}
                        </th>
                        <th>
                            {{ trans('cruds.userEvent.fields.notification_today') }}
                        </th>
                        <th>
                            {{ trans('cruds.userEvent.fields.notification_before_three_day') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($userEvents as $key => $userEvent)
                        <tr data-entry-id="{{ $userEvent->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $userEvent->id ?? '' }}
                            </td>
                            <td>
                                {{ $userEvent->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $userEvent->event_type ?? '' }}
                            </td>
                            <td>
                                {{ $userEvent->name ?? '' }}
                            </td>
                            <td>
                                {{ $userEvent->date ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $userEvent->notification_today ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $userEvent->notification_today ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $userEvent->notification_before_three_day ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $userEvent->notification_before_three_day ? 'checked' : '' }}>
                            </td>
                            <td>
                                @can('user_event_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.user-events.show', $userEvent->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('user_event_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.user-events.edit', $userEvent->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('user_event_delete')
                                    <form action="{{ route('admin.user-events.destroy', $userEvent->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('user_event_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.user-events.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-UserEvent:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection