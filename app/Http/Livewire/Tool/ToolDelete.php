<?php

namespace App\Http\Livewire\Tool;

use App\Models\Tool;
use LivewireUI\Modal\ModalComponent;

class ToolDelete extends ModalComponent
{
    public $tool;

    public function mount(Tool $tool)
    {
        $this->tool = $tool;
    }
    public function render()
    {
        return view('livewire.tool.tool-delete');
    }
    public function delete()
    {
        $this->tool->delete();
        session()->flash('message','Tool deleted!');
        return redirect()->to('/tool');
    }
}
