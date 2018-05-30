@extends('layouts.app')

@section('title', 'List of Accounts')

@section('content')

    @if(count($accounts))
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Account type</th>
                    <th>Code</th>
                    <th>Description</th>
                    <th>Start balance</th>
                    <th>Current balance</th>
                </tr>
            </thead>
        
            <tbody>
                @foreach ($accounts as $account)
                    <tr>
                        <td>{{ $account->account_type_id }}</td>
                        <td>{{ $account->code }}</td>
                        <td>{{ $account->description }}</td>
                        <td>{{ $account->start_balance }}</td>
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