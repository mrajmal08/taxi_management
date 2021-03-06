@extends('layouts.admin')
@section('content')
@can('expense_category_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.categories.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.vehicle.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.vehicle.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ExpenseCategory">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.vehicle.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.vehicle.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.vehicle.fields.mot') }}
                        </th>
                        <th>
                            {{ trans('cruds.vehicle.fields.mot_expiry') }}
                        </th>
                        <th>
                            {{ trans('cruds.vehicle.fields.plate_no') }}
                        </th>
                        <th>
                            {{ trans('cruds.vehicle.fields.plate_no_expiry') }}
                        </th>
                        <th>
                            {{ trans('cruds.vehicle.fields.vehicle_reg') }}
                        </th>
                        <th>
                            {{ trans('cruds.vehicle.fields.vehicle_reg_doc') }}
                        </th>
                        <th>
                            {{ trans('cruds.vehicle.fields.insurance_company') }}
                        </th>
                        <th>
                            {{ trans('cruds.vehicle.fields.insurance_company_expiry') }}
                        </th>
                        <th>
                            {{ trans('cruds.vehicle.fields.insurance_company_doc') }}
                        </th>
                        <th>
                            {{ trans('cruds.vehicle.fields.plate_issue_authority') }}
                        </th>
                        <th>
                            &nbsp;Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($expenseCategories as $key => $vehicle)
                        <tr data-entry-id="{{ $vehicle->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $vehicle->id ?? '' }}
                            </td>
                            <td>
                                {{ $vehicle->name ?? '' }}
                            </td>
                            <td>
                                @if($vehicle->mot != null)
                               <a href="#" onclick="show_my_file('{{asset("/storage/".$vehicle->mot)}}')">View</a>
                               @else
                                 Not available
                                @endif
                            </td>
                            <td>
                                {{ $vehicle->mot_expiry ?? '' }}
                            </td>
                            <td>
                                {{ $vehicle->plate_no ?? '' }}
                            </td>
                            <td>
                                {{ $vehicle->plate_no_expiry ?? '' }}
                            </td>
                            <td>
                                {{ $vehicle->vehicle_reg ?? '' }}
                            </td>
                            <td>
                                 @if($vehicle->vehicle_reg_doc != null)
                                <a href="#" onclick="show_my_file('{{asset("/storage/".$vehicle->vehicle_reg_doc)}}')">View</a>
                                @else
                                 Not available
                                @endif
                            </td>
                            <td>
                                {{ $vehicle->insurance_company ?? '' }}
                            </td>
                            <td>
                                {{ $vehicle->insurance_company_expiry ?? '' }}
                            </td>
                            <td>
                                @if($vehicle->insurance_reg_doc != null)
                                <a href="#" onclick="show_my_file('{{asset("/storage/".$vehicle->insurance_reg_doc)}}')">View</a>
                                @else
                                 Not available
                                @endif
                            </td>
                            <td>
                                @if($vehicle->plate_issue_authority != null)
                                <a href="#" onclick="show_my_file('{{asset("/storage/".$vehicle->plate_issue_authority)}}')">View</a>
                                @else
                                 Not available
                                @endif

                            </td>
                            <td>
                               <!--  @can('expense_category_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.categories.show', $vehicle->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan -->

                                @can('expense_category_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.categories.edit', $vehicle->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('expense_category_delete')
                                    <form action="{{ route('admin.categories.destroy', $vehicle->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    function show_my_file(file) {

         // open the page as popup //
         var page = file;
         var myWindow = window.open(page, "_blank", "scrollbars=yes,width=400,height=500,top=300");

         // focus on the popup //
         myWindow.focus();


       }
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('expense_category_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.categories.massDestroy') }}",
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
