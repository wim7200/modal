<?php

namespace App\Http\Livewire\User;

use App\Models\Company;
use App\Models\Kind;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Role;

class UserEdit extends ModalComponent
{
    use AuthorizesRequests;

    public User $user;
    public Kind $kind;
    //public $name, $email, $company, $user_id;
    //public $company_id, $role_id, $kind_id;

    public $notify;
    public $selectedroles = [];
    public $role;

    protected $listeners = [
        'UpdateUser', 'saveUserWithRole',
    ];

    public function mount(User $user, Kind $kind)
    {
        $this->user = $user;
        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->kind_id = $user->kind_id;
        $this->company_id = $user->company_id;
        // $this->selectedroles[] = $user->selectedRoles[];
        $this->notify = $user->notify;
    }

    public function render()
    {
        $this->authorize('user-edit');
        return view('livewire.user.user-edit', [
            'companies' => Company::all(),
            'roles' => $this->roles,
            'kinds' => Kind::all(),
        ]);
    }


    public function getRolesProperty()
    {
        $user = Auth::user();

        if ($user->hasRole('Super-Admin')) {
            return Role::all()->pluck('name', 'id');
        } else {
            return Role::
            where('id', '!=', '1')->pluck('name', 'id');
        }
    }

    public function UpdateUser()
    {
        $validatedData = $this->validate();
        $role = Role::findById($this->role_id);
        $this->user->assignRole($role);

        $this->user->update($validatedData);

        session()->flash('message', 'User Updated succesfully');
        return redirect()->to('/user');
    }


    public function saveUserWithRole()
    {
        if ($this->selectedroles) {   // remove unchecked values that comes with false assign it
            $this->selectedroles = Arr::where($this->selectedroles, function ($value) {
                return $value;
            });
        }

        //$this->validate();
        $user = User::find($this->user_id);
        if ($user) {
            $user->syncRoles(Role::find(array_keys($this->selectedroles))->pluck('name'));
        }

        // $role=Role::find($this->selectedroles);

        $validatedData = $this->validate([
            'company_id' => 'required',
            'kind_id' => '',
            'selectedroles' => "required|array|min:1",
        ]);

        $this->user->update($validatedData);

        session()->flash('message', 'User Updated succesfully');
        return redirect()->to('/user');
    }

    protected function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'company_id' => 'required',
            'kind_id' => 'required',
            'role_id' => 'required',
            'selectedroles' => 'required|array|min:1',
        ];
    }

    protected $messages = [
        'selectedroles.required' => 'You must choose at least one role...',
        'company_id.required' => 'Choose your company...',
    ];
}
