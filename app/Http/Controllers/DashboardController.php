<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Account;
use Auth;
use Khill\Lavacharts\Lavacharts;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //Auth::user()->id
        $lista = User::find(Auth::user()->id)->accounts;
        $id = Auth::user()->id;

        //1º elemento da lista a null
        if (empty($lista)) {

            return view('dashboard');

        }else{
            //define var
            $saldo = 0;
            $listaSaldos = array();
            $pos = 0;
            
            $percentSaldo = array();
            //somatorio do saldo
            foreach ($lista as $conta) {

                $listaSaldos[$pos] = $conta->current_balance;
                $saldo += $conta->current_balance;
                $pos++;
            }

//percentagem do saldo
            //garantir que não divide por 0
            if($saldo != 0){

                $contas  = \Lava::DataTable();

                $contas->addStringColumn('Accounts')
                       ->addNumberColumn('Percent');
               

                for ($i=0; $i < $pos ; $i++) {

                    

                    $percentSaldo[$i] = number_format($listaSaldos[$i] / $saldo, 2, '.', ',') *100;

                            $contas->addRow(['Account '.($i+1) , $percentSaldo[$i]]);

                }

                \Lava::DonutChart('Resume', $contas, [
                    'title' => 'All my accounts'
                ]);

      
            }
            
        }

        return view('dashboard', compact('saldo', 'lista', 'listaSaldos', 'percentSaldo', 'id'));



    }
}
