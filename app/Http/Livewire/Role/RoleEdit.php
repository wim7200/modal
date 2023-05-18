<?php

namespace App\Http\Livewire\Role;

use App\Models\Company;
use Illuminate\Support\Arr;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleEdit extends ModalComponent
{
    public $name;

    public $selectedpermissions=[];
    public $selectedrole;
    public $checkall;

    protected $rules=
        ['selectedrole'=>['required','integer','exists:roles,id'],
            'selectedpermissions'=>['required','exists:permissions,id']
        ];

    protected $listeners = [
        'saveRolePermissions',
    ];

    public function mount (Role $role)
    {

    }
    public function render0()
    {
        //return view('livewire.role.role-edit');
    }

    public function RoleUpdate()
    {
        $this->validate([
            'name'=>'required',
        ]);

        $this->role->update([
            'name'=>$this->name,
        ]);

        session()->flash('message','Role updated succesfully');
        return redirect()->to('/role');
    }

    public function updatedSelectedRole($value)
    {
        $this->selectedpermissions=[];
        $role=Role::find($value);
        if($role) {
            $this->selectedpermissions =$role->getAllPermissions()
                ->sortBy('name')
                ->pluck('id', 'id')
                ->toArray();
        }
    }

    public function Updatedcheckall($value)
    {
        if($value) {
            $this->selectedpermissions = Permission::all()
                ->pluck('id', 'id')
                ->toArray();
        }
        else
        {
            $this->selectedpermissions=[];
        }
    }

    public function saveRolePermissions()
    {
        if($this->selectedpermissions)
        {   // remove unchecked values that comes with false assign it
            $this->selectedpermissions = Arr::where($this->selectedpermissions, function ($value) {
                return $value;
            });
        }

        $this->validate();
        $role=Role::find($this->selectedrole);
        if ($role) {
            $role->syncPermissions(Permission::find(array_keys($this->selectedpermissions))->pluck('name'));
            $this->selectedpermissions = $role->getAllPermissions()->sortBy('name')
                ->pluck('id', 'id')
                ->toArray();
            $this->emit('saved');
        }
        session()->flash('message', 'Role Updated succesfully');
        return redirect()->to('/role');
    }

    public function render()
    {
        return view('livewire.role.role-edit',[
            'Roles'=>Role::all(),
            'permissions'=>Permission::all() ->sortBy('name')
                ->pluck('name', 'id')
        ]);
    }



}
