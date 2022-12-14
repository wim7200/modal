<?php

namespace App\Console\Commands;

use App\Mail\DueTimeMail;
use App\Models\Tool;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;


class TimeDueCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'timedue:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send mail when timedue is reached';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       /* $users = User::whereMonth('date_of_birth', '=', date('m'))->whereDay('date_of_birth', '=', date('d'))->get();

        foreach($users as $key => $user)
        {
            $email = $user->email;

            Mail::to($email)->send(new HappyBirthdayMail($user));
        }*/

        /*Log::info("Testing with cron job.");*/
        /*return Command::SUCCESS;*/

        $mailtime=Carbon::now()->add(-7,'day');
        Log::info($mailtime);
        $tools= Tool::whereDate(('duetime'),'<',$mailtime)->get();

        foreach ($tools as $key =>$tool)
        {
            Log::info($tool->name);
        }
        $users=User::all();

        foreach ($users as $key =>$user)
        {
            $email=$user->email;
            Log::info($user->email);
            Mail::to($email)->send(new DueTimeMail($user));
        }
    }
}
