<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientStoreRequest;
use App\Http\Requests\ClientUpdateRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClientController extends Controller
{
    /**
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $clients = Client::all();

        return view('client.index', compact('clients'));
    }

    /**
     * @param ClientStoreRequest $request
     * @return Response
     */
    public function store(ClientStoreRequest $request)
    {
        $client = Client::create($request->validated());

        $request->session()->flash('client.id', $client->id);

        return redirect()->route('client.index');
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        return view('client.create');
    }

    /**
     * @param Request $request
     * @param Client $client
     * @return Response
     */
    public function show(Request $request, Client $client)
    {
        return view('client.show', compact('client'));
    }

    /**
     * @param Request $request
     * @param Client $client
     * @return Response
     */
    public function edit(Request $request, Client $client)
    {
        return view('client.edit', compact('client'));
    }

    /**
     * @param ClientUpdateRequest $request
     * @param Client $client
     * @return Response
     */
    public function update(ClientUpdateRequest $request, Client $client)
    {
        $client->update($request->validated());

        $request->session()->flash('client.id', $client->id);

        return redirect()->route('client.index');
    }

    /**
     * @param Request $request
     * @param Client $client
     * @return Response
     */
    public function destroy(Request $request, Client $client)
    {
        $client->delete();

        return redirect()->route('client.index');
    }
}
