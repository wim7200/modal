<?php

namespace App\Http\Livewire\UserLW;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserTable extends Component
{
    use WithPagination;

    public User $user;

    public $search ='';
    public $sortField='name';
    public $sortAsc=true;

    public function render()
    {
        return view('livewire.userlw.user-table',[
            'users'=>User::query()
                ->with('roles')
                ->search($this->search,['name'])
                ->orderby($this->sortField,$this->sortAsc? 'asc':'desc')
                ->paginate(10),
        ]);
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
