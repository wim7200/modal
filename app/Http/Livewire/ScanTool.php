<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ScanTool extends Component
{
    public $search = '';

    public function render()
    {
        return view('livewire.scan-tool');
    }

    public function updating($field, $value)
    {

        dd($value);
        $this->emit('openModal', 'tool.tool-rent', $value);
    }
}
