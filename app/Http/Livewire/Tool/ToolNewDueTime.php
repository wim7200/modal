<?php

namespace App\Http\Livewire\Tool;

use App\Models\Tool;
use Carbon\Carbon;
use LivewireUI\Modal\ModalComponent;

class ToolNewDueTime extends ModalComponent
{
    public $newduetime;
    public $checked=[];

    Protected function rules(){
        return [
            'newduetime'=>'required',
        ];
    }

    public function render()
    {
        return view('livewire.tool.tool-new-due-time');
    }


}
