@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Your Stats</div>
                <p>Total accounts: {{ count($lista) }}</p>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div>
                        

                        @if( count($lista)  != 0)



                        @foreach($lista as $account)
                        
                        <li>
                            {{ $account->current_balance }}               
                        </li>
                        
                        @endforeach

                        <p>-------------------------------------</p>





                        @foreach ( $percentSaldo as $valor )
                        <li>{{ $valor }}</li>
                        @endforeach




                        @else
                        Saldo não definido
                        @endif
                       
                        
                    </div>

                    @if(count($lista)  != 0)

                    <p>O saldo atual é: {{$saldo}}</p>

                    @endif

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
