<?php

namespace App\Http\Controllers;

use App\Http\Requests\KindStoreRequest;
use App\Http\Requests\KindUpdateRequest;
use App\Models\Kind;
use Illuminate\Http\Request;

class KindController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kinds = Kind::all();

        return view('kind.index', compact('kinds'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('kind.create');
    }

    /**
     * @param \App\Http\Requests\KindStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(KindStoreRequest $request)
    {
        $kind = Kind::create($request->validated());

        $request->session()->flash('kind.id', $kind->id);

        return redirect()->route('kind.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Kind $kind
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Kind $kind)
    {
        return view('kind.show', compact('kind'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Kind $kind
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Kind $kind)
    {
        return view('kind.edit', compact('kind'));
    }

    /**
     * @param \App\Http\Requests\KindUpdateRequest $request
     * @param \App\Models\Kind $kind
     * @return \Illuminate\Http\Response
     */
    public function update(KindUpdateRequest $request, Kind $kind)
    {
        $kind->update($request->validated());

        $request->session()->flash('kind.id', $kind->id);

        return redirect()->route('kind.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Kind $kind
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Kind $kind)
    {
        $kind->delete();

        return redirect()->route('kind.index');
    }
}
