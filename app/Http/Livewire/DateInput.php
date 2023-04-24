<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Tool\ToolList;
use App\Http\Livewire\Tool\ToolTable;
use App\Models\Tool;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class DateInput extends ModalComponent
{
    public Tool $tool;
    public $dueTime;
    public $checked=[];

    protected $listeners = [
        'setNewDueTime',
    ];



    protected function rules(){
        return [
            'duetime'=>'required',
        ];
    }

    public function mount (Tool $tool)
    {
        $this->tool=$tool;
        $this->dueTime=$tool->duetime;
    }

    public function render()
    {
        return view('livewire.date-input',[
            'tools'=>Tool::all(),
        ]);
    }

    public function setNewDueTime()
    {
        $this->closeModalWithEvents([
        //'DateInputEvent', // Emit global event
        //HelloWorld::getName() => 'childModalEvent', // Emit event to specific Livewire component
        ToolList::getName() => ['DateInputEvent', [$this->dueTime],], // Emit event to specific Livewire component with a parameter
        ToolTable::getName() => ['DateInputEvent', [$this->dueTime],],
        ]);
    }
}
