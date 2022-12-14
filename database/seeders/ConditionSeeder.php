<?php

namespace Database\Seeders;

use App\Models\Condition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Condition::create(['name'=>'meting OK']);
        Condition::create(['name'=>'meting uit dienst']);
        Condition::create(['name'=>'meting in calibratie']);
        Condition::create(['name'=>'meting in herstelling']);
    }
}
