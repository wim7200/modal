<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConditionStoreRequest;
use App\Http\Requests\ConditionUpdateRequest;
use App\Models\Condition;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ConditionController extends Controller
{
    /**
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $conditions = Condition::all();

        return view('condition.index', compact('conditions'));
    }

    /**
     * @param ConditionStoreRequest $request
     * @return Response
     */
    public function store(ConditionStoreRequest $request)
    {
        $condition = Condition::create($request->validated());

        $request->session()->flash('condition.id', $condition->id);

        return redirect()->route('condition.index');
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        return view('condition.create');
    }

    /**
     * @param Request $request
     * @param Condition $condition
     * @return Response
     */
    public function show(Request $request, Condition $condition)
    {
        return view('condition.show', compact('condition'));
    }

    /**
     * @param Request $request
     * @param Condition $condition
     * @return Response
     */
    public function edit(Request $request, Condition $condition)
    {
        return view('condition.edit', compact('condition'));
    }

    /**
     * @param ConditionUpdateRequest $request
     * @param Condition $condition
     * @return Response
     */
    public function update(ConditionUpdateRequest $request, Condition $condition)
    {
        $condition->update($request->validated());

        $request->session()->flash('condition.id', $condition->id);

        return redirect()->route('condition.index');
    }

    /**
     * @param Request $request
     * @param Condition $condition
     * @return Response
     */
    public function destroy(Request $request, Condition $condition)
    {
        $condition->delete();

        return redirect()->route('condition.index');
    }
}
