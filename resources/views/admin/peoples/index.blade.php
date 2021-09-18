@extends('layouts.admin')
@section('content')
@can('expense_category_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.peoples.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.peoples.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.peoples.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ExpenseCategory">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.peoples.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.peoples.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.peoples.fields.phone') }}
                        </th>
                         <th>
                            {{ trans('cruds.peoples.fields.address') }}
                        </th>
                         <th>
                            {{ trans('cruds.peoples.fields.post_code') }}
                        </th>
                        <th>
                            {{ trans('cruds.peoples.fields.area') }}
                        </th>
                        <th>
                            &nbsp;Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($peoples as $key => $people)
                        <tr data-entry-id="{{ $people->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $people->id ?? '' }}
                            </td>
                            <td>
                                {{ $people->name ?? '' }}
                            </td>
                            <td>
                              {{ $people->phone ?? '' }}
                            </td>
                            <td>
                              {{ $people->address ?? '' }}
                            </td>
                            <td>
                              {{ $people->post_code ?? '' }}
                            </td>

                            <td>
                              {{$people['people']['name'] ?? ''}}
                            </td>
                            <td>

                                <a class="btn btn-xs btn-info" href="{{ route('admin.peoples.edit', $people->id) }}">
                                    {{ trans('global.edit') }}
                                </a>


                                <form action="{{ route('admin.peoples.destroy', $people->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.peoples.massDestroy') }}",
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
