<?php

namespace App\Http\Livewire\Tool;

use App\Models\Tool;
use App\Models\Kind;
use App\Models\Condition;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use LivewireUI\Modal\ModalComponent;

class ToolCreate extends ModalComponent
{
    use AuthorizesRequests;

    public $name, $qrTool, $kind_id, $condition_id, $duetime;



    protected $listeners=[
        'ToolCreate',
    ];

    protected $rules=[
        'name'=>'required',
        'qrTool'=>'required|unique:tools,qrTool',
        'duetime'=>'required|date',
        'kind_id'=>'required',
        'condition_id'=>'required',
    ];


    public function render()
    {
        $this->authorize('tool-create');
        return view('livewire.tool.tool-create',[
            'kinds'=>Kind::all(),
            'conditions'=>Condition::all(),
        ]);
    }

    public function ToolCreate()
    {
        $this->validate();
        $company_id=auth()->user()->company->id;

        //dd($this,$company_id);

        $tool=Tool::Create([
            'name'=>$this->name,
            'qrTool'=>$this->qrTool,
            'duetime'=>$this->duetime,
            'kind_id'=>$this->kind_id,
            'condition_id'=>$this->condition_id,
            'company_id'=>$company_id,
        ]);
        $tool->clients()->attach(999,['state'=>0]);

        session()->flash('message', 'Tool Created succesfully');
        return redirect()->to('/tool');
    }


}
