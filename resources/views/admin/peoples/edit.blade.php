@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.peoples.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.peoples.update", [$people->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
           <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.peoples.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($people) ? $people->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
               
            </div>
            <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                <label for="phone">{{ trans('cruds.peoples.fields.phone') }}*</label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', isset($people) ? $people->phone : '') }}" required>
                @if($errors->has('phone'))
                    <em class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </em>
                @endif
                
            </div>
            <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                <label for="address">{{ trans('cruds.peoples.fields.address') }}*</label>
                <input type="text" id="address" name="address" class="form-control" value="{{ old('address', isset($people) ? $people->address : '') }}" required>
                @if($errors->has('address'))
                    <em class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </em>
                @endif
               
            </div>

             <div class="form-group {{ $errors->has('post_code') ? 'has-error' : '' }}">
                <label for="post_code">{{ trans('cruds.peoples.fields.post_code') }}*</label>
                <input type="text" id="post_code" name="post_code" class="form-control" value="{{ old('post_code', isset($people) ? $people->post_code : '') }}" required>
                @if($errors->has('post_code'))
                    <em class="invalid-feedback">
                        {{ $errors->first('post_code') }}
                    </em>
                @endif
               
            </div>
             <div class="form-group {{ $errors->has('area') ? 'has-error' : '' }}">
                <label for="area">{{ trans('cruds.peoples.fields.area') }}*</label>
                    <select class="select2{{ $errors->has('area') ? ' is-invalid' : '' }}" name="area" id="area" >
                        @foreach($areas as $area)
                            <option @if($people->area == $area->id) selected='selected' @endif value="{{$area->id}}">{{$area->name}}</option>
                        @endforeach
                    </select>
                </div>
            <div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection