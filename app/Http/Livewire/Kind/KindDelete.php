<?php

namespace App\Http\Livewire\Kind;

use App\Models\Kind;
use LivewireUI\Modal\ModalComponent;

class KindDelete extends ModalComponent
{
    public $kind;

    public function mount(Kind $kind)
    {
        $this->kind = $kind;
    }
    public function render()
    {
        return view('livewire.kind.kind-delete');
    }
    public function delete()
    {
        $this->kind->delete();
        session()->flash('message','Kind deleted!');
        return redirect()->to('/kind');
    }
}
