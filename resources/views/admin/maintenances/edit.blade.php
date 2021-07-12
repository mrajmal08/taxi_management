@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.maintenances.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.maintenances.update", [$maintenance->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                <label for="date">{{ trans('cruds.maintenances.fields.date') }}*</label>
                  <input type="date" id="date" name="entry_date" class="form-control" value="{{ old('entry_date', isset($maintenance) ? $maintenance->entry_date : '') }}" required>
                @if($errors->has('entry_date'))
                    <em class="invalid-feedback">
                        {{ $errors->first('entry_date') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('supplier') ? 'has-error' : '' }}">
                <label for="supplier">{{ trans('cruds.maintenances.fields.supplier') }}*</label>
                <select class="select2{{ $errors->has('supplier') ? ' is-invalid' : '' }}" name="supplier" id="maintenance" >
                        @foreach($suppliers as $supplier)
                            <option @if($maintenance->id == $supplier->id) selected="selected" @endif value="{{$supplier->id}}">{{$supplier->name}}</option>
                        @endforeach
                </select>
                @if($errors->has('supplier'))
                    <em class="invalid-feedback">
                        {{ $errors->first('supplier') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('vehicle_reg') ? 'has-error' : '' }}">
                <label for="vehicle_reg">{{ trans('cruds.maintenances.fields.vehicle_reg') }}*</label>
                  <input type="text" id="vehicle_reg" name="vehicle_reg" class="form-control" value="{{ old('vehicle_reg', isset($maintenance) ? $maintenance->vehicle_reg : '') }}" required>
                @if($errors->has('vehicle_reg'))
                    <em class="invalid-feedback">
                        {{ $errors->first('vehicle_reg') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('plate_no') ? 'has-error' : '' }}">
                <label for="plate_no">{{ trans('cruds.maintenances.fields.plate_no') }}*</label>
                  <input type="text" id="plate_no" name="plate_no" class="form-control" value="{{ old('plate_no', isset($maintenance) ? $maintenance->plate_no : '') }}" required>
                @if($errors->has('plate_no'))
                    <em class="invalid-feedback">
                        {{ $errors->first('plate_no') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('millage') ? 'has-error' : '' }}">
                <label for="millage">{{ trans('cruds.maintenances.fields.millage') }}*</label>
                  <input type="text" id="millage" name="millage" class="form-control" value="{{ old('millage', isset($maintenance) ? $maintenance->millage : '') }}" required>
                @if($errors->has('millage'))
                    <em class="invalid-feedback">
                        {{ $errors->first('millage') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('cost') ? 'has-error' : '' }}">
                <label for="cost">{{ trans('cruds.maintenances.fields.cost') }}</label>
                  <input type="number" id="cost" name="cost" class="form-control" value="{{ old('cost', isset($maintenance) ? $maintenance->cost : '') }}">
                @if($errors->has('cost'))
                    <em class="invalid-feedback">
                        {{ $errors->first('cost') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('vat') ? 'has-error' : '' }}">
                <label for="vat">{{ trans('cruds.maintenances.fields.vat') }}</label>
                  <input type="number" id="vat" name="vat" class="form-control" value="{{ old('vat', isset($maintenance) ? $maintenance->vat : '') }}">
                @if($errors->has('vat'))
                    <em class="invalid-feedback">
                        {{ $errors->first('vat') }}
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