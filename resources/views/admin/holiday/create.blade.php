@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.holidays.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.holidays.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('holiday_type') ? 'has-error' : '' }}">
                <label for="type">{{ trans('cruds.holidays.fields.type') }}*</label>
                <input type="text" id="type" name="holiday_type" class="form-control" value="{{ old('holiday_type', isset($holiday) ? $holiday->holiday_type : '') }}" required>
                @if($errors->has('holiday_type'))
                    <em class="invalid-feedback">
                        {{ $errors->first('holiday_type') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.expenseCategory.fields.name_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection