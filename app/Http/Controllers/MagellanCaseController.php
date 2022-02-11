<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\MagellanCase;
use Illuminate\Http\Request;

class MagellanCaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $data = User::with('phase1')->where('isAdmin','no')->paginate(5);     
     
       

        return view('cases.index',[
            'title' => 'PHASE 1',
            'rows' => $data
        ]);
    }


    public function phase1()
    {
        $data = User::with('phase1')->where('isAdmin','no')->paginate(5);

        return view('cases.index',[
            'title' => 'PHASE 1',
            'rows' => $data
        ]);
    }


    public function phase2()
    {
        $data = User::with('phase1')->where('isAdmin','no')->paginate(5);
        return view('cases.index',[
            'title' => 'PHASE 1',
            'rows' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cases.create',[
            'title' => "Create New Case"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MagellanCase  $magellanCase
     * @return \Illuminate\Http\Response
     */
    public function show(MagellanCase $magellanCase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MagellanCase  $magellanCase
     * @return \Illuminate\Http\Response
     */
    public function edit(MagellanCase $magellanCase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MagellanCase  $magellanCase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MagellanCase $magellanCase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MagellanCase  $magellanCase
     * @return \Illuminate\Http\Response
     */
    public function destroy(MagellanCase $magellanCase)
    {
        //
    }

    
}
