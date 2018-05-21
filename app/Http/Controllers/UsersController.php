<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
        //->except('index');
        //basta descomentar a linha anterior para que o index não precise de autenticação
	}

    public function index() {
        $this->authorize('list', User::class);
        $users = User::all();
        return view('users.index', compact('users') );
    }


        public function create() {
        $this->authorize('create', User::class);
        $user = new User();

        return view('users.add', compact('user'));
        //return view('users.add')->with('user', $user);
        //return view('users.add')->withUser($user);

    }


    public function store(StoreUserRequest $request) {

        $this->authorize('create', User::class);
 
        $user = new User();
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()
            ->route('users.index')
            ->with('success', 'User added successfully!');
    }

    public function edit(User $user) {
        $this->authorize('update', $user);

        return view('users.edit', compact('user'));
    }

     public function update(Request $request, $id)
    {
        $this->authorize('update', $user);

        $this->validate($request, [
            'name' => 'required|alpha_dash',
            'email' => 'required|email',
            'type' => 'required|between:0,2'
        ]);
        
        $user->fill($request->except('password'));
        $user->save();

        return redirect()
            ->route('users.index')
            ->with('success', 'User updated successfully!');
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', User::class);
        
        $user->delete();
        return redirect()
            ->route('users.index')
            ->with('success', 'User deleted successfully!');
    }








}
