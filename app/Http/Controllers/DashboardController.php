<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Code;
use App\User;
use App\Geldigecode;
use App\Winningcode;

class DashboardController extends Controller
{
    public function show()
    {
    	$users = User::all();

        return view('dashboard')->with('users',$users);
    }

    public function addValidCode(Request $request)
    {
    	$geldigecode = new Geldigecode;
    	$geldigecode->code = $request->code;
        $geldigecode->save();

    	return redirect('dashboard')->with('success', 'Code succesvol toegevoegd');
    }

    public function addWinningCode(Request $request)
    {
    	$winningcode = new Winningcode;
    	$winningcode->code = $request->code;
        $winningcode->save();

    	return redirect('dashboard')->with('success', 'Code winnende code succesvol toegevoegd');
    }
}
