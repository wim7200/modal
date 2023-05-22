<?php


use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Role;

class RoleDelete extends ModalComponent
{
    public $role;

    public function mount(Role $role)
    {
        $this->role = $role;
    }

    public function render()
    {
        $this->authorize('role-delete');
        return view('livewire.role.role-delete');
    }

    public function delete()
    {
        $this->role->delete();
        session()->flash('message', 'Role deleted!');
        return redirect()->to('/role');
    }
}
