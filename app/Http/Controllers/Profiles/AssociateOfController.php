<?php

namespace App\Http\Controllers\Profiles;

use App\Http\Controllers\Controller;
use App\User;
use Auth;

class AssociateOfController extends Controller
{

    public function __construct() {
        $this->middleware('auth'); //->except('index');
    }

    public function index() {
                     
        $associate_of = User::find(Auth::user()->id)->associate_of;

        return view('profiles.associate_of', compact('associate_of'));
    }
}
