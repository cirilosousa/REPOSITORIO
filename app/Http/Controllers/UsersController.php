<?php

namespace App\Http\Controllers;

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
            
            if (empty($request->input('name')))                
                $users = DB::table('users')->where('admin', $admin)  
                                           ->where('blocked', $blocked)  
                                           ->get();

            else
                $users = DB::table('users')->where ('name', 'like' , $_GET['name']) 
                                           ->where('admin', $admin)  
                                           ->where('blocked', $blocked)  
                                           ->get();
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
