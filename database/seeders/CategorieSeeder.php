<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->delete();
        DB::table('categories')->insert([
            'libelle' => 'Roman'
        ]);
        DB::table('categories')->insert([
            'libelle' => 'Jeunesse'
        ]);
        DB::table('categories')->insert([
            'libelle' => 'Fiction'
        ]);
    }
}
