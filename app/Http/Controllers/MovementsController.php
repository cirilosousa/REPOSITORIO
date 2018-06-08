<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Exceptions;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Database\seeds\TypesSeeder;
use App\Movement;
use App\User;
use App\Account;
use Hash;

class MovementsController extends Controller
{
    public function __construct() {
        $this->middleware('auth'); //->except('index');
    }


    public function index($id){

    $movements = Account::find($id)->movements;   
    $account=Account::findOrFail($id);     
    return view('movements.index', compact('movements', 'account'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'movement_category_id' => 'required',
            'type' => 'required',
            'date' => 'required|date|date_format:Y-m-d', //photo
            'value' => 'required|numeric| min:0.05|max:5000',
            'description' => 'string|min:0|max:255',
        ]);
    }


   public function create($id){
    	$account=Account::findOrFail($id);
    	return view('movements.add', compact('account'));
    }

    public function store(Request $request, $account_id){

    	$movement = new movement();
    	$account=Account::findOrFail($account_id);

    	$movement->account_id=$account_id;

    	$request=validate($data, [
            'movement_category_id' => 'required',
            'type' => 'required',
            'date' => 'required|date|date_format:Y-m-d', //photo
            'value' => 'required|numeric| min:0.05|max:5000',
            'description' => 'string|min:0|max:255',
        ]);

    	$movement=Movement::create($data, [
            'movement_category_id' => $request->input('movement_category_id'),
            'type' => $request->input('type'),
            'date' =>$request->input('date'), //photo
            'value' => $request->input('value'),
            'description' =>$request->input('description'),
            'account_id' => $account,
            'created_at' => time() ,]);	
     

        $movement->fill($movement);
        $movement->save();

        return redirect(route('movements'));
    }

    public function edit($account_id, $movement_id){
    	//$this->authorize('update', $movement_id);
    	$movement=Movement::findOrFail($movement_id);
    	$account=Account::findOrFail($account_id);
        return view('movements.edit', compact('account', 'movement'));


    }

    public function update(Request $request, $account_id, $movement_id)
    {
    	$movement=Movement::findOrFail($movement_id);
    	$account=Account::findOrFail($account_id);
        $movements=Validator::make($data, [
            'movement_category_id' => 'required',
            'type' => 'required',
            'date' => 'required|date|date_format:Y-m-d', //photo
            'value' => 'required|numeric| min:0.05|max:5000',
            'description' => 'string|min:0|max:255',
        ]);
        $movements->fill($request);
        $movements->save();

        return redirect()
            ->route('movements.update')
            ->with('success', 'Movement updated successfully!');



    }

    public function destroy($id){
    	
    	$movement=Movement::findOrFail($id);
 
        $movements->delete();
        return redirect()
            ->route('movements')
            ->with('success', 'Movement deleted successfully!');
    }

}
