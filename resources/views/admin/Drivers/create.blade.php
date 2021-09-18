@extends('layouts.admin')
@section('content')

<div class="card">

    @if($errors->any())
        <div class="alert alert-success">
            <ul>
                <li>{{$errors->first()}}</li>
            </ul>
        </div>
    @endif
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.drivers.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.drivers.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }} col-6">
                <label for="name">{{ trans('cruds.drivers.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($driver) ? $driver->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.drivers.fields.name_helper') }}
                </p>
            </div>
             <div class="form-group {{ $errors->has('middle_name') ? 'has-error' : '' }} col-6">
                <label for="middle_name">{{ trans('cruds.drivers.fields.m_name') }}*</label>
                <input type="text" id="middle_name" name="middle_name" class="form-control" value="{{ old('middle_name', isset($driver) ? $driver->middle_name : '') }}" required>
                @if($errors->has('middle_name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('middle_name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.drivers.fields.name_helper') }}
                </p>
            </div>
             <div class="form-group {{ $errors->has('surname') ? 'has-error' : '' }} col-6">
                <label for="surname">{{ trans('cruds.drivers.fields.s_name') }}*</label>
                <input type="text" id="surname" name="surname" class="form-control" value="{{ old('surname', isset($driver) ? $driver->surname : '') }}" required>
                @if($errors->has('surname'))
                    <em class="invalid-feedback">
                        {{ $errors->first('surname') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.drivers.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('country_code') ? 'has-error' : '' }} col-6">
                <label for="country_code">{{ trans('cruds.drivers.fields.country_code') }}*</label>
                <input type="text" id="country_code" name="country_code" class="form-control" value="{{ old('country_code', isset($driver) ? $driver->country_code : '') }}" required>
                @if($errors->has('country_code'))
                    <em class="invalid-feedback">
                        {{ $errors->first('country_code') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.drivers.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }} col-6">
                <label for="phone">{{ trans('cruds.drivers.fields.phone') }}*</label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', isset($driver) ? $driver->phone : '') }}" required>
                @if($errors->has('phone'))
                    <em class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.drivers.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }} col-6">
                <label for="email">{{ trans('cruds.drivers.fields.email') }}*</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($driver) ? $driver->email : '') }}" required>
                @if($errors->has('email'))
                    <em class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.drivers.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }} col-6">
                <label for="address">{{ trans('cruds.drivers.fields.address') }}*</label>
                <input type="text" id="address" name="address" class="form-control" value="{{ old('address', isset($driver) ? $driver->address : '') }}" required>
                @if($errors->has('address'))
                    <em class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.drivers.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('license_no') ? 'has-error' : '' }} col-6">
                <label for="license_no">{{ trans('cruds.drivers.fields.license_no') }}*</label>
                <input type="text" id="license_no" name="license_no" class="form-control" value="{{ old('license_no', isset($driver) ? $driver->license_no : '') }}" required>
                @if($errors->has('license_no'))
                    <em class="invalid-feedback">
                        {{ $errors->first('license_no') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.drivers.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('license_expiry') ? 'has-error' : '' }} col-6">
                <label for="license_expiry">{{ trans('cruds.drivers.fields.license_exp') }}*</label>
                <input type="date" id="license_expiry" name="license_expiry" class="form-control" value="{{ old('license_expiry', isset($driver) ? $driver->license_expiry : '') }}" required>
                @if($errors->has('license_expiry'))
                    <em class="invalid-feedback">
                        {{ $errors->first('license_expiry') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.drivers.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('vehicle_reg') ? 'has-error' : '' }} col-6">
                <label for="vehicle_reg">{{ trans('cruds.drivers.fields.vehicle_reg') }}*</label>
                <input type="text" id="vehicle_reg" name="vehicle_reg" class="form-control" value="{{ old('vehicle_reg', isset($driver) ? $driver->vehicle_reg : '') }}" required>
                @if($errors->has('vehicle_reg'))
                    <em class="invalid-feedback">
                        {{ $errors->first('vehicle_reg') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.drivers.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('plate_number') ? 'has-error' : '' }} col-6">
                <label for="plate_number">{{ trans('cruds.drivers.fields.plate_number') }}*</label>
                <input type="text" id="plate_number" name="plate_number" class="form-control" value="{{ old('plate_number', isset($driver) ? $driver->plate_number : '') }}" required>
                @if($errors->has('plate_number'))
                    <em class="invalid-feedback">
                        {{ $errors->first('plate_number') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.drivers.fields.name_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('plate_renewal') ? 'has-error' : '' }} col-6">
                <label for="plate_renewal">{{ trans('cruds.drivers.fields.plate_renewal') }}*</label>
                <input type="date" id="plate_renewal" name="plate_renewal" class="form-control" value="{{ old('plate_renewal', isset($driver) ? $driver->plate_renewal : '') }}" required>
                @if($errors->has('plate_renewal'))
                    <em class="invalid-feedback">
                        {{ $errors->first('plate_renewal') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.drivers.fields.name_helper') }}
                </p>
            </div>
             <div class="form-group {{ $errors->has('capacity') ? 'has-error' : '' }} col-6">
                <label for="capacity">{{ trans('cruds.drivers.fields.capacity') }}*</label>
                <input type="number" id="capacity" name="capacity" class="form-control" value="{{ old('capacity', isset($driver) ? $driver->capacity : '') }}" required>
                @if($errors->has('capacity'))
                    <em class="invalid-feedback">
                        {{ $errors->first('capacity') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.drivers.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('insurance_renewal_date') ? 'has-error' : '' }} col-6">
                <label for="insurance_renewal_date">{{ trans('cruds.drivers.fields.r_date') }}*</label>
                <input type="date" id="insurance_renewal_date" name="insurance_renewal_date" class="form-control" value="{{ old('insurance_renewal_date', isset($driver) ? $driver->insurance_renewal_date : '') }}" required>
                @if($errors->has('insurance_renewal_date'))
                    <em class="invalid-feedback">
                        {{ $errors->first('insurance_renewal_date') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.drivers.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('insurance_provider') ? 'has-error' : '' }} col-6">
                <label for="insurance_provider">{{ trans('cruds.drivers.fields.i_provider') }}*</label>
                <select class="form-control select2{{ $errors->has('insurance_provider') ? ' is-invalid' : '' }}" name="insurance_provider" id="insurance_provider" >
                        <option value="none">None</option>
                        @foreach($insurances as $insurance)
                            <option value="{{$insurance->id}}">{{$insurance->name}}</option>
                        @endforeach
                        <option value="other">Other</option>
                    </select>
                @if($errors->has('insurance_provider'))
                    <em class="invalid-feedback">
                        {{ $errors->first('insurance_provider') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.drivers.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('badge') ? 'has-error' : '' }} col-6">
                <label for="badge">{{ trans('cruds.drivers.fields.badge') }}*</label>
                <select class="form-control select2{{ $errors->has('badge') ? ' is-invalid' : '' }}" name="badge" id="badge" >
                        <option selected disabled>----</option>
                        @foreach($badges as $badge)
                            <option value="{{$badge->id}}">{{$badge->badge}}</option>
                        @endforeach
                    </select>
                @if($errors->has('badge'))
                    <em class="invalid-feedback">
                        {{ $errors->first('badge') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.drivers.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('start_date') ? 'has-error' : '' }} col-6">
                <label for="start_date">{{ trans('cruds.drivers.fields.start_date') }}*</label>
                <input type="date" id="start_date" name="start_date" class="form-control" value="{{ old('start_date', isset($driver) ? $driver->start_date : '') }}" required>
                @if($errors->has('start_date'))
                    <em class="invalid-feedback">
                        {{ $errors->first('start_date') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.drivers.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('finish_date') ? 'has-error' : '' }} col-6">
                <label for="finish_date">{{ trans('cruds.drivers.fields.finish_date') }}*</label>
                <input type="date" id="finish_date" name="finish_date" class="form-control" value="{{ old('finish_date', isset($driver) ? $driver->finish_date : '') }}" required>
                @if($errors->has('finish_date'))
                    <em class="invalid-feedback">
                        {{ $errors->first('finish_date') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.drivers.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }} col-6">
                <label for="gender">{{ trans('cruds.drivers.fields.gender') }}*</label>
                <select class="form-control select2{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" id="gender" >
                        <option value="0">Male</option>
                        <option value="1">Female</option>
                        <option value="2">Other</option>
                    </select>
                @if($errors->has('gender'))
                    <em class="invalid-feedback">
                        {{ $errors->first('gender') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.drivers.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('dob') ? 'has-error' : '' }} col-6">
                <label for="dob">{{ trans('cruds.drivers.fields.dob') }}*</label>
                <input type="date" id="dob" name="dob" class="form-control" value="{{ old('dob', isset($driver) ? $driver->dob : '') }}" required>
                @if($errors->has('dob'))
                    <em class="invalid-feedback">
                        {{ $errors->first('dob') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.drivers.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('is_verified') ? 'has-error' : '' }} col-6">
                <label for="is_verified">{{ trans('cruds.drivers.fields.is_verified') }}*</label>
                <select class="form-control select2{{ $errors->has('is_verified') ? ' is-invalid' : '' }}" name="is_verified" id="is_verified" >
                        <option value="1">Yes</option>
                        <option value="2">No</option>
                    </select>
                @if($errors->has('is_verified'))
                    <em class="invalid-feedback">
                        {{ $errors->first('is_verified') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.drivers.fields.name_helper') }}
                </p>
            </div>
             <div class="form-group {{ $errors->has('is_active') ? 'has-error' : '' }} col-6">
                <label for="is_active">{{ trans('cruds.drivers.fields.is_active') }}*</label>
                <select class="form-control select2{{ $errors->has('is_active') ? ' is-invalid' : '' }}" name="is_active" id="is_active" >
                        <option value="1">Yes</option>
                        <option value="2">No</option>
                    </select>
                @if($errors->has('is_active'))
                    <em class="invalid-feedback">
                        {{ $errors->first('is_active') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.drivers.fields.name_helper') }}
                </p>
            </div>

             <div class="form-group {{ $errors->has('car') ? 'has-error' : '' }} col-6">
                <label for="car">{{ trans('cruds.drivers.fields.car') }}*</label>
                <select class="form-control select2{{ $errors->has('car_type') ? ' is-invalid' : '' }}" name="car_type" id="car" >
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach

                    </select>
                @if($errors->has('car'))
                    <em class="invalid-feedback">
                        {{ $errors->first('car') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.drivers.fields.name_helper') }}
                </p>
            </div>
        </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>

        </form>


    </div>
</div>
@endsection
