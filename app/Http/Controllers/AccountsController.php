<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Account;
use SoftDeletes;
use Auth;


class AccountsController extends Controller
{


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
    }

    public function close($id){
		  $account = Account::find($id);
      $account->delete(); 
      //return redirect()->route('/accounts/'.$id);
    }

    public function reopen($id){
    	$account = Account::find($id);
    	$account->restore();	      
    }

    public function create(Request $request){
        $user = Auth::User()->id;
        return view('account.add', compact('user'));
    }

    public function store(){
     
    }

    public function edit(){
     
    }
}
