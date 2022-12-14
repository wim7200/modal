<?php

namespace App\Http\Controllers;

use App\Models\ClientTool;
use Illuminate\Http\Request;

class ClientToolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tools=ClientTool::all();
       // dd($tools);

        return view('clienttool.index',compact($tools));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClientTool  $clientTool
     * @return \Illuminate\Http\Response
     */
    public function show(ClientTool $clientTool)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClientTool  $clientTool
     * @return \Illuminate\Http\Response
     */
    public function edit(ClientTool $clientTool)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClientTool  $clientTool
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClientTool $clientTool)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClientTool  $clientTool
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClientTool $clientTool)
    {
        //
    }
}
