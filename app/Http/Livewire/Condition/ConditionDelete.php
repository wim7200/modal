<?php

namespace App\Http\Livewire\Condition;

use App\Models\Condition;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use LivewireUI\Modal\ModalComponent;

class ConditionDelete extends ModalComponent
{
    use AuthorizesRequests;

    public $condition;

    public function mount(Condition $condition)
    {
        $this->condition = $condition;
    }

    public function render()
    {
        $this->authorize('conditon-delete');
        return view('livewire.condition.condition-delete');
    }

    public function delete()
    {
        $this->condition->delete();
        session()->flash('message', 'Condition deleted!');
        return redirect()->to('/condition');
    }
}
