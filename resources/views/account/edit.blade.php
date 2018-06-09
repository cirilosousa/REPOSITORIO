@extends('layouts.app')
@section('title', 'Edit Account')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Account') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('account.update') }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group row">
                            <label for="account_type_id" class="col-md-4 col-form-label text-md-right">{{ __('Account Type') }}</label>

                            <div class="col-md-6">
                                <select name="account_type_id">
                                    <option value="1" selected>
                                    Bank Account
                                    </option>
                                    <option value="2">
                                    Pocket Money
                                    </option>
                                    <option value="3">
                                    PayPal Account
                                    </option>
                                    <option value="4">
                                    Credit Card
                                    </option>
                                    <option value="5">
                                    Meal Card 
                                    </option>     
                                </select>  
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Code') }}</label>

                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" value="{{ old('code') }}" required autofocus>

                                @if ($errors->has('code'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>

                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" value="{{ old('date') }}" required>

                                @if ($errors->has('date'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="start_balance" class="col-md-4 col-form-label text-md-right">{{ __('Start balance') }}</label>

                            <div class="col-md-6">
                                <input id="start_balance" type="text" class="form-control{{ $errors->has('start_balance') ? ' is-invalid' : '' }}" name="start_balance" required>

                                @if ($errors->has('start_balance'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('start_balance') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                            
                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}">

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create Account') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
