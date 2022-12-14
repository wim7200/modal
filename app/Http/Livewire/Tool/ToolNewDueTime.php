<?php

namespace App\Http\Livewire\Tool;

use App\Models\Tool;
use Carbon\Carbon;
use LivewireUI\Modal\ModalComponent;

class ToolNewDueTime extends ModalComponent
{
    public $newDueTime;
    public $checked=[];

    protected $listeners=[
        'ToolNewDueTime',
    ];

    protected function rules(){
        return [
            'newDueTime'=>'required',
        ];
    }

    public function render()
    {
        return view('livewire.tool.tool-new-due-time');
    }

    public function updatedSelectPage($value){
        if($value){
            $this->checked=$this->tools->pluck('id')->toArray();
        }else{
            $this->checked=[];
        }
    }

    public function ToolNewDueTime()
    {
        $validatedData = $this->validate();

        $NDT=Carbon::now()->addDays(10);

        //dd($NDT);

        Tool::whereKey($this->checked)
            ->update(['duetime'=>$NDT]);
        $this->checked=[];
        $this->selectPage=FALSE;


        session()->flash('message', 'Tool Updated succesfully');
        return redirect()->to('/tool');
    }





}
