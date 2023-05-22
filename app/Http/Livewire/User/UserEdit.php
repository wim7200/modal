<?php

    namespace App\Http\Livewire\User;

    use App\Models\Company;
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
        public $name, $email, $company, $user_id;
        public $company_id, $role_id;
        public $notify;

        public $selectedroles = [];
        public $role;

        protected $listeners = [
            'UpdateUser', 'saveUserWithRole',
        ];

        protected function rules()
        {
            return [
                'name' => 'required',
                'email' => 'required',
                'company_id' => 'required',
                'role_id' => 'required',
                'selectedroles' => ['required'],
            ];
        }

        public function mount(User $user)
        {
            $this->user = $user;
            $this->user_id = $user->id;
            $this->name = $user->name;
            $this->email = $user->email;
            //$this->company=$user->company_id;
            //$this->role=$user->role_id;
            //$this->notify=$user->notify;
        }

        public function render()
        {
            $this->authorize('user-edit');
            return view('livewire.user.user-edit', [
                'companies' => Company::all(),
                'roles' => $this->roles,
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
            ]);

            $this->user->update($validatedData);

            session()->flash('message', 'User Updated succesfully');
            return redirect()->to('/user');
        }
    }
