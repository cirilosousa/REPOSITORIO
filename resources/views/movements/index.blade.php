@extends('layouts.app')

@section('title', 'List Movement')

@section('content')
<div><a class="btn btn-primary" href="{{ route('movements.create') }}">Add Movement</a></div>

@if(count($movement))
    <table class="table table-striped">
    <thead>
        <tr>
            <th>Category</th>
            <th>Date</th>
            <th>Description</th>
            <th>Type</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($movement as $movement)
        <tr>
            <td>{{ $movement->movement_category_id}}</td>
            <td>{{ $movement->date }}</td>
            <td>{{ $movement->description}}</td>
            <td>{{ $movement->type() }}</td>
            <td>{{ $movement->created_at}}</td>
            <td>
                <a class="btn btn-xs btn-primary" href="{{ route('movement.edit', $movement->id) }}">Edit</a>
                <form action="{{ route('movement.destroy', $movement->id) }}" method="POST" role="form" class="inline">
                    <input type="hidden" name="movement_id" value="{{ $movement->id }}">
                    <button type="submit" class="btn btn-xs btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </table>
@else
    <h2>No movement found</h2>
@endif

@endsection