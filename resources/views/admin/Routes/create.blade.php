@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.routes.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.routes.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('route_id') ? 'has-error' : '' }}">
                <label for="route_id">{{ trans('cruds.routes.fields.route') }}*</label>
                <input type="text" id="route_id" name="route_id" class="form-control" value="{{ old('route_id', isset($expenseCategory) ? $expenseCategory->route_id : '') }}" required>
                @if($errors->has('route_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('route_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                <label for="address">{{ trans('cruds.routes.fields.address') }}*</label>
                <input type="text" id="address" name="address" class="form-control" value="{{ old('address', isset($expenseCategory) ? $expenseCategory->address : '') }}" required>
                @if($errors->has('address'))
                    <em class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </em>
                @endif
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection