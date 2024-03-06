<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->delete();
        DB::table('users')->insert([
            'name' => 'Durand',
            'email' => 'durand@test.com',
            'password' => Hash::make('toto'),
        ]);
        DB::table('users')->insert([
            'name' => 'Dupont',
            'email' => 'dupont@test.com',
            'password' => Hash::make('toto'),
        ]);

    }
}
