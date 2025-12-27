<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'name' => 'Front End Project',
                'slug' => 'front-end',
            ],
            [
                'name' => 'Back End Project',
                'slug' => 'back-end',
            ],
            [
                'name' => 'Arduino Project',
                'slug' => 'arduino',
            ],
            [
                'name' => 'Other Project',
                'slug' => 'other',
            ],
        ];
        foreach ($datas as $data) {
            DB::table('categories')->insert([
                'name' => $data['name'],
                'slug' => $data['slug'],
                'updated_at' => now(),
                'created_at' => now(),
            ]);
        }
    }
}
