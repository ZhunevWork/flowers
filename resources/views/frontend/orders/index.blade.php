@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('order_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.orders.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.order.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.order.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Order">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.order.fields.user') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.email') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.phone') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.order.fields.offers') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.order.fields.sub_total') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.order.fields.delivery') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.order.fields.discount') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.order.fields.promocode') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.order.fields.total') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.order.fields.status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.order.fields.payment') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.order.fields.delivery_data') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.order.fields.delivery_time') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.order.fields.exact_time') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.order.fields.address') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.address.fields.street') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.address.fields.home') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.address.fields.apartment') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.order.fields.anonim') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.order.fields.recipient') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.order.fields.recipient_phone') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.order.fields.check_address_recipient') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.order.fields.check_time_recipient') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.order.fields.photo_with_recipient') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.order.fields.postcard') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.order.fields.comment') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $key => $order)
                                    <tr data-entry-id="{{ $order->id }}">
                                        <td>
                                            {{ $order->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $order->user->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $order->user->email ?? '' }}
                                        </td>
                                        <td>
                                            {{ $order->user->phone ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($order->offers as $key => $item)
                                                <span>{{ $item->cart }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $order->sub_total ?? '' }}
                                        </td>
                                        <td>
                                            {{ $order->delivery ?? '' }}
                                        </td>
                                        <td>
                                            {{ $order->discount ?? '' }}
                                        </td>
                                        <td>
                                            {{ $order->promocode->code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $order->total ?? '' }}
                                        </td>
                                        <td>
                                            {{ $order->status->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $order->payment->transaction ?? '' }}
                                        </td>
                                        <td>
                                            {{ $order->delivery_data ?? '' }}
                                        </td>
                                        <td>
                                            {{ $order->delivery_time ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $order->exact_time ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $order->exact_time ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $order->address->city ?? '' }}
                                        </td>
                                        <td>
                                            {{ $order->address->street ?? '' }}
                                        </td>
                                        <td>
                                            {{ $order->address->home ?? '' }}
                                        </td>
                                        <td>
                                            {{ $order->address->apartment ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $order->anonim ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $order->anonim ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $order->recipient ?? '' }}
                                        </td>
                                        <td>
                                            {{ $order->recipient_phone ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $order->check_address_recipient ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $order->check_address_recipient ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $order->check_time_recipient ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $order->check_time_recipient ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $order->photo_with_recipient ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $order->photo_with_recipient ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $order->postcard ?? '' }}
                                        </td>
                                        <td>
                                            {{ $order->comment ?? '' }}
                                        </td>
                                        <td>
                                            @can('order_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.orders.show', $order->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('order_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.orders.edit', $order->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('order_delete')
                                                <form action="{{ route('frontend.orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('order_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.orders.massDestroy') }}",
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
  let table = $('.datatable-Order:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection