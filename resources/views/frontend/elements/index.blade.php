@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('element_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.elements.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.element.title_singular') }}
                        </a>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                            {{ trans('global.app_csvImport') }}
                        </button>
                        @include('csvImport.modal', ['model' => 'Element', 'route' => 'admin.elements.parseCsvImport'])
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.element.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Element">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.element.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.element.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.element.fields.price') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.element.fields.description') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.element.fields.category') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.element.fields.color') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.element.fields.image') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($elements as $key => $element)
                                    <tr data-entry-id="{{ $element->id }}">
                                        <td>
                                            {{ $element->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $element->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $element->price ?? '' }}
                                        </td>
                                        <td>
                                            {{ $element->description ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($element->categories as $key => $item)
                                                <span>{{ $item->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($element->colors as $key => $item)
                                                <span>{{ $item->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @if($element->image)
                                                <a href="{{ $element->image->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $element->image->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @can('element_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.elements.show', $element->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('element_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.elements.edit', $element->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('element_delete')
                                                <form action="{{ route('frontend.elements.destroy', $element->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('element_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.elements.massDestroy') }}",
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
  let table = $('.datatable-Element:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection