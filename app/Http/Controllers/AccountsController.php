<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Account;


class AccountsController extends Controller
{

	public function __construct() {
        $this->middleware('auth'); //->except('index');
    }

    public function index($id)
    {
        $accounts = User::find($id)->accounts;
        var_dump($accounts);
        //return view('accounts', compact('accounts'));
    }
}
