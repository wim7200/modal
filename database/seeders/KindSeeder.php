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
            'img' => 'X-am_3500.png',
            'description' =>'zuurstof meter',
            ]);
        Kind::create([
            'name' => 'SO2',
            'img' => 'X-am_5000.png',
            'description' =>'SO2 meter',
        ]);
        Kind::create([
            'name' => 'benzeen',
            'img' => '300.jpg',
            'description' =>'benzeen meter',
        ]);
   }
}

