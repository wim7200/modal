<?php

namespace App\Http\Controllers;

use App\Mail\DueTimeMail;
use App\Models\Tool;
use App\Models\User;
use Carbon\Carbon;
use Mail;


class SendEmailController extends Controller
{
    public function index()
    {
        $mailtime = Carbon::now()->add(7, 'day');
        //dd($mailtime);

        $tools = Tool::whereDate(('duetime'), '=', $mailtime)->get()->pluck('duetime', 'name');
        //dd($tools);

        $users = User::where('notify', '=', 1)->get()->pluck('email');
        dd($tools, $users);

        /* $data=[
             'tools'=>$tools,
         ];*/
        foreach ($users as $user)
            Mail::to($user)->send(new dueTimeMail($tools));

        return Redirect('tool');

    }

}
