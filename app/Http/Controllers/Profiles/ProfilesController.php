<?php

namespace App\Http\Controllers\Profiles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class ProfilesController extends Controller
{

    public function __construct() {
        $this->middleware('auth'); //->except('index');
    }

    public function index(Request $request) {

        if ($request->has('name') && !empty($request->input('name'))){
            
            $request->validate(['name' => 'regex:/^[\pL\s]+$/u',],
            				   ['name.regex' => 'Only letters and spaces.',]);
            
            $users = User::where ('name', 'like' , '%' . $request->input('name') . '%')->get();
        }
        
        else{
            $users = User::all();
        }  

		return view('profiles.profiles', compact('users'));
    }
    
}
