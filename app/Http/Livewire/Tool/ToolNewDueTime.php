<?php

namespace App\Http\Livewire\Tool;

use LivewireUI\Modal\ModalComponent;

class ToolNewDueTime extends ModalComponent
{
    public $newduetime;
    public $checked = [];

    public function render()
    {
        return view('livewire.tool.tool-new-due-time');
    }

    protected function rules()
    {
        return [
            'newduetime' => 'required',
        ];
    }


}
