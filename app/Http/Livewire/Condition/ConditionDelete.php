<?php

namespace App\Http\Livewire\Condition;

use App\Models\Condition;
use LivewireUI\Modal\ModalComponent;

class ConditionDelete extends ModalComponent
{
    public $condition;

    public function mount(Condition $condition)
    {
        $this->condition = $condition;
    }
    public function render()
    {
        return view('livewire.condition.condition-delete');
    }
    public function delete()
    {
        $this->condition->delete();
        session()->flash('message','Condition deleted!');
        return redirect()->to('/condition');
    }
}
