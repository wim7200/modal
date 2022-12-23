<?php

namespace Database\Seeders;

use App\Models\Kind;
use Illuminate\Database\Seeder;

class KindSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kind::create([
            'name' => 'explosie/zuurstof',
            'img' => 'noImg',
            'description' =>'zuurstof meter',
            ]);
        Kind::create([
            'name' => 'SO2',
            'img' => 'noImg',
            'description' =>'SO2 meter',
        ]);
        Kind::create([
            'name' => 'benzeen',
            'img' => 'noImg',
            'description' =>'benzeen meter',
        ]);
   }
}

