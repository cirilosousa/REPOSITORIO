<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    



public function show()
    {

	// get users
    	$users = DB::table('users')->get();
        
        

        $activeUsers = DB::table('users')
        		->where('blocked', '=', 0); 

        return view('welcome', compact('users', 'activeUsers'));
    }

















}
