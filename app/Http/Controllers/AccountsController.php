<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Seeder;
use App\Http\Controllers\Controller;
use App\User;
use App\Account;
use Hash;
use DB;

class AccountsController extends Controller
{

	public function opened()
	{}

	public function closed ()
	{}



    public function index()
    {
        $account = Account::all();
        return view('home');
    }
}
