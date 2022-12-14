<?php

namespace App\Http\Livewire\Condition;

use App\Models\Client;
use App\Models\Condition;
use LivewireUI\Modal\ModalComponent;

class ConditionEdit extends ModalComponent
{
    public $name;
    public $condition_id;

    protected $listeners=[
        'ConditionUpdate',
    ];

    /*protected $rules=[
        'name'=>'required',
    ];*/
    protected function rules()
    {
        return[
            'name'=>'required|unique:conditions,name'.$this->condition->condition_id,
        ];
    }

    public function mount (Condition $condition)
    {
        $this->condition=$condition;
        $this->condition_id=$condition->id;
        $this->name=$condition->name;

    }
    public function render()
    {
        return view('livewire.condition.condition-edit');
    }

    public function ConditionUpdate()
    {
        $validatedData = $this->validate();

        /*Condition::where('id',$this->condition_id)->update([
            'name'=>$validatedData['name'],
        ]);*/

        $this->condition->update($validatedData);

        session()->flash('message', 'Condition Updated succesfully');
        return redirect()->to('/condition');
    }
}
