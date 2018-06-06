<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Exceptions;
use App\Http\Controllers\Controller;
use App\Database\seeds\TypesSeeder;
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
    return view('movements.index', compact('movements'));
    }

    /*protected function validator(array $data)
    {
        return Validator::make($data, [
            'movement_category_id' => 'required',
            'type' => 'required',
            'date' => 'required|date|date_format:Y-m-d', //photo
            'value' => 'required|numeric| min:0.05|max:5000',
            'description' => 'string|min:0|max:255',
        ]);
    }*/

    
   public function create($id){
    	$account=Account::findOrFail($id);
    	return view('movements.add', compact('account'));
    }

    public function store(Request $request){

    	$movements = new movement();
    	$account=Account::findOrFail($account_id);

    	$movements->account_id=$account_id;

    	$movements=Validator::make($data, [
            'movement_category_id' => 'required',
            'type' => 'required',
            'date' => 'required|date|date_format:Y-m-d', //photo
            'value' => 'required|numeric| min:0.05|max:5000',
            'description' => 'string|min:0|max:255',
        ]);

        $movements->fill($movements);
        $movements->save();

        return redirect(route('movements'));

    	
    ;

    public function edit($account_id, $movement_id){
    	$this->authorize('update', $movement_id);
        return view('movements.edit', compact('movements'));


    }

    public function update(Request $request, $account_id, $movement_id)
    {
    	$this->authorize('update', $movements);
        $this->validate($request, [
            
        ]);
        $movements->fill($request);
        $movements->save();

        return redirect()
            ->route('movements.update')
            ->with('success', 'Movement updated successfully!');



    }

    public function destroy($id){
$this->authorize('delete', $movements);
 
        $movements->delete();
        return redirect()
            ->route('movements')
            ->with('success', 'Movement deleted successfully!');
    }

}
