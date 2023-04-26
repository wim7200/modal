<?php

namespace App\Observers;

use App\Mail\UserRegistered;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class UserObserver
{
    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    public $afterCommit = true;

    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        $users=User::where('name','=','Wim Torfs')->get();
        $newUser=User::orderBy('id','DESC')->first();

        foreach ($users as $user) {
            Mail::to($user)->send(new UserRegistered($newUser));
        }

    }
}
