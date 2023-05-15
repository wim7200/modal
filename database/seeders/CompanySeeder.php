<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'name'=>'Caprolactam',
            'number'=>'C301',
        ]);
        Company::create ([
            'name'=>'Hydroyalamine',
            'number'=>'A120',
        ]);

        Company::create ([
            'name'=>'Anon',
            'number'=>'C420',
        ]);
        Company::create ([
            'name'=>'Ammoniak',
            'number'=>'C500',
        ]);
    }
}
