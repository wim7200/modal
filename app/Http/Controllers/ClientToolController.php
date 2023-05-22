<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ClientTool;
use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClientToolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tools = Tool::with('clients', 'latestRent', 'lastupdated_clients')
            ->get();

        /*$tools=Tool::with(['clients'=>fn($query)=>$query->where('state','=','1')])
            ->whereHas('clients',fn($query) =>
            $query->where('state','=','1')
            )
        ->get();*/


        $clients = Client::with('tools')->get();

        return view('clienttool.index', compact('tools', 'clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param ClientTool $clientTool
     * @return Response
     */
    public function show(ClientTool $clientTool)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ClientTool $clientTool
     * @return Response
     */
    public function edit(ClientTool $clientTool)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param ClientTool $clientTool
     * @return Response
     */
    public function update(Request $request, ClientTool $clientTool)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ClientTool $clientTool
     * @return Response
     */
    public function destroy(ClientTool $clientTool)
    {
        //
    }
}
