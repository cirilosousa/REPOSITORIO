<?php

namespace App\Http\Controllers\Profiles;

use App\Http\Controllers\Controller;
use App\Associate_member;
use App\User;
use App\Account;
use Auth;

class AssociatesController extends Controller
{

    public function __construct() {
        $this->middleware('auth'); //->except('index');
    }

    public function index() {
                     
        $associates = User::find(Auth::user()->id)->associates;

        return view('profiles.associates', compact('associates'));
    }
    
}
