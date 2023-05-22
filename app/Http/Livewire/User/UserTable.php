<?php

    namespace App\Http\Livewire\User;

    use App\Models\User;
    use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
    use Illuminate\Support\Facades\Auth;
    use Livewire\Component;
    use Livewire\WithPagination;

    class UserTable extends Component
    {
        use AuthorizesRequests;
        use WithPagination;

        public User $user;

        public $search = '';
        public $sortField = 'name';
        public $sortAsc = true;

        public function render()
        {
            $this->authorize('user-list');
            return view('livewire.user.user-table', [
                'users' => $this->users,
            ]);
        }

        public function getUsersProperty()
        {
            $user = Auth::user();

            if ($user->hasRole('Super-Admin')) {
                return User::with(['company'])
                    ->paginate(20);
            } else {
                return User::with(['company'])
                    ->where('id', '!=', '1')
                    ->paginate(10);
            }
        }

        public function sortBy($field)
        {
            if ($this->sortField === $field) {
                $this->sortAsc = !$this->sortAsc;
            } else {
                $this->sortAsc = true;
            }
            $this->sortField = $field;
        }
    }
