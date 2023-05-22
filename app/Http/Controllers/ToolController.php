<?php

namespace App\Http\Controllers;

use App\Http\Requests\ToolStoreRequest;
use App\Http\Requests\ToolUpdateRequest;
use App\Models\Tool;
use Illuminate\Foundation\Inspiring;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ToolController extends Controller
{


    /**
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $quote = Inspiring::quote();
        $tools = Tool::with('latestRent');
        return view('tool.index', compact('tools', 'quote'));
    }

    /**
     * @param ToolStoreRequest $request
     * @return Response
     */
    public function store(ToolStoreRequest $request)
    {
        $tool = Tool::create($request->validated());

        $request->session()->flash('tool.id', $tool->id);

        return redirect()->route('tool.index');
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        return view('tool.create');
    }

    /**
     * @param Request $request
     * @param Tool $tool
     * @return Response
     */
    public function edit(Request $request, Tool $tool)
    {
        return view('tool.edit', compact('tool'));
    }

    /**
     * @param ToolUpdateRequest $request
     * @param Tool $tool
     * @return Response
     */
    public function update(ToolUpdateRequest $request, Tool $tool)
    {
        $tool->update($request->validated());

        $request->session()->flash('tool.id', $tool->id);

        return redirect()->route('tool.index');
    }

    /**
     * @param Request $request
     * @param Tool $tool
     * @return Response
     */
    public function destroy(Request $request, Tool $tool)
    {
        $tool->delete();

        return redirect()->route('tool.index');
    }
}
