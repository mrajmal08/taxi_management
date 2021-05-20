@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.badges.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.badges.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('badge') ? 'has-error' : '' }}">
                <label for="badge">{{ trans('cruds.badges.fields.badge') }}*</label>
                <input type="text" id="badge" name="badge" class="form-control" value="{{ old('badge', isset($badge) ? $badge->badge : '') }}" required>
                @if($errors->has('badge'))
                    <em class="invalid-feedback">
                        {{ $errors->first('badge') }}
                    </em>
                @endif
            </div> 
            <div class="form-group {{ $errors->has('badge') ? 'has-error' : '' }}">
                <label for="badge">{{ trans('cruds.badges.fields.date') }}*</label>
                <input type="date" id="badge" name="badge_renewal_date" class="form-control" value="{{ old('badge', isset($badge) ? $badge->badge_renewal_date : '') }}" required>
                @if($errors->has('badge'))
                    <em class="invalid-feedback">
                        {{ $errors->first('badge') }}
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