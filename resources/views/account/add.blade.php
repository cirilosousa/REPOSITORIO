@extends('layouts.app')

@section('title', 'Create Account')

@section('content')

@if (count($errors) > 0)
    @include('shared.errors')
@endif

<form action="{{ route('account.store') }}" method="post" class="form-group">
    @include('users.partials.add-edit')

    <div class="form-group">
        <label for="inputPassword">Name</label>
        
    </div>
    <div class="form-group">
        <label for="inputPasswordConfirmation">Password confirmation</label>
        <input
            type="password" class="form-control"
            name="password_confirmation" id="inputPasswordConfirmation"/>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success" name="ok">Add</button>
        <a class="btn btn-default" href="{{ route('users.index') }}">Cancel</a>
    </div>
</form>
@endsection