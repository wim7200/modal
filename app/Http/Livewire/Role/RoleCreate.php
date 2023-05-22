<?php

namespace App\Http\Livewire\Role;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Role;

class RoleCreate extends ModalComponent
{
    use AuthorizesRequests;

    public $name;

    public $listeners = [
        'RoleCreate'
    ];

    public function mount(Role $role)
    {
        // $this->authorize('create',Role::class);

    }

    public function render()
    {
        $this->authorize('role-create');
        return view('livewire.role.role-create');
    }

    public function RoleCreate()
    {


        $this->validate([
            'name' => 'required'
        ]);
        Role::updateOrCreate([
            'name' => $this->name,
        ]);
        session()->flash('message', 'Role Created succesfully');
        return redirect()->to('/role');
    }
}
