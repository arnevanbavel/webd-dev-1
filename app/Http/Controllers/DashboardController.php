<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Code;
use App\User;
use App\Geldigecode;
use App\Winningcode;
use App\Winner;

class DashboardController extends Controller
{
    public function show()
    {
    	$users = User::withTrashed()->get();
        $winners = Winner::all();

        return view('dashboard')
        ->with('users',$users)
        ->with('winners',$winners);

    }

    public function addValidCode(Request $request)
    {
    	$this->validate($request, [
            'code' => 'required'
        ]);

    	$geldigecode = new Geldigecode;
    	$geldigecode->code = $request->code;
        $geldigecode->save();

    	return redirect('dashboard')->with('success', 'Code succesvol toegevoegd');
    }

    public function addWinningCode(Request $request)
    {
    	$this->validate($request, [
            'code' => 'required',
            'land' => 'required'
        ]);

    	$winningcode = new Winningcode;
    	$winningcode->winnendeCode = $request->code;
    	$winningcode->land = $request->land;
        $winningcode->save();

        $geldigecode = new Geldigecode;
    	$geldigecode->code = $request->code;
        $geldigecode->save();
    	return redirect('dashboard')->with('success', 'Winnende code succesvol toegevoegd');
    }

    public function destroyUser($id)
    {
        $specificUser = User::find($id);
        $specificUser->delete();

        //$users = User::where('admin1_user0', '=', 0)->withTrashed()->get();

        return redirect('dashboard')->with('success', 'User succesvol verwijdert');
    }

    public function restoreUser($id)
    {
        $specificUser = User::withTrashed()->find($id);
        $specificUser->restore();

        return redirect('dashboard')->with('success', 'User succesvol gekwalificeert');
    }
}
