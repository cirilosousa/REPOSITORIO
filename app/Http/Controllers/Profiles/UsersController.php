<?php

namespace App\Http\Controllers\Profiles;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Hash;
use DB;

class usersController extends Controller
{

    public function __construct() {
        $this->middleware('auth'); //->except('index');
    }

    public function index(Request $request) {
        if ($request->has('name')){

            $admin = $request->has('admin');
            $blocked = $request->has('blocked');
                
            if (empty($request->input('name'))){                
                $users = DB::table('users')->where('admin', $admin)  
                                           ->where('blocked', $blocked)  
                                           ->get();
            }
            
            else {
                $request->validate(['name' => 'regex:/^[\pL\s]+$/u',],
                                   ['name.regex' => 'Only letters and spaces.',]);
                
                $users = DB::table('users')->where ('name', 'like' , '%' . $request->input('name') . '%')
                                           ->where('admin', $admin)  
                                           ->where('blocked', $blocked)  
                                           ->get();
            }
        }
        else{
            $users = DB::table('users')->get();
        }   
        
        return view('profiles.users', compact('users'));
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
