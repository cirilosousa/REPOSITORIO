<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Account;
use Auth;

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
        $lista = User::find(11)->accounts;

        //1º elemento da lista a null
        if ($lista->first() === null) {

            return view('dashboard');

        }else{
            //define var
            $saldo = 0;

            //somatorio do saldo
            foreach ($lista as $conta) {

                $saldo += $conta->current_balance;
            }
        }




        







        return view('dashboard', compact('saldo', 'lista'));
        


    }
}
