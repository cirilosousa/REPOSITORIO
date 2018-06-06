@extends('layouts.app')

@section('title', 'List Movements')

@section('content')
    
    <a class='btn btn-xs btn-primary active emlinha' href="{{route('movements.create', $account->id)}}" >Add Movements</a>

    @if(count($movements))

        <table class="table table-striped">
        
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Date</th>
                    <th>Value</th>
                    <th>Type</th>
                    <th>End Balance</th>
                    <th>Actions</th>
                </tr>
            </thead>
        
            <tbody>
                @foreach ($movements as $movement)
                    <tr>              
                        <td>{{ $movement->movement_category_id}}</td>
                        <td>{{ $movement->date}}</td>
                        <td>{{ $movement->value}}</td>
                        <td>{{ $movement->type}}</td>
                        <td>{{ $movement->end_balance}}</td>

                        <td>
                            <a class="btn btn-xs btn-primary active emlinha" href="/movements/{{$movement->account_id}}/{{$movement->id}}">Edit</a>   

                            <form action="movements/{{$movement->account_id}}/{{$movement->id}}" method="POST" role="form" class="emlinha">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-xs btn-danger active">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    @else
        <h2>No movements found</h2>
    @endif

@endsection

