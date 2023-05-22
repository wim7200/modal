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

        public $listeners = ['makeAdmin', 'setToUser'];

        public function mount()
        {
            $this->isAdmin = (bool)$this->model->getAttribute($this->field);
        }

        public function render()
        {
            return view('livewire.admin-button');
        }

        public function updating($field, $value)
        {
            $this->model->setAttribute($this->field, $value)->save();
            //dd($value,$field,$this->model->name);

            $user = $this->model;

            if ($value == true) {
                $this->emit('makeAdmin', $user);

            } else {
                $this->emit('setToUser', $user);
            }
            //dd($value,$field,$this->model->name);
        }

        public function makeAdmin(User $user)
        {
            //dd($user);

            $user->assignRole('admin');

        }

        public function setToUser(User $user)
        {
            //dd($user);

            $user->removeRole('admin');
            /*session()->flash('message','User set to User succesfully');*/
        }

        /*public function updated($field, $value)
        {
            $this->model->setAttribute($this->field, $value)->save();

            $user=$this->model;
            //dd($value,$field,$user);

            $this->field = false
                ? $user->syncRoles(['admin','user']) : $user->syncRoles(['user']);

        }*/

    }
