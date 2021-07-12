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
            <div class="form-group {{ $errors->has('vehicle') ? 'has-error' : '' }}">
                <label for="vehicle">{{ trans('cruds.maintenances.fields.vehicle') }}*</label>
                <select class="select2{{ $errors->has('vehicle') ? ' is-invalid' : '' }}" name="vehicle_id" id="maintenance" >
                        @foreach($vehicles as $vehicle)
                            <option value="{{$vehicle->id}}" @if($vehicle->id == $maintenance->vehicle_id)selected="selected"@endif>{{$vehicle->name}}</option>
                        @endforeach
                </select>
                @if($errors->has('vehicle'))
                    <em class="invalid-feedback">
                        {{ $errors->first('vehicle') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('supplier') ? 'has-error' : '' }}">
                <label for="supplier">{{ trans('cruds.maintenances.fields.supplier') }}*</label>
                <select class="select2{{ $errors->has('supplier') ? ' is-invalid' : '' }}" name="supplier" id="maintenance" >
                        @foreach($suppliers as $supplier)
                            <option value="{{$supplier->id}}" @if($supplier->id == $maintenance->supplier)selected="selected"@endif>{{$supplier->name}}</option>
                        @endforeach
                </select>
                @if($errors->has('supplier'))
                    <em class="invalid-feedback">
                        {{ $errors->first('supplier') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('maintainer') ? 'has-error' : '' }}">
                <label for="maintainer">{{ trans('cruds.maintenances.fields.maintainer') }}*</label>
                <select class="select2{{ $errors->has('maintainer') ? ' is-invalid' : '' }}" name="maintenance_by" id="maintenance" >
                        @foreach($maintainers as $maintainer)
                            <option value="{{$maintainer->id}}"  @if($maintainer->id == $maintenance->maintenance_by)selected="selected"@endif>{{$maintainer->name}}</option>
                        @endforeach
                </select>
                @if($errors->has('maintainer'))
                    <em class="invalid-feedback">
                        {{ $errors->first('maintainer') }}
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
            <div class="form-group {{ $errors->has('la_cost') ? 'has-error' : '' }}">
                <label for="la_cost">{{ trans('cruds.maintenances.fields.la_cost') }}</label>
                  <input type="number" id="labor_cost" name="labor_cost" class="form-control" value="{{ old('labor_cost', isset($maintenance) ? $maintenance->labor_cost : '') }}">
                @if($errors->has('labor_cost'))
                    <em class="invalid-feedback">
                        {{ $errors->first('labor_cost') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('la_vat') ? 'has-error' : '' }}">
                <label for="la_vat">{{ trans('cruds.maintenances.fields.la_vat') }}</label>
                  <input type="number" id="labor_vat" name="labor_vat" class="form-control" value="{{ old('labor_vat', isset($maintenance) ? $maintenance->labor_vat : '') }}">
                @if($errors->has('labor_vat'))
                    <em class="invalid-feedback">
                        {{ $errors->first('labor_vat') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('deccription') ? 'has-error' : '' }}">
                <label for="description">{{ trans('cruds.maintenances.fields.description') }}</label>
                 <textarea name="description" class="form-control">{{$maintenance->description}}</textarea>
                @if($errors->has('description'))
                    <em class="invalid-feedback"
                        {{ $errors->first('description') }}
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