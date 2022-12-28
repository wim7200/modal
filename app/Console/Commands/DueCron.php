<?php

namespace App\Console\Commands;

use App\Mail\DueTimeMail;
use App\Models\Tool;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class DueCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'due:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send mail when timedue is reached ';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Log::info("Due Cron is working fine!");

        $mailtime=Carbon::now()->add(28,'day');
        $tools= Tool::whereDate('duetime','=',$mailtime)->get();
        $users=User::where('notify','=',1)->get();

        if (!$tools->isEmpty()){
            foreach ($users as $user)
            { Mail::to($user->email)->send(new DueTimeMail($user, $tools)); }
            }else{ Log::info("No tools Due!!!!");}


       return Command::SUCCESS;
    }
}
