<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use LivewireUI\Modal\ModalComponent;

class UserDelete extends ModalComponent
{
    use AuthorizesRequests;

    public $user;

    public function mount(User $user)
    {
        $this->authorize('user-create');
        $this->user = $user;
    }

    public function delete()
    {
        $this->user->delete();
        session()->flash('message', 'User deleted!');
        return redirect()->to('/user');
    }
}
