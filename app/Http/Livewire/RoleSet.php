<?php

namespace App\Http\Livewire;

use App\Models\User;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Role;

class RoleSet extends ModalComponent
{
    public $userRoles = [];
    protected $rules = [
        'userRoles.*' => 'exists:roles,id',
    ];

    public function mount(User $user)
    {
        $this->user_id = $user->id;
        $this->user_name = $user->name;

        $this->userRoles = $user->roles()->pluck('id')->toArray();
    }

    public function render()
    {
        return view('livewire.role-set')
            ->withRoles(
                cache()->remember('roles', 60, function () {
                    return Role::all();
                })
            );
    }

    public function submit()
    {
        $this->validate();
        dd($this);
        $user = User::findOrFail($this->user_id);

        $user->roles()->sync($this->userRoles);
    }

}
