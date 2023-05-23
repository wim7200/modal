<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Super-Admin',
            'email' => 'sad@admin.com',
            'email_verified_at' => now(),
            'profile_photo_path'=>'profile-photos/hert.jpg',
            'password' => bcrypt('appel19'),
            'approved_at'=>now(),
            'approved_by'=>'Wim Torfs',
        ])->assignRole(['super-admin'])->markEmailAsVerified();

        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'approved_at'=>now(),
            'approved_by'=>'Wim Torfs',
        ])->assignRole('admin')->markEmailAsVerified();

        User::create([
            'name' => 'manager',
            'email' => 'man@man.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'approved_at'=>now(),
            'approved_by'=>'Wim Torfs',
        ])->assignRole('manager')->markEmailAsVerified();


        User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'approved_at'=>now(),
            'approved_by'=>'Wim Torfs',
        ])->assignRole('user')->markEmailAsVerified();


    }
}
