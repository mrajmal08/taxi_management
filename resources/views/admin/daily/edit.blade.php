@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.entries.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.entries.update", [$entry->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('driver') ? 'has-error' : '' }}">
                <label for="driver">{{ trans('cruds.entries.fields.driver') }}*</label>
                 <select class="form-control select2{{ $errors->has('driver_id') ? ' is-invalid' : '' }}" name="driver_id" id="driver_id" >
                        @foreach($drivers as $driver)
                            <option @if($entry->driver_id == $driver->id) selected="selected" @endif value="{{$driver->id}}">{{$driver->name}}</option>
                        @endforeach
                </select>
                @if($errors->has('driver'))
                    <em class="invalid-feedback">
                        {{ $errors->first('driver') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                <label for="date">{{ trans('cruds.entries.fields.date') }}*</label>
                <input type="date" id="date" name="work_date" class="form-control" value="{{ old('work_date', isset($entry) ? $entry->work_date : '') }}" required>
                @if($errors->has('work_date'))
                    <em class="invalid-feedback">
                        {{ $errors->first('work_date') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                <label for="status">{{ trans('cruds.entries.fields.status') }}*</label>
                <select class="form-control select2{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" id="type" >
                        @foreach($types as $type)
                            <option @if($entry->type == $type) selected="selected" @endif value="{{$type->id}}">{{$type->holiday_type}}</option>
                        @endforeach
                </select>
                @if($errors->has('type'))
                    <em class="invalid-feedback">
                        {{ $errors->first('type') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('route_id') ? 'has-error' : '' }}">
                <label for="status">{{ trans('cruds.entries.fields.route') }}*</label>
                <select class="form-control select2{{ $errors->has('route_id') ? ' is-invalid' : '' }}" name="route_id" id="type" >
                        @foreach($routes as $route)
                            <option @if($entry->route_id == $route->id) selected="selected" @endif value="{{$route->id}}">{{$route->route_id}}</option>
                        @endforeach
                </select>
                @if($errors->has('route_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('route_id') }}
                    </em>
                @endif
            </div>
             <div class="form-group {{ $errors->has('duty') ? 'has-error' : '' }}">
                <label for="duty">{{ trans('cruds.entries.fields.duty') }}*</label>
                <select class="form-control select2" name="duty">
                        <option>select</option>
                        <option @if($entry->duty == 1) selected="selected" @endif value="1">Full day</option>
                        <option @if($entry->duty == 2) selected="selected" @endif value="2">Half day</option>
                </select>       
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">{{ trans('cruds.entries.fields.description') }}*</label>
                <textarea name="description" cols="5" class="form-control" required="">
                    {{$entry->description}}
                </textarea>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection