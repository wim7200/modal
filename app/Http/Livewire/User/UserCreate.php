<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use LivewireUI\Modal\ModalComponent;

class UserCreate extends ModalComponent
{
    use AuthorizesRequests;
    public $name;
    public $email;
    public $password;
    public $permission;
    public $notify;
    public $user_id;

    protected $listeners=[
        'UserCreate',
        ];

    public function render()
    {
        return view('livewire.user.user-create');
    }


    public function UserCreate()
    {
        $this->validate([
            'name'=>'required',
            'email'=>'required|unique:users',
        ]);



        User::Create([
            'name'=>$this->name,
            'email'=>$this->email,


        ])->assignRole('user');

        session()->flash('message', 'User Created succesfully');
        return redirect()->to('/User');
    }
}
