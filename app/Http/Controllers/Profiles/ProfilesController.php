<?php

namespace App\Http\Controllers\Profiles;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Hash;
use DB;

class ProfilesController extends Controller
{

    public function __construct() {
        $this->middleware('auth'); //->except('index');
    }

    public function index(Request $request) {

        if ($request->has('name') && !empty($request->input('name'))){
            
            $request->validate(['name' => 'regex:/^[\pL\s]+$/u',],
            				   ['name.regex' => 'Only letters and spaces.',]);
            
            $users = DB::table('users')->where ('name', 'like' , '%' . $request->input('name') . '%')
                                       ->get();
        }
        
        else{
            $users = DB::table('users')->get();
        }  

		return view('profiles.profiles', compact('users'));
    }
    
}
