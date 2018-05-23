<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Account;
use Hash;
use DB;

class AccountsController extends Controller
{
    public function index()
    {
        $account = Account::all();
        return view('home');
    }
}
