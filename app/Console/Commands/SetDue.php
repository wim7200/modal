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
        /*$tools =Tool::whereDate('duetime','<',now())->get();*/

        /*if (!$tools->isEmpty()){
            foreach ($tools as $tool)
            { $tool->condition = '3';
                $this->$tool->condition= '1';}
            }else{Log::info("all tool up to date");}*/

        Tool::where('duetime','<',now())
            ->where('condition_id','=',1)
            ->update(['condition_id'=>3]);

        /*Log::info("$tools");*/

        return Command::SUCCESS;
    }
}
