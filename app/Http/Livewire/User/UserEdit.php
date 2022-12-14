<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use LivewireUI\Modal\ModalComponent;

class UserEdit extends ModalComponent
{
    public $name;
    public $email;
    public $notify;
    public $user_id;

    protected $listeners=[
        'UserUpdate',
    ];

    protected function rules()
    {
        return[
            'name'=>'required',
            'email'=>'required|unique:user'.$this->user->user_id,
            'notify'=>'',
        ];
    }

    public function mount (User $user)
    {
        $this->user=$user;
        $this->user_id=$user->id;
        $this->name=$user->name;
        //$this->notify=$user->notify;
    }
    public function render()
    {
        return view('livewire.user.user-edit');
    }

    public function UserUpdate()
    {
        $validatedData = $this->validate();

        /*Client::where('id',$this->client_id)->update([
            'name'=>$validatedData['name'],
            'qrClient'=>$validatedData['qrClient'],
            'company'=>$validatedData['company'],
        ]);*/

        $this->user->update($validatedData);

        session()->flash('message', 'User Updated succesfully');
        return redirect()->to('/user');
    }
}
