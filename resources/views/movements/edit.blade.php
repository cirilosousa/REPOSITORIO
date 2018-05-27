@extends('layouts.app')

@section('title', 'Edit movements')

@section('content')

@if (count($errors) > 0)
    @include('shared.errors')
@endif

<form action="{{route('movements.edit', $user)}}" method="post" class="form-group">
    {{method_field('PUT')}}
    @include('movements.partials.add-edit')
    <div class="form-group">
        <button type="submit" class="btn btn-success" name="ok">Save</button>
        <a type="submit" class="btn btn-default" name="cancel" href="{{route('movements.index')}}">Cancel</a>
    </div>
</form>
@endsection
