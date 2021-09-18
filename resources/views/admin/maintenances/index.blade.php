@extends('layouts.admin')
@section('content')
@can('expense_category_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.maintenances.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.maintenances.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.maintenances.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ExpenseCategory">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.maintenances.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.maintenances.fields.date') }}
                        </th>
                        <th>
                            {{ trans('cruds.maintenances.fields.supplier') }}
                        </th>
                        <th>
                            {{ trans('cruds.maintenances.fields.vehicle') }}
                        </th>
                        <th>
                            {{ trans('cruds.maintenances.fields.maintainer') }}
                        </th>
                        <th>
                            {{ trans('cruds.maintenances.fields.millage') }}
                        </th>
                        <th>
                            {{ trans('cruds.maintenances.fields.cost') }}
                        </th>
                        <th>
                            {{ trans('cruds.maintenances.fields.vat') }}
                        </th>
                        <th>
                            {{ trans('cruds.maintenances.fields.la_cost') }}
                        </th>
                        <th>
                            {{ trans('cruds.maintenances.fields.la_vat') }}
                        </th>
                        <th>
                            &nbsp;Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($maintenances as $key => $maintenance)
                        <tr data-entry-id="{{ $maintenance->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $maintenance->id ?? '' }}
                            </td>
                            <td>
                                {{ $maintenance->entry_date ?? '' }}
                            </td>
                            <td>
                                {{ $maintenance->suppliers['name'] ?? '' }}
                            </td>
                            <td>
                                {{ $maintenance->vehicle['name'] ?? '' }}
                            </td>
                            <td>
                                {{ $maintenance->maintain['name'] ?? '' }}
                            </td>
                            <td>
                                {{ $maintenance->millage ?? '' }}
                            </td>
                            <td>
                                {{ $maintenance->cost ?? 0 }}
                            </td>
                            <td>
                                {{ $maintenance->vat ?? 0 }}
                            </td>
                            <td>
                                {{ $maintenance->labor_cost ?? 0 }}
                            </td>
                            <td>
                                {{ $maintenance->labor_vat ?? 0 }}
                            </td>
                            <td>

                                <a class="btn btn-xs btn-info" href="{{ route('admin.maintenances.edit', $maintenance->id) }}">
                                    {{ trans('global.edit') }}
                                </a>


                                <form action="{{ route('admin.maintenances.destroy', $maintenance->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                </form>


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

  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.maintenances.massDestroy') }}",
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


  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-ExpenseCategory:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
