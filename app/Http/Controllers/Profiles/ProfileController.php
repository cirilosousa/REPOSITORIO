<?php

namespace App\Http\Controllers\Profiles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;

class ProfileController extends Controller
{

    protected $redirectTo = '/dashboard';

    public function __construct() {
        $this->middleware('auth'); //->except('index');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'string|min:9',
            //'profile_photo' => 'image',
        ]);
    }

    public function index() {
    
        $user = User::find(Auth::user()->id);
        
		return view('profiles.profile', compact('user'));
	} 

    protected function update_profile(Request $request){


        $user = User::find($request->input('id'));

        var_dump($request->input('email'));

        var_dump($user);

        /*
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->save();

        $file = $data['profile_photo'];

        if ($file->isValid()) {
            $path= $file->store('public/profiles');
            $user->update(['profile_photo' => basename($path) ]);
            Storage::setVisibility($path, 'public');
        }
		*/

        return $user;
    }

    protected function update_password(Request $request){

    	var_dump($request->input('current_password'));
    	var_dump($request->input('new_password'));
    	var_dump($request->input('confirm_password'));
		var_dump($request);

    }
}
