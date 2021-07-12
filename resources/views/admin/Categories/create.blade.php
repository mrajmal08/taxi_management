@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.vehicle.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.categories.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.vehicle.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($vehicle) ? $vehicle->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.vehicle.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('vehicle_reg') ? 'has-error' : '' }}">
                <label for="vehicle_reg">{{ trans('cruds.vehicle.fields.vehicle_reg') }}*</label>
                  <input type="text" id="vehicle_reg" name="vehicle_reg" class="form-control" value="{{ old('vehicle_reg', isset($vehicle) ? $vehicle->vehicle_reg : '') }}" required>
                @if($errors->has('vehicle_reg'))
                    <em class="invalid-feedback">
                        {{ $errors->first('vehicle_reg') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('plate_no') ? 'has-error' : '' }}">
                <label for="plate_no">{{ trans('cruds.vehicle.fields.plate_no') }}*</label>
                  <input type="text" id="plate_no" name="plate_no" class="form-control" value="{{ old('plate_no', isset($vehicle) ? $vehicle->plate_no : '') }}" required>
                @if($errors->has('plate_no'))
                    <em class="invalid-feedback">
                        {{ $errors->first('plate_no') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('plate_no_expiry') ? 'has-error' : '' }}">
                <label for="plate_no_expiry">{{ trans('cruds.vehicle.fields.plate_no_expiry') }}*</label>
                  <input type="date" id="date" name="plate_no_expiry" class="form-control" value="{{ old('plate_no_expiry', isset($vehicle) ? $vehicle->plate_no_expiry : '') }}" required>
                @if($errors->has('plate_no_expiry'))
                    <em class="invalid-feedback">
                        {{ $errors->first('plate_no_expiry') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('mot') ? 'has-error' : '' }}">
                <label for="mot">{{ trans('cruds.vehicle.fields.mot') }}</label>
                  <input type="file" id="mot" name="mot_file" class="form-control" value="{{ old('mot', isset($vehicle) ? $vehicle->mot : '') }}">
                @if($errors->has('mot'))
                    <em class="invalid-feedback">
                        {{ $errors->first('mot') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('mot_expiry') ? 'has-error' : '' }}">
                <label for="mot_expiry">{{ trans('cruds.vehicle.fields.mot_expiry') }}</label>
                  <input type="date" id="date" name="mot_expiry" class="form-control" value="{{ old('mot_expiry', isset($vehicle) ? $vehicle->mot_expiry : '') }}">
                @if($errors->has('mot_expiry'))
                    <em class="invalid-feedback">
                        {{ $errors->first('mot_expiry') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('insurance_company') ? 'has-error' : '' }}">
                <label for="insurance_company">{{ trans('cruds.vehicle.fields.insurance_company') }}*</label>
                  <input type="text" id="insurance_company" name="insurance_company" class="form-control" value="{{ old('insurance_company', isset($vehicle) ? $vehicle->insurance_company : '') }}" required>
                @if($errors->has('insurance_company'))
                    <em class="invalid-feedback">
                        {{ $errors->first('insurance_company') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('insurance_company_expiry') ? 'has-error' : '' }}">
                <label for="insurance_company_expiry">{{ trans('cruds.vehicle.fields.insurance_company_expiry') }}*</label>
                  <input type="date" id="date" name="insurance_company_expiry" class="form-control" value="{{ old('insurance_company_expiry', isset($vehicle) ? $vehicle->insurance_company_expiry : '') }}" required>
                @if($errors->has('insurance_company_expiry'))
                    <em class="invalid-feedback">
                        {{ $errors->first('insurance_company_expiry') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('plate_issue_authority') ? 'has-error' : '' }}">
                <label for="plate_issue_authority">{{ trans('cruds.vehicle.fields.plate_issue_authority') }}</label>
                  <input type="file" id="plate_issue_authority" name="plate_issue_authority_file" class="form-control" value="{{ old('plate_issue_authority', isset($vehicle) ? $vehicle->plate_issue_authority : '') }}">
                @if($errors->has('plate_issue_authority'))
                    <em class="invalid-feedback">
                        {{ $errors->first('plate_issue_authority') }}
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