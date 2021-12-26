@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('promo_code_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.promo-codes.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.promoCode.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.promoCode.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-PromoCode">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.promoCode.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.promoCode.fields.code') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.promoCode.fields.type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.promoCode.fields.summ') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.promoCode.fields.percent') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.promoCode.fields.is_active') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.promoCode.fields.active_until') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($promoCodes as $key => $promoCode)
                                    <tr data-entry-id="{{ $promoCode->id }}">
                                        <td>
                                            {{ $promoCode->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $promoCode->code ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\PromoCode::TYPE_SELECT[$promoCode->type] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $promoCode->summ ?? '' }}
                                        </td>
                                        <td>
                                            {{ $promoCode->percent ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $promoCode->is_active ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $promoCode->is_active ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $promoCode->active_until ?? '' }}
                                        </td>
                                        <td>
                                            @can('promo_code_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.promo-codes.show', $promoCode->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('promo_code_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.promo-codes.edit', $promoCode->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('promo_code_delete')
                                                <form action="{{ route('frontend.promo-codes.destroy', $promoCode->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('promo_code_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.promo-codes.massDestroy') }}",
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
  let table = $('.datatable-PromoCode:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection