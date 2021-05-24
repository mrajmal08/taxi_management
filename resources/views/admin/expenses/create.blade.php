@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.expenses.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.expenses.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                <label for="date">{{ trans('cruds.expenses.fields.date') }}*</label>
                  <input type="date" id="date" name="entry_date" class="form-control" value="{{ old('entry_date', isset($expense) ? $expense->entry_date : '') }}" required>
                @if($errors->has('entry_date'))
                    <em class="invalid-feedback">
                        {{ $errors->first('entry_date') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('supplier') ? 'has-error' : '' }}">
                <label for="supplier">{{ trans('cruds.expenses.fields.supplier') }}*</label>
                <select class="select2{{ $errors->has('supplier') ? ' is-invalid' : '' }}" name="supplier" id="expense" >
                        @foreach($suppliers as $supplier)
                            <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                        @endforeach
                </select>
                @if($errors->has('supplier'))
                    <em class="invalid-feedback">
                        {{ $errors->first('supplier') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('discription') ? 'has-error' : '' }}">
                <label for="discription">{{ trans('cruds.expenses.fields.discription') }}*</label>
                  <input type="text" id="discription" name="discription" class="form-control" value="{{ old('discription', isset($expense) ? $expense->discription : '') }}" required>
                @if($errors->has('discription'))
                    <em class="invalid-feedback">
                        {{ $errors->first('discription') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('sub_total') ? 'has-error' : '' }}">
                <label for="sub_total">{{ trans('cruds.expenses.fields.sub_total') }}*</label>
                  <input type="number" id="sub_total" name="sub_total" class="form-control" value="{{ old('sub_total', isset($expense) ? $expense->sub_total : '') }}" required>
                @if($errors->has('sub_total'))
                    <em class="invalid-feedback">
                        {{ $errors->first('sub_total') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('vat') ? 'has-error' : '' }}">
                <label for="vat">{{ trans('cruds.expenses.fields.vat') }}*</label>
                  <input type="number" id="vat" name="vat" class="form-control" value="{{ old('vat', isset($expense) ? $expense->vat : '') }}" required>
                @if($errors->has('vat'))
                    <em class="invalid-feedback">
                        {{ $errors->first('vat') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('paymnet_method') ? 'has-error' : '' }}">
                <label for="paymnet_method">{{ trans('cruds.expenses.fields.paymnet_method') }}</label>
                  <input type="text" id="paymnet_method" name="paymnet_method" class="form-control" value="{{ old('paymnet_method', isset($expense) ? $expense->paymnet_method : '') }}">
                @if($errors->has('paymnet_method'))
                    <em class="invalid-feedback">
                        {{ $errors->first('paymnet_method') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('paymnet_reference') ? 'has-error' : '' }}">
                <label for="paymnet_reference">{{ trans('cruds.expenses.fields.paymnet_reference') }}</label>
                  <input type="text" id="paymnet_reference" name="paymnet_reference" class="form-control" value="{{ old('paymnet_reference', isset($expense) ? $expense->paymnet_reference : '') }}">
                @if($errors->has('paymnet_reference'))
                    <em class="invalid-feedback">
                        {{ $errors->first('paymnet_reference') }}
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