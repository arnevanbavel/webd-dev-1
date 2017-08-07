<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Code;
use App\Geldigecode;
use App\Winningcode;
use App\Winner;
use Auth;
use Illuminate\Support\Facades\Input;

class CodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required'
        ]);

        if(Auth::check())   //kijken of user is ingelogt
        {   

            $ingegevenCodes = Code::all();
            $nogNietGebruikt = true;

            foreach ($ingegevenCodes as $ingegevenCode) {
                if ($ingegevenCode->code == $request->input('code')) {
                    $nogNietGebruikt = false;
                }
            }

            if ($nogNietGebruikt) 
            {
                $geldigecodes = GeldigeCode::all();
                $geldig = false;

                foreach ($geldigecodes as $geldigecode) {
                    if ($geldigecode->code == $request->input('code')) {
                        $geldig = true;
                    }
                }

                if ($geldig) {

                    $winningcodes = Winningcode::all();
                    $winning = false;

                    foreach ($winningcodes as $winningcode) {
                        if ($winningcode->winnendeCode == $request->input('code')) {
                            $winning = true;
                        }
                    }

                    $code = new Code;
                    $code->code = Input::get('code');
                    $code->user_id = Auth::user()->id;
                    $code->save();

                    if ($winning) {
                        //Winnende code
                        $winner = new Winner;
                        $winner->winnendeCode = Input::get('code');
                        $winner->user_id = Auth::user()->id;
                        $winner->maand = "nu";

                        $land = Winningcode::select('Land')->where('winnendeCode', $request->input('code'))->get();
                        $winner->land = $land[0]->Land;
                        $winner->save();

                        $status = 'success';
                        $message = 'U heeft gewonnen u gaat naar ' . $land[0]->Land . ', U zal binnekort gecontacteerd worden';
                    }
                    else
                    {
                        //Valse code
                        $status = 'info';
                        $message = 'Jammer! U heeft niet gewonnen volgende keer beter';
                    }
                }
                else
                {
                    //Valse code
                    $status = 'danger';
                    $message = 'Dit is geen correcte code';
                } 
            }
            else
            {
                //all een keer gebruikt
                $status = 'danger';
                $message = 'Deze code is al eens gebruikt';
            }
        }
        else
        {
            //niet ingelogt
            return redirect('/login');
        }

        return redirect('/home')
        ->with('message', $message)
        ->with('status', $status);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
