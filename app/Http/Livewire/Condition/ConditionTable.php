<?php

namespace App\Http\Livewire\Condition;

use App\Models\Condition;
use Livewire\Component;
use Livewire\WithPagination;

class ConditionTable extends Component
{
    use WithPagination;

    public $name, $condition_id;


    public function render()
    {
          return view('livewire.condition.condition-table',[
            'conditions'=>Condition::paginate(10),
            ]);
    }
}
