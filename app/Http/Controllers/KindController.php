<?php

namespace App\Http\Controllers;

use App\Http\Requests\KindStoreRequest;
use App\Http\Requests\KindUpdateRequest;
use App\Models\Kind;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class KindController extends Controller
{
    /*public function __construct()
    {
       $this->middleware(['role_or_permission:manager']);
    }*/

    /**
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $kinds = Kind::all();

        return view('kind.index', compact('kinds'));
    }

    /**
     * @param KindStoreRequest $request
     * @return Response
     */
    public function store(KindStoreRequest $request)
    {
        $kind = Kind::create($request->validated());

        $request->session()->flash('kind.id', $kind->id);

        return redirect()->route('kind.index');
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        return view('kind.create');
    }

    /**
     * @param Request $request
     * @param Kind $kind
     * @return Response
     */
    public function show(Request $request, Kind $kind)
    {
        return view('kind.show', compact('kind'));
    }

    /**
     * @param Request $request
     * @param Kind $kind
     * @return Response
     */
    public function edit(Request $request, Kind $kind)
    {
        return view('kind.edit', compact('kind'));
    }

    /**
     * @param KindUpdateRequest $request
     * @param Kind $kind
     * @return Response
     */
    public function update(KindUpdateRequest $request, Kind $kind)
    {
        $kind->update($request->validated());

        $request->session()->flash('kind.id', $kind->id);

        return redirect()->route('kind.index');
    }

    /**
     * @param Request $request
     * @param Kind $kind
     * @return Response
     */
    public function destroy(Request $request, Kind $kind)
    {
        $kind->delete();

        return redirect()->route('kind.index');
    }
}
