@extends('layouts.app')

@section('title', 'Create Movement')

@section('content')

@if (count($errors) > 0)
    @include('shared.errors')
@endif

<form action="{{route('movements.store', $account->id)}}" method="post" class="form-group">


    <div class="form-group">
        <select name="Category" multiple>
            <option value="Expenses">Expenses</option>
            <option value="Revenue">Revenue</option>
        </select>
    </div>
    <div class="form-group">
        <select name="revenue[]" multiple>
            <option value="bonus">bonus </option>
            <option value="royalties">royalties </option>
            <option value="interests">interests </option>
            <option value="gifts">gifts </option>
            <option value="dividends">dividends </option>
            <option value="products sales">products sales </option>
    </div>
    <div class="form-group">
        <select name="expense[]" multiple>
            <option value="clothes">clothes</option>
            <option value="services">services </option>
            <option value="electricity">electricity </option>
            <option value="phone">phone </option>
            <option value="fuel">fuel </option>
            <option value="mortgage payment">mortgage payment </option>
            <option value="insurance">insurance </option>
            <option value="entertainment">entertainmen </option>
            <option value="culture">culture </option>
            <option value="trips">trips </option>
        </select>
    </div>
    <div class="form-group row">
                            <label for="value" class="col-md-4 col-form-label text-md-right">{{ __('Value') }}</label>

                            <div class="col-md-6">
                                <input id="value" type="numeric" class="form-control{{ $errors->has('value') ? ' is-invalid' : '' }}" name="name" value="{{ old('value') }}" required autofocus>
                            </div>
                        </div>

    <div class="form-group row">
     <label for="document" class="col-md-4 col-form-label text-md-right">{{ __('document') }}</label>
                            
                            <div class="col-md-6">
                                <input id="document" type="file" class="form-control{{ $errors->has('document') ? ' is-invalid' : '' }}" name="document" value="{{ old('document') }}">
                                
                                @if ($errors->has('document'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('document') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
    <div>
        <textarea name="textarea_field" rows="3" cols="30">Description</textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success" name="ok">Add</button>
        <a class="btn btn-default" href="{{ route('movements')}}">Cancel</a>
    </div>
</form>
@endsection
