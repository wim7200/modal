<?php

namespace App\Http\Livewire\User;

use App\Models\Company;
use App\Models\Condition;
use App\Models\Kind;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class UserTable extends Component
{
    use WithPagination;

    public User $user;

    public $search ='';
    public $sortField='name';
    public $sortAsc=true;

    public function render()
    {
        return view('livewire.user.user-table',[
            'users'=>$this->users,
            //'roles'=>$this->roles,
        ]);

    }



    public function getUsersProperty()
    {
        $user=Auth::user();

        if ($user->hasRole('Super-Admin')){
            return User::with(['company'])
                ->paginate(20);
        }else{
            return User::with(['company'])
                ->where('id','!=','1')
                ->paginate(10);
                //dd($user);

        }
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }
}
