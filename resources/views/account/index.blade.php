@extends('layouts.app')

@section('title', 'List of Accounts')

@section('content')

    @if(count($accounts))
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Account Code</th>
                    <th>Account type</th>
                    <th>Current balance</th>
                </tr>
            </thead>
        
            <tbody>
                @foreach ($accounts as $account)
                    <tr>
                        <td>{{ $account->code }}</td>
                        <td>{{ $account->type() }}</td>
                        <td>{{ $account->current_balance }}</td>
                        <td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @else
        <h2>No accounts found</h2>
    @endif

@endsection