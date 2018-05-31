<?php

namespace App\Http\Controllers;

use App\User;
use App\Account;
use App\Movement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    



public function show()
    {

	// get users
    	$users = DB::table('users')->count();
        
        

        $activeUsers = DB::table('users')
        		->where('blocked', '=', 0)->count();

        $movements = DB::table('movements')->count();

        $accounts = DB::table('accounts')->count();

        return view('welcome', compact('users', 'activeUsers', 'movements', 'accounts'));
    }

















}
