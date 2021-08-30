@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.contracts.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.contracts.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
           <div class="form-group {{ $errors->has('route') ? 'has-error' : '' }}">
                <label for="route">{{ trans('cruds.contracts.fields.route') }}*</label>
                 <select class="select2{{ $errors->has('route') ? ' is-invalid' : '' }}" name="route" id="route" >
                        @foreach($routes as $route)
                            <option value="{{$route->id}}">{{$route->route_id}}</option>
                        @endforeach
                    </select>
               
            </div>
            <div class="form-group {{ $errors->has('people') ? 'has-error' : '' }}">
                <label for="people">{{ trans('cruds.contracts.fields.people') }}*</label>
               <select class="select2{{ $errors->has('people') ? ' is-invalid' : '' }}" name="people" id="people" >
                        @foreach($peoples as $people)
                            <option value="{{$people->id}}">{{$people->name}}</option>
                        @endforeach
                    </select>
                
            </div>
            <div class="form-group {{ $errors->has('start') ? 'has-error' : '' }}">
                <label for="start">{{ trans('cruds.contracts.fields.start') }}*</label>
                <input type="time" id="start" name="start" class="form-control" value="{{ old('start', isset($contract) ? $contract->start : '') }}" required>
                @if($errors->has('start'))
                    <em class="invalid-feedback">
                        {{ $errors->first('start') }}
                    </em>
                @endif
               
            </div>

             <div class="form-group {{ $errors->has('finish') ? 'has-error' : '' }}">
                <label for="finish">{{ trans('cruds.contracts.fields.end') }}*</label>
                <input type="time" id="finish" name="finish" class="form-control" value="{{ old('finish', isset($contract) ? $contract->finish : '') }}" required>
                @if($errors->has('finish'))
                    <em class="invalid-feedback">
                        {{ $errors->first('finish') }}
                    </em>
                @endif
               
            </div>
            <div class="form-group {{ $errors->has('pa_rate') ? 'has-error' : '' }}">
                <label for="pa_rate">{{ trans('cruds.contracts.fields.pa_rate') }}</label>
                <input type="text" id="pa_rate" name="pr_rate" class="form-control" value="{{ old('pr_rate', isset($contract) ? $contract->pr_rate : '') }}">
                @if($errors->has('pr_rate'))
                    <em class="invalid-feedback">
                        {{ $errors->first('pr_rate') }}
                    </em>
                @endif
               
            </div>
            <div class="form-group {{ $errors->has('cost_per_day') ? 'has-error' : '' }}">
                <label for="cost_per_day">{{ trans('cruds.contracts.fields.cost_per_day') }}*</label>
                <input type="text" id="cost_per_day" name="cost_per_day" class="form-control" value="{{ old('cost_per_day', isset($contract) ? $contract->cost_per_day : '') }}" required>
                @if($errors->has('cost_per_day'))
                    <em class="invalid-feedback">
                        {{ $errors->first('cost_per_day') }}
                    </em>
                @endif
               
            </div>
            <div class="form-group {{ $errors->has('pay_per_day') ? 'has-error' : '' }}">
                <label for="pay_per_day">{{ trans('cruds.contracts.fields.pay_per_day') }}*</label>
                <input type="text" id="pay_per_day" name="pay_per_day" class="form-control" value="{{ old('pay_per_day', isset($contract) ? $contract->pay_per_day : '') }}" required>
                @if($errors->has('pay_per_day'))
                    <em class="invalid-feedback">
                        {{ $errors->first('pay_per_day') }}
                    </em>
                @endif
               
            </div>
             <div class="form-group {{ $errors->has('vat_amount') ? 'has-error' : '' }}">
                <label for="vat_amount">{{ trans('cruds.contracts.fields.vat_amount') }}*</label>
                <input type="text" id="vat_amount" name="vat_amount" class="form-control" value="{{ old('vat_amount', isset($contract) ? $contract->vat_amount : '') }}" required>
                @if($errors->has('vat_amount'))
                    <em class="invalid-feedback">
                        {{ $errors->first('vat_amount') }}
                    </em>
                @endif
               
            </div>
            <div class="form-group {{ $errors->has('c_start_date') ? 'has-error' : '' }}">
                <label for="c_start_date">{{ trans('cruds.contracts.fields.c_start_date') }}*</label>
                <input type="date" id="c_start_date" name="c_start_date" class="form-control" value="{{ old('c_start_date', isset($contract) ? $contract->c_start_date : '') }}" required>
                @if($errors->has('c_start_date'))
                    <em class="invalid-feedback">
                        {{ $errors->first('c_start_date') }}
                    </em>
                @endif
               
            </div>
            <div class="form-group {{ $errors->has('c_end_date') ? 'has-error' : '' }}">
                <label for="c_end_date">{{ trans('cruds.contracts.fields.c_end_date') }}*</label>
                <input type="date" id="c_end_date" name="c_end_date" class="form-control" value="{{ old('c_end_date', isset($contract) ? $contract->c_end_date : '') }}" required>
                @if($errors->has('c_end_date'))
                    <em class="invalid-feedback">
                        {{ $errors->first('c_end_date') }}
                    </em>
                @endif
               
            </div>
             <div class="form-group {{ $errors->has('driver') ? 'has-error' : '' }}">
                <label for="driver">{{ trans('cruds.contracts.fields.driver') }}*</label>
                    <select class="select2{{ $errors->has('driver') ? ' is-invalid' : '' }}" name="driver" id="driver" >
                        @foreach($drivers as $driver)
                            <option value="{{$driver->id}}">{{$driver->name}}</option>
                        @endforeach
                    </select>
                </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection