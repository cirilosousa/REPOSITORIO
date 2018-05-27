<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Database\seeds\TypesSeeder;
use App\User;
use App\Account;
use Hash;
use DB;

class MovementsController extends Controller
{
	public function __construct() {
        $this->middleware('auth'); //->except('index');
    }

	public function index (Request $request)
	{
		if ($request->has('name')){

            $user = $request->has('admin');
            $account = $request->has('blocked');
            
            if (empty($request->input('name')))                
                $users = DB::table('users')->where('admin', $admin)  
                                           ->where('blocked', $blocked)  
                                           ->get();

            else
                $users = DB::table('users')->where ('name', 'like' , '%' . $request->input('name') . '%')
                                           ->where('admin', $admin)  
                                           ->where('blocked', $blocked)  
                                           ->get();
        }

        else{
            $users = DB::table('users')->get();
        }   
        
        return view('profiles.users', compact('users'));

	}

    public function create (Request $request)
    {
    	if ($request->has('owner_id')
    		 $user = $request->has('owner_id');


    }


}
