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
                'icon' => 'browser-chrome',
            ],
            [
                'name' => 'Back End Project',
                'slug' => 'back-end',
                'icon' => 'database',
            ],
            [
                'name' => 'Arduino Project',
                'slug' => 'arduino',
                'icon' => 'ui-radios-grid',
            ],
            [
                'name' => 'Other Project',
                'slug' => 'other',
                'icon' => 'braces',
            ],
        ];
        foreach ($datas as $data) {
            DB::table('categories')->insert([
                'name' => $data['name'],
                'slug' => $data['slug'],
                'icon' => $data['icon'],
                'updated_at' => now(),
                'created_at' => now(),
            ]);
        }
    }
}
