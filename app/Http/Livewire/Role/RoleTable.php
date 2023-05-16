<?php

namespace App\Http\Livewire\Role;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class RoleTable extends Component


{
    public $name,$role;

    public function render()
    {
        return view('livewire.role.role-table',[
            'roles'=>Role::paginate(10),
        ]);
    }
}
