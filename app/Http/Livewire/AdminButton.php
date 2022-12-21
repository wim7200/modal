<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class AdminButton extends Component
{
    public Model $model;
    public string $field;
    public bool $isAdmin;

    public $listeners = ['makeAdmin','setToUser'];

    public function mount()
    {
        $this->isAdmin = (bool) $this->model->getAttribute($this->field);
    }

    public function render()
    {
        return view('livewire.admin-button');
    }

    public function updating($field, $value)
    {
        $this->model->setAttribute($this->field, $value)->save();
        //dd($value);
        $user=$this->model;

        if ($value===true){
            $this->emit('makeAdmin',$user);
            //dd($value);
        }else{
            $this->emit('setToUser',$user);
            //dd($value);
        }
        //dd($user);
    }

    public function makeAdmin (User $user)
    {
        //dd($user);

        $user->syncRoles(['admin','user']);
        return redirect('/user')->with('message','User set to Admin succesfully');
    }

    public function setToUser (User $user)
    {
        //dd($user);

        $user->syncRoles(['user']);

        return redirect('/user')->with('message','User set to User succesfully');
    }

}
