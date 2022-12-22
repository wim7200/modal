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
        Condition::create(['name'=>'OK']);
        Condition::create(['name'=>'uit dienst']);
        Condition::create(['name'=>'in calibratie']);
        Condition::create(['name'=>'in herstelling']);
    }
}
