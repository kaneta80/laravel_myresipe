<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'category'=>'肉料理'
            ],
            [
                'category'=>'魚料理'
            ],
            [
                'category'=>'汁物'
            ],
            [
                'category'=>'ご飯もの'
            ],
            [
                'category'=>'野菜'
            ],
            [
                'category'=>'お菓子'
            ],
            [
                'category'=>'麺'
            ],
        ]);
    }
}
