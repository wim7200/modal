<?php

namespace App\Http\Livewire\Condition;

use App\Models\Condition;
use LivewireUI\Modal\ModalComponent;

class ConditionCreate extends ModalComponent
{
    public $name;

    protected $listeners=[
        'ConditionCreate',
    ];


    public function render()
    {
        return view('livewire.condition.condition-create');
    }

    public function ConditionCreate()
    {
        $this->validate([
            'name'=>'required'
        ]);

        Condition::Create([
            'name'=>$this->name,
        ]);
        session()->flash('message','Condition Created succesfully');
        return redirect()->to('/condition');
    }
}
