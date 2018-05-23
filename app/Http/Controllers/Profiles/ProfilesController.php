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

    public function index() {
    	$users = DB::table('users')->get();
		return view('profiles.profiles', compact('users'));
    }
    
}
