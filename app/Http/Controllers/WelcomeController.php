<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Winner;

class WelcomeController extends Controller
{
    public function show()
    {
        $winners = Winner::where('maand', 'vorigemaand')->get();;
        return view('welcome')
        ->with('winners',$winners);
    }
}
