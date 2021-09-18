@extends('layouts.admin')
@section('content')
    <form action="{{ route("admin.receipts.store") }}" target="_blank" method="POST" enctype="multipart/form-data" class="card">
            @csrf
        <div class="row ml-1 mt-2 mb-4 mr-1">
            <div class="col-md-4">
                <label>Start Date</label>
                <input type="date" class="form-control" name="start_date" required="">
            </div>
            <div class="col-md-4">
                <label>End Date</label>
                <input type="date" class="form-control" name="end_date" required="">
            </div>
             <div class="col-md-4">
                <label>Select Driver</label>
                <select name="driver_id" class="form-control">
                    @foreach($drivers as $driver)
                        <option value="{{$driver->id}}">{{$driver->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 mt-1">
                <label>Vat Number</label>
                <input type="text" name="vat_number" value="" class="form-control">
            </div>
            <div class="col-md-4 mt-1">
                <label>Reference</label>
                <input type="text" name="ref" value="" class="form-control">
            </div>
            <div class="col-md-4 mt-1">
                <label>Company Address</label>
                <input type="text" name="address" value="" class="form-control">
            </div>
            <div class="col-md-4 mt-1">
                <label>Postal Code</label>
                <input type="text" name="code" value="" class="form-control">
            </div>
            <div class="col-md-4 mt-1">
                <label>Vat %</label>
                <input type="number" name="vat" value="" class="form-control">
            </div>
            <div class="col-md-12 mt-2">
                <input  class="btn btn-success text-white" type="submit" value="{{ trans('global.create') }} {{ trans('cruds.receipts.title_singular') }}">
            </div>
        </div>
    </form>
    <div class="card">
         <div class="card-header">
        Reciepts
    </div>
     <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ExpenseCategory">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Dated
                        </th>
                        <th>
                            Invoice
                        </th>
                        <th>
                            Start Date
                        </th>
                         <th>
                            End Date
                        </th>
                        <th>
                            Driver
                        </th>
                        <th>
                            Company
                        </th>
                        <th>
                            Vat number
                        </th>
                        <th>
                            Ref
                        </th>
                        <th>
                            Postal Code
                        </th>
                        <th>
                            Vat%
                        </th>
                        <th>
                            &nbsp;Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reciepts as $key => $reciept)
                        <tr data-entry-id="{{ $reciept->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $reciept->created_date ?? '' }}
                            </td>
                            <td>
                                <small>ATOZ </small>{{ $reciept->id ?? '' }}
                            </td>

                            <td>
                              {{ $reciept->start_date ?? '' }}
                            </td>
                            <td>
                              {{ $reciept->end_date ?? '' }}
                            </td>
                            <td>
                              {{$reciept['drivers']['name'] ?? ''}}
                            </td>
                            <td>
                              {{$reciept->company ?? ''}}
                            </td>
                            <td>
                              {{$reciept->vat_number ?? ''}}
                            </td>
                            <td>
                              {{$reciept->refrence ?? ''}}
                            </td>
                            <td>
                              {{$reciept->postal_code ?? ''}}
                            </td>
                            <td>
                              {{$reciept->vat ?? ''}}
                            </td>
                            <td>

                                <a class="btn btn-xs btn-info" target="_blank" href="{{ route('admin.receipts.show', $reciept->id) }}">
                                    Print
                                </a>


                                <form action="{{ route('admin.receipts.destroy', $reciept->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.receipts.massDestroy') }}",
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
