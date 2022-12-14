<?php

namespace App\Http\Controllers;

use App\Http\Requests\ToolStoreRequest;
use App\Http\Requests\ToolUpdateRequest;
use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\Foundation\Inspiring;

class ToolController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $quote=Inspiring::quote();
        $tools = Tool::with('latestRent');
        return view('tool.index', compact('tools','quote'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('tool.create');
    }

    /**
     * @param \App\Http\Requests\ToolStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ToolStoreRequest $request)
    {
        $tool = Tool::create($request->validated());

        $request->session()->flash('tool.id', $tool->id);

        return redirect()->route('tool.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Tool $tool
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Tool $tool)
    {
        return view('tool.edit', compact('tool'));
    }

    /**
     * @param \App\Http\Requests\ToolUpdateRequest $request
     * @param \App\Models\Tool $tool
     * @return \Illuminate\Http\Response
     */
    public function update(ToolUpdateRequest $request, Tool $tool)
    {
        $tool->update($request->validated());

        $request->session()->flash('tool.id', $tool->id);

        return redirect()->route('tool.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Tool $tool
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Tool $tool)
    {
        $tool->delete();

        return redirect()->route('tool.index');
    }
}
