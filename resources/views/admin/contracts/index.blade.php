@extends('layouts.admin')
@section('content')
@can('expense_category_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.contracts.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.contracts.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.contracts.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ExpenseCategory">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.contracts.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.contracts.fields.route') }}
                        </th>
                        <th>
                            {{ trans('cruds.contracts.fields.people') }}
                        </th>
                         <th>
                            {{ trans('cruds.contracts.fields.start') }}
                        </th>
                         <th>
                            {{ trans('cruds.contracts.fields.end') }}
                        </th>
                        <th>
                            {{ trans('cruds.contracts.fields.pa_rate') }}
                        </th>
                        <th>
                            {{ trans('cruds.contracts.fields.driver') }}
                        </th>
                        <th>
                            {{ trans('cruds.contracts.fields.cost_per_day') }}
                        </th>
                        <th>
                            {{ trans('cruds.contracts.fields.vat_amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.contracts.fields.c_start_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.contracts.fields.c_end_date') }}
                        </th>
                        <th>
                            &nbsp;Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contracts as $key => $contract)
                        <tr data-entry-id="{{ $contract->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $contract->id ?? '' }}
                            </td>
                            <td>
                                {{ $contract['routes']['route_id'] ?? '' }}
                            </td>
                            <td>
                              {{ $contract['peoples']['name'] ?? '' }}
                            </td>
                            <td>
                              {{ $contract->start ?? '' }}
                            </td>
                            <td>
                              {{ $contract->finish ?? '' }}
                            </td>
                            <td>
                                {{$contract->pa_rate ?? ''}}
                            </td>
                            <td>
                              {{$contract['drivers']['name'] ?? ''}}
                            </td>
                            <td>
                              {{$contract->cost_per_day ?? ''}}
                            </td>
                            <td>
                              {{$contract->vat_amount ?? ''}}
                            </td>
                            <td>
                              {{$contract->c_start_date ?? ''}}
                            </td>
                            <td>
                              {{$contract->c_end_date ?? ''}}
                            </td>
                            <td>

                                <a class="btn btn-xs btn-info" href="{{ route('admin.contracts.edit', $contract->id) }}">
                                    {{ trans('global.edit') }}
                                </a>


                                <form action="{{ route('admin.contracts.destroy', $contract->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.contracts.massDestroy') }}",
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
