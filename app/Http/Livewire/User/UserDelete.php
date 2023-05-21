<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use LivewireUI\Modal\ModalComponent;

class UserDelete extends ModalComponent
{
    public $user;

    public function mount (User $user)
    {
        $this->user=$user;
    }

    public function delete()
    {
        $this->user->delete();
        session()->flash('message','User deleted!');
        return redirect()->to('/user');
    }
}
