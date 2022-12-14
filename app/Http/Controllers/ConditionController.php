<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConditionStoreRequest;
use App\Http\Requests\ConditionUpdateRequest;
use App\Models\Condition;
use Illuminate\Http\Request;

class ConditionController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $conditions = Condition::all();

        return view('condition.index', compact('conditions'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('condition.create');
    }

    /**
     * @param \App\Http\Requests\ConditionStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConditionStoreRequest $request)
    {
        $condition = Condition::create($request->validated());

        $request->session()->flash('condition.id', $condition->id);

        return redirect()->route('condition.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Condition $condition
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Condition $condition)
    {
        return view('condition.show', compact('condition'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Condition $condition
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Condition $condition)
    {
        return view('condition.edit', compact('condition'));
    }

    /**
     * @param \App\Http\Requests\ConditionUpdateRequest $request
     * @param \App\Models\Condition $condition
     * @return \Illuminate\Http\Response
     */
    public function update(ConditionUpdateRequest $request, Condition $condition)
    {
        $condition->update($request->validated());

        $request->session()->flash('condition.id', $condition->id);

        return redirect()->route('condition.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Condition $condition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Condition $condition)
    {
        $condition->delete();

        return redirect()->route('condition.index');
    }
}
