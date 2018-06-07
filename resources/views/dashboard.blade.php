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
                        <h1>You are logged in!</h1>
                        <h2>Total accounts: {{ count($lista) }}</h2>


                        @if( count($lista)  != 0)



                        @foreach($lista as $account)
                        
                        <li>
                            {{ $account->current_balance }}               
                        </li>
                        
                        @endforeach

                        <hr>


                        <div id="chart-div"></div>
                        
                        <?= Lava::render('DonutChart', 'Resume', 'chart-div') ?>

                        
                        
                        <hr>





                        @foreach ( $percentSaldo as $valor )
                        <li>{{ $valor }}%</li>
                        @endforeach




                        @else
                        Balance not defined
                        @endif

                        
                    </div>

                    @if(count($lista)  != 0)

                    <p>Current balance: {{$saldo}}</p>

                    @endif


                    

                    <div>
                       <a class="btn btn-xs btn-primary active emlinha" href="/accounts/{{$id}}">All accounts</a>
                   </div>   

                   <dir>

                   </dir>

               </div>
           </div>
       </div>
   </div>
</div>
@endsection
