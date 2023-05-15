<?php

namespace App\Http\Livewire\UserLW;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use LivewireUI\Modal\ModalComponent;
use Symfony\Component\Console\Input\Input;

class UserCreate extends ModalComponent
{
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
        return view('livewire.user-l-w.user-create');
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
