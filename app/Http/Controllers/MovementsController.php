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

    	//$movement = new movement();
    	//$movement->account_id=$account_id;

    	$request->validate([
            'date' => 'required|date', //|date_format:Y-m-d', //photo
            'value' => 'required|numeric| min:0.01|max:5000',
            'description' => 'string|min:0|max:255',    
        ]);
    
        $account=Account::find($account_id);
        $saldo_inicial = $account->current_balance;
        
        if ( $request->input('category') == "revenue") {
            $tipo_movimento = $request->input('revenue');
            $saldo_final = $saldo_inicial + $request->input('value');
        }

        if ( $request->input('category') == "expense") {
            $tipo_movimento = $request->input('expense');
            $saldo_final = $saldo_inicial - $request->input('value');
        }
        
        switch ($tipo_movimento) {
            case 'food': $type_temp = 1; break;
            case 'clothes': $type_temp = 2; break;
            case 'services': $type_temp = 3; break;
            case 'electricity': $type_temp = 4; break;
            case 'phone': $type_temp = 5; break;
            case 'fuel': $type_temp = 6; break;
            case 'insurance': $type_temp = 7; break;
            case 'entertainment': $type_temp = 8; break;
            case 'culture': $type_temp = 9; break;
            case 'trips': $type_temp = 10; break;
            case 'mortgage payment': $type_temp = 11; break;
            case 'salary': $type_temp = 12; break;
            case 'bonus': $type_temp = 13; break;
            case 'royalties': $type_temp = 14; break;
            case 'interests': $type_temp = 15; break;
            case 'gifts': $type_temp = 16; break;
            case 'dividends': $type_temp = 17; break;
            case 'product sales': $type_temp = 18; break;
        }

        $movement=Movement::create([
            'account_id' => $account_id,
            'movement_category_id' => $type_temp,
            'date' =>$request->input('date'), //photo
            'value' => $request->input('value'),
            'start_balance' => $saldo_inicial,
            'end_balance' => $saldo_final, 
            'description' =>$request->input('description'),
            'type' => $request->input('category'),
            'created_at' => time() ,]);	
     
        //$movement->fill($movement);
        //$movement->save();
        return redirect()->route('movements.index', ['account_id' => $account_id ]);

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

    public function destroy($account_id, $movement_id){
    	
    	$movement=Movement::find($movement_id);
        $movement->delete();
        return redirect()->route('movements.index', ['account_id' => $account_id ]);        
    }

}
