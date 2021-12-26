@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('bouquet_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.bouquets.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.bouquet.title_singular') }}
                        </a>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                            {{ trans('global.app_csvImport') }}
                        </button>
                        @include('csvImport.modal', ['model' => 'Bouquet', 'route' => 'admin.bouquets.parseCsvImport'])
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.bouquet.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Bouquet">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bouquet.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.bouquet.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.bouquet.fields.description') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.bouquet.fields.durability') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.bouquet.fields.element') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.bouquet.fields.size') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.bouquet.fields.bouquetcategory') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.bouquet.fields.color') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.bouquet.fields.event') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.bouquet.fields.height') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.bouquet.fields.all_size') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.bouquet.fields.price') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.bouquet.fields.discount_price') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.bouquet.fields.in_stock') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.bouquet.fields.images') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bouquets as $key => $bouquet)
                                    <tr data-entry-id="{{ $bouquet->id }}">
                                        <td>
                                            {{ $bouquet->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $bouquet->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $bouquet->description ?? '' }}
                                        </td>
                                        <td>
                                            {{ $bouquet->durability ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($bouquet->elements as $key => $item)
                                                <span>{{ $item->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($bouquet->sizes as $key => $item)
                                                <span>{{ $item->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($bouquet->bouquetcategories as $key => $item)
                                                <span>{{ $item->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($bouquet->colors as $key => $item)
                                                <span>{{ $item->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($bouquet->events as $key => $item)
                                                <span>{{ $item->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $bouquet->height ?? '' }}
                                        </td>
                                        <td>
                                            {{ $bouquet->all_size ?? '' }}
                                        </td>
                                        <td>
                                            {{ $bouquet->price ?? '' }}
                                        </td>
                                        <td>
                                            {{ $bouquet->discount_price ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $bouquet->in_stock ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $bouquet->in_stock ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            @foreach($bouquet->images as $key => $media)
                                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $media->getUrl('thumb') }}">
                                                </a>
                                            @endforeach
                                        </td>
                                        <td>
                                            @can('bouquet_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.bouquets.show', $bouquet->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('bouquet_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.bouquets.edit', $bouquet->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('bouquet_delete')
                                                <form action="{{ route('frontend.bouquets.destroy', $bouquet->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('bouquet_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.bouquets.massDestroy') }}",
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
  let table = $('.datatable-Bouquet:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection