<?php

namespace App\Http\Livewire\Kind;

use App\Models\Kind;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use LivewireUI\Modal\ModalComponent;

class KindDelete extends ModalComponent
{
    use AuthorizesRequests;

    public $kind;

    public function mount(Kind $kind)
    {
        $this->kind = $kind;
    }

    public function render()
    {
        $this->authorize('kind-delete');
        return view('livewire.kind.kind-delete');
    }

    public function delete()
    {
        $this->kind->delete();
        session()->flash('message', 'Kind deleted!');
        return redirect()->to('/kind');
    }
}
