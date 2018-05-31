@extends('layouts.app')

@section('title', 'List of Accounts')

@section('content')


@php
    $test=App\Associate_member::where('main_user_id','=', $id)
                              ->where('associated_user_id','=', Auth::user()->id)
                              ->get();
@endphp


@if ($id==Auth::user()->id || $test->first()!=null )    

    <a class="btn btn-xs btn-primary active emlinha" href="/accounts/{{$id}}">All accounts</a>   
    <a class="btn btn-xs btn-primary active emlinha" href="/accounts/{{$id}}/opened">Opened Accounts</a>   
    <a class="btn btn-xs btn-primary active emlinha" href="/accounts/{{$id}}/closed">Closed Accounts</a>

    @if ($id==Auth::user()->id)
    <a class="btn btn-xs btn-success active emlinha" href="/account/create">Create Account</a>  
    @endif

    @if(count($accounts))

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Account Code</th>
                    <th>Account type</th>
                    <th>Current balance</th>
                    <th>Account Operations</th>
                </tr>
            </thead>
        
            <tbody>
                @foreach ($accounts as $account)
                    <tr>
                        <td>{{ $account->code }}</td>
                        <td>{{ $account->type() }}</td>
                        <td>{{ $account->current_balance }}</td>
                        <td>

                            @php
                                $movimentos=$account->movements;
                            @endphp


                            @if ($id==Auth::user()->id)
                                
                                @if ( $movimentos->first() == null )
                                    <form action="/account/{{$account->id}}" method="POST" role="form" class="emlinha">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-xs btn-danger active">Delete</button>
                                    </form>

                                @else
                                    <form action="/account/{{$account->id}}" method="POST" role="form" class="emlinha">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-xs btn-danger disabled">Delete</button>
                                    </form>
                                @endif

                                <form action="/account/{{$account->id}}" method="POST" role="form" class="emlinha">
                                    {{ csrf_field() }}
                                    <button class="btn btn-xs btn-primary active">Edit</button>
                                </form>             

                                @if ($account->trashed())
                                    <form action="/account/{{$account->id}}/reopen" method="POST" role="form" class="emlinha">
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH') }}
                                    <button class="btn btn-xs btn-danger active">Reopen</button>
                                @else    
                                    </form>
                                    <form action="/account/{{$account->id}}/close" method="POST" role="form" class="emlinha">
                                        {{ csrf_field() }}
                                        {{ method_field('PATCH') }}
                                        <button class="btn btn-xs btn-primary active">Close</button>
                                    </form>
                                @endif
                            @endif    
                        </td>    
                    </tr>
                @endforeach
            </tbody>
        </table>

    @else
        <h2>No accounts found</h2>
    @endif

@else
    <h2>You dont have permission to view this user accounts</h2>
@endif

@endsection