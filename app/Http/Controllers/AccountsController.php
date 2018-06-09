<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Account;
use SoftDeletes;
use Auth;


class AccountsController extends Controller{

	public function __construct() {
        $this->middleware('auth'); //->except('index');
    }

    public function fullindex($id){
      $accounts = Account::withTrashed()
 						    ->where('owner_id', $id)
 						    ->get();        
    	return view('account.index', compact('accounts'), compact('id'));
    }

    public function openedindex($id){
      $accounts = Account::where('owner_id', $id)
   						    ->get();
    	return view('account.index', compact('accounts'), compact('id'));
    }

    public function closedindex($id){
   		$accounts = Account::onlyTrashed()
   						  ->where('owner_id', $id)
   					    ->get();   
    	return view('account.index', compact('accounts'), compact('id'));
    }

    public function destroy($id){
    	$account = Account::find($id);
        $account->forceDelete();
        return redirect()->route('accounts.index', ['id' => $account->owner_id]);        
    }

    public function close($id){
        $account = Account::withTrashed()
                          ->find($id);
        $account->delete(); 
        return redirect()->route('accounts.index', ['id' => $account->owner_id]);
    }

    public function reopen($id){
    	$account = Account::onlyTrashed()
                          ->find($id);
        $account->restore();
        return redirect()->route('accounts.index', ['id' => $account->owner_id]);
    }

    public function create(Request $request){
        $user = Auth::User()->id;
        return view('account.add', compact('user'));
    }

    public function edit(Account $account){
        return view('account.edit', compact('account'));
    }

    public function store(Request $request){

        $request->validate([  
            'account_type_id' => 'required|integer|between:1,5',
            'code' => 'required|string|unique:accounts',
            'date' => 'required|date',
            'start_balance' => 'required|integer|between:1,20000',
            'description' => 'string',],[ ]);

        $user = Auth::User()->id;
        $account = Account::create([
            'account_type_id' => $request->input('account_type_id'),
            'code' => $request->input('code'),
            'date' => $request->input('date'),
            'start_balance' => $request->input('start_balance'),
            'current_balance' => $request->input('start_balance'),
            'description' => $request->input('description'),
            'owner_id' => $user,
            'created_at' => time() ,]);

        return redirect()->route('accounts.index', ['id' => $account->owner_id]);
    }

    public function update(Request $request){

        $request->validate([  
            'account_type_id' => 'required|integer|between:1,5',
            'code' => 'required|string|unique:accounts',
            'start_balance' => 'required|integer|between:1,20000',
            'description' => 'string',],[ ]);

        $account = Account::update([
            'account_type_id' => $request->input('account_type_id'),
            'code' => $request->input('code'),
            'start_balance' => $request->input('start_balance'),
            'description' => $request->input('description'),]);
    }
}
