@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Your Stats</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>

                    @foreach($lista as $account)
                    <p>My account: {{ $account->current_balance }}</p>
                    @endforeach


                    @if(isset($saldo))
                    <p>O saldo atual é:{{$saldo}}</p>

                    

                    @else
                    Saldo não definido
                    @endif
                    </div>

                    You are logged in!
                    show status
                    show accouts
                    show everything

                    <dir>
                        
                    </dir>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
