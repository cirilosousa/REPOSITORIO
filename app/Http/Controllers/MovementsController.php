<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Database\seeds\TypesSeeder;
use App\User;
use App\Account;


class MovementsController extends Controller
{
    public function __construct() {
        $this->middleware('auth'); //->except('index');
    }


    public function index($id){

    $movements = Account::find($id)->movements;        
    return view('movements.index', compact('movements'));
    }


    public function create(){




    }

    public function store(){




    }

    public function edit()
    {



    }

    public function update()
    {



    }

    public function destroy()
    {



    }

}
