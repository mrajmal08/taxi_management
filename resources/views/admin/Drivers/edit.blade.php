@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.drivers.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.drivers.update",[$driver->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
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
            <div class="form-group {{ $errors->has('country_code') ? 'has-error' : '' }}">
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
            <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
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
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
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
            <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
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
            <div class="form-group {{ $errors->has('license_no') ? 'has-error' : '' }}">
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
            <div class="form-group {{ $errors->has('license_expiry') ? 'has-error' : '' }}">
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
            <div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
                <label for="gender">{{ trans('cruds.drivers.fields.gender') }}*</label>
                <select class="select2{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" id="gender" >
                        <option @if($driver->gender == 0) selected="selected" @endif value="0">Male</option>
                        <option @if($driver->gender == 1) selected="selected" @endif value="1">Female</option>
                        <option @if($driver->gender == 2) selected="selected" @endif value="2">Other</option>
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
            <div class="form-group {{ $errors->has('dob') ? 'has-error' : '' }}">
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
            <div class="form-group {{ $errors->has('is_verified') ? 'has-error' : '' }}">
                <label for="is_verified">{{ trans('cruds.drivers.fields.is_verified') }}*</label>
                <select class="select2{{ $errors->has('is_verified') ? ' is-invalid' : '' }}" name="is_verified" id="is_verified" >
                        <option @if($driver->is_verified == 1) selected="selected" @endif value="1">Yes</option>
                        <option @if($driver->is_verified == 2) selected="selected" @endif value="2">No</option>
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
             <div class="form-group {{ $errors->has('is_active') ? 'has-error' : '' }}">
                <label for="is_active">{{ trans('cruds.drivers.fields.is_active') }}*</label>
                <select class="select2{{ $errors->has('is_active') ? ' is-invalid' : '' }}" name="is_active" id="is_active" >
                         <option @if($driver->is_active == 1) selected="selected" @endif value="1">Yes</option>
                        <option @if($driver->is_active == 2) selected="selected" @endif value="2">No</option>
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

             <div class="form-group {{ $errors->has('car') ? 'has-error' : '' }}">
                <label for="car">{{ trans('cruds.drivers.fields.car') }}*</label>
                <select class="select2{{ $errors->has('car_type') ? ' is-invalid' : '' }}" name="car_type" id="car" >
                        @foreach($categories as $category)
                            <option @if($driver->car_type == $category->id) selected="selected" @endif  value="{{$category->id}}">{{$category->name}}</option>
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
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection