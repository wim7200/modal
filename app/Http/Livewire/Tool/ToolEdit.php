<?php

namespace App\Http\Livewire\Tool;

use App\Models\Condition;
use App\Models\Kind;
use App\Models\Tool;
use Dotenv\Validator;
use Illuminate\Validation\Rule;
use Livewire\Request;
use LivewireUI\Modal\ModalComponent;

class ToolEdit extends ModalComponent
{
    public $name, $qrTool, $duetime, $kind_id,$tool_id, $condition_id;

    protected $listeners=[
        'ToolUpdate',
    ];

    protected function rules(){

       return [
           'tool_id'=>'',
           'name'=>'required',
           //qr mag niet worden aangepast!!'qrTool'=>'required|unique:tools,qrTool' .$this->tool->tool_id,
           'duetime'=>'required',
           'kind_id'=>'required',
           'condition_id'=>'required',
       ];
    }
    public function mount (Tool $tool)
    {
        $this->tool=$tool;
        $this->tool_id=$tool->id;
        $this->name=$tool->name;
        $this->qrTool=$tool->qrTool;
        $this->duetime=$tool->duetime;
        $this->kind_id=$tool->kind_id;
        $this->condition_id=$tool->condition_id;
    }
    public function render()
    {
        return view('livewire.tool.tool-edit',[
            'kinds'=>Kind::all(),
            'conditions'=>Condition::all(),
        ]);
    }

    public function updatedduetime()
    {
        /*1 = ok  --  3=calibratie*/
        $this->duetime < now() ? $this->condition_id = '3' :$this->condition_id= '1' ;
    }


    public function ToolUpdate()
    {

        $validatedData = $this->validate();


        /*Tool::where('id',$this->tool_id)->update([
            /*'name'=>$validatedData['name'],
            'qrTool'=>$validatedData['qrTool'],
            'duetime'=>$validatedData['duetime'],
            'kind_id'=>$validatedData['kind_id'],
            'condition_id'=>$validatedData['condition_id'],
            'name'=>$this->name,
            'qrTool'=>$this->qrTool,
            'duetime'=>$this->duetime,
            'kind_id'=>$this->kind_id,
            'condition_id'=>$this->condition_id,

        ]);*/



        $this->tool->update($validatedData);

        session()->flash('message', 'Tool Updated succesfully');
        return redirect()->to('/tool');
    }
}
