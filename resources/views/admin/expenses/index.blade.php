@extends('layouts.admin')
@section('content')
@can('expense_category_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.expenses.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.expenses.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.expenses.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ExpenseCategory">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.expenses.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.expenses.fields.date') }}
                        </th>
                        <th>
                            {{ trans('cruds.expenses.fields.supplier') }}
                        </th>
                        <th>
                            {{ trans('cruds.expenses.fields.discription') }}
                        </th>
                        <th>
                            {{ trans('cruds.expenses.fields.sub_total') }}
                        </th>
                        <th>
                            {{ trans('cruds.expenses.fields.vat') }}
                        </th>
                        <th>
                            {{ trans('cruds.expenses.fields.paymnet_method') }}
                        </th>
                        <th>
                            {{ trans('cruds.expenses.fields.paymnet_reference') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($expenses as $key => $expense)
                        <tr data-entry-id="{{ $expense->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $expense->id ?? '' }}
                            </td>
                            <td>
                                {{ $expense->entry_date ?? '' }}
                            </td>
                            <td>
                                {{ $expense->suppliers['name'] ?? '' }}
                            </td>
                            <td>
                                {{ $expense->discription ?? '' }}
                            </td>
                            <td>
                                {{ $expense->sub_total ?? '' }}
                            </td>
                            <td>
                                {{ $expense->vat ?? '' }}
                            </td>
                            <td>
                                {{ $expense->paymnet_method ?? '' }}
                            </td>
                            <td>
                                {{ $expense->paymnet_reference ?? '' }}
                            </td>
                            <td>
                              
                                <a class="btn btn-xs btn-info" href="{{ route('admin.expenses.edit', $expense->id) }}">
                                    {{ trans('global.edit') }}
                                </a>

                          
                                <form action="{{ route('admin.expenses.destroy', $expense->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.expenses.massDestroy') }}",
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