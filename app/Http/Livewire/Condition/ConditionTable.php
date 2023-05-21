<?php

namespace App\Http\Livewire\Condition;

use App\Models\Condition;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class ConditionTable extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public $name, $condition_id;


    public function render()
    {
        $this->authorize('condition-list');

          return view('livewire.condition.condition-table',[
            'conditions'=>Condition::paginate(10),
            ]);
    }
}
