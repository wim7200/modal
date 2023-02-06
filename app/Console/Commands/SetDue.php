<?php

namespace App\Console\Commands;

use App\Models\Tool;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SetDue extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'set:due';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'set Tool to due';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Tool::where('duetime','<',now())
            ->where('condition_id','=',1)
            ->update(['condition_id'=>3]);

        return Command::SUCCESS;
    }
}
