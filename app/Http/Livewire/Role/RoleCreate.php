<?php

namespace App\Http\Livewire\Role;

use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Role;

class RoleCreate extends ModalComponent
{
    public $name;

    public $listeners=[
        'RoleCreate'
    ];

    public function render()
    {
        return view('livewire.role.role-create');
    }

    public function RoleCreate()
    {
        $this->validate([
            'name'=>'required'
        ]);
        Role::updateOrCreate([
            'name'=>$this->name,
        ]);
        session()->flash('message','Role Created succesfully');
        return redirect()->to('/role');
    }
}
