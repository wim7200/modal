<?php

namespace Database\Seeders;

use App\Models\Condition;
use App\Models\Kind;
use App\Models\Tool;
use Database\Factories\ClientFactory;
use Database\Factories\KindFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       //User::factory(10)->create();
       //Client::factory(5)->create();
       //Kind::factory(5)->create();
       //Tool::factory(5)->create();
       //Condition::factory(10)->create();


        $this->call(KindSeeder::class);
        $this->call(ConditionSeeder::class);
        $this->call(ClientSeeder::class);
        $this->call(CompanySeeder::class);

        $this->call(ToolSeeder::class);


        $this->call(PermissionTableSeeder::class);
        $this->call(RolesAndPermissionsSeeder::class);
        //$this->call(RoleSeeder::class); zit in vorige

        $this->call(AdminSeeder::class);

    }

}
