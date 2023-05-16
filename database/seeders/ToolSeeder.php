<?php

namespace Database\Seeders;

use App\Models\Condition;
use App\Models\Kind;
use App\Models\Tool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ToolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tool::factory()
            ->count(15)
            ->create();
    }
}
