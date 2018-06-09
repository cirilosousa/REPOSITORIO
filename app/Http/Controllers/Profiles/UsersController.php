<?php

namespace App\Http\Controllers\Profiles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{

    public function __construct() {
        $this->middleware('auth'); //->except('index');
    }

    public function index(Request $request) {
        if ($request->has('name')){

            $admin = $request->has('admin');
            $blocked = $request->has('blocked');

            if (empty($request->input('name'))){                
                $users = User::where('admin', $admin)  
                ->where('blocked', $blocked)  
                ->get();
            }
            
            else {
                $request->validate(['name' => 'regex:/^[\pL\s]+$/u',],
                 ['name.regex' => 'Only letters and spaces.',]);
                
                $users = User::where ('name', 'like' , '%' . $request->input('name') . '%')
                ->where('admin', $admin)  
                ->where('blocked', $blocked)  
                ->get();
            }
        }
        else{
            $users = User::all();
        }   
        
        return view('profiles.users', compact('users'));
    }

    public function block($id) {
        User::where('id', $id)
        ->update(['blocked' => 1]);
        
        return redirect()->route('users');        
    }

    public function unblock($id) {
        User::where('id', $id)
        ->update(['blocked' => 0]);
        
        return redirect()->route('users');
    }

    public function promote($id) {
        User::where('id', $id)
        ->update(['admin' => 1]);
        
        return redirect()->route('users');
    }

    public function demote($id) {
      User::where('id', $id)
      ->update(['admin' => 0]);

      return redirect()->route('users');
  }

      

    //envio email no update de user
    Mail::to($request->email)
    ->send (new UpdatedUser($user));

}
