<?php

namespace App\Http\Livewire\Kind;

use App\Models\Kind;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class KindCreate extends ModalComponent
{
    use AuthorizesRequests;
    use WithFileUploads;

    public $name;
    public $photo;
    public $description;

    protected $listeners = [
        'KindCreate',
    ];

    public function render()
    {
        $this->authorize('kind-create');
        return view('livewire.kind.kind-create');
    }

    public function KindCreate()
    {
        $this->validate([
            'name' => 'required',

        ]);

        if (!empty($this->photo)) {
            $this->photo->store('public/img');
        }

        Kind::updateOrCreate([
            'name' => $this->name,
            'description' => $this->description,
            'img' => $this->photo->hashname()
        ]);
        session()->flash('message', 'Kind Created succesfully');
        return redirect()->to('/kind');
    }
}
