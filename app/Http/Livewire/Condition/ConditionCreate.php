<?php

namespace App\Http\Livewire\Condition;

use App\Models\Condition;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use LivewireUI\Modal\ModalComponent;

class ConditionCreate extends ModalComponent
{
    use AuthorizesRequests;

    public $name;

    protected $listeners = [
        'ConditionCreate',
    ];


    public function render()
    {
        $this->authorize('conditon-create');
        return view('livewire.condition.condition-create');
    }

    public function ConditionCreate()
    {
        $this->validate([
            'name' => 'required'
        ]);

        Condition::Create([
            'name' => $this->name,
        ]);
        session()->flash('message', 'Condition Created succesfully');
        return redirect()->to('/condition');
    }
}
