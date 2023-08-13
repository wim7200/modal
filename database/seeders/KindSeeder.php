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
            'description' => 'zuurstof meter',
        ]);
        Kind::create([
            'name' => 'SO2',
            'img' => 'noImg',
            'description' => 'SO2 meter',
        ]);
        Kind::create([
            'name' => 'benzeen',
            'img' => 'noImg',
            'description' => 'benzeen meter',
        ]);
        Kind::create([
            'name' => 'NH3',
            'img' => 'noImg',
            'description' => 'Ammoniak meter',
        ]);
        Kind::create([
            'name' => 'Led Lamp',
            'img' => 'noImg',
            'description' => 'LED draaglamp',
        ]);
        Kind::create([
            'name' => 'WT',
            'img' => 'noImg',
            'description' => 'Walky Talky',
        ]);
        Kind::create([
            'name' => 'ScanGrip',
            'img' => 'noImg',
            'description' => 'draagbare LED verlichting',
        ]);
        Kind::create([
            'name' => 'Docking Unit',
            'img' => 'noImg',
            'description' => 'Bump station',
        ]);
        Kind::create([
            'name' => 'Portagas Bump Gas',
            'img' => 'noImg',
            'description' => 'Calibratie gas',
        ]);

    }
}

