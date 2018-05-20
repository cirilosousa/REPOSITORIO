<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use Hash;
use Illuminate\Http\Request;
use DB;

class UsersController extends Controller
{

    public function __construct() {
        $this->middleware('auth'); //->except('index');
    }

    public function index() {
        
        $users = DB::table('users')->get();
        return view('profiles.admin_index', compact('users'));
    }

    public function block($id) {
        DB::table('users')
            ->where('id', $id)
            ->update(['blocked' => 1]);
        
        return redirect()->route('users');        
    }

    public function unblock($id) {
        DB::table('users')
            ->where('id', $id)
            ->update(['blocked' => 0]);
        
        return redirect()->route('users');
    }

    public function promote($id) {
        DB::table('users')
            ->where('id', $id)
            ->update(['admin' => 1]);
        
        return redirect()->route('users');
    }

    public function demote($id) {
          DB::table('users')
            ->where('id', $id)
            ->update(['admin' => 0]);
        
        return redirect()->route('users');
    }
}
