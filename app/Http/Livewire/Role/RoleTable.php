<?php

namespace App\Http\Livewire\Role;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class RoleTable extends Component


{
    use AuthorizesRequests;

    public $name,$role;

    public function render()
    {
        $this->authorize('role-list');

        return view('livewire.role.role-table',[
            'roles'=>Role::paginate(10),
        ]);
    }
}
