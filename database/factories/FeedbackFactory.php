<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feedback>
 */
class FeedbackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // ulasan
            // [
                'isUlasan' => true,
                'isBug' => false,
                'isData' => false,
                'issaran' => false,
                'user_id'=>mt_rand(1,36),
                'rating'=>mt_rand(1,5),
                'text_ulasan'=>fake()->realText(200,2),
                'page_bug'=>null,
                'text_bug'=>null,
                'siswa_id'=>null,
                'collumn_wrong'=>null,
                'data_wrong'=>null,
                'data_right'=>null,
                'page_fitur'=>null,
                'text_fitur'=>null
            // ],
            // bug
            // [
            //     'isUlasan' => false,
            //     'isBug' => true,
            //     'isData' => false,
            //     'issaran' => false,
            //     'user_id'=>mt_rand(1, 40),
            //     'rating'=>null,
            //     'text_ulasan'=>null,
            //     'page_bug'=>fake()->randomElement(['profil', 'projek', 'pelajaran', 'kelas', 'gallery', 'feedback', 'login', 'register', 'guru', 'Lainnya']),
            //     'text_bug'=>fake()->realText(200,2),
            //     'siswa_id'=>null,
            //     'collumn_wrong'=>null,
            //     'data_wrong'=>null,
            //     'data_right'=>null,
            //     'page_fitur'=>null,
            //     'text_fitur'=>null
            // ],
            // siswa
            // [
            //     'isUlasan' => false,
            //     'isBug' => false,
            //     'isData' => true,
            //     'issaran' => false,
            //     'user_id'=>null,
            //     'rating'=>null,
            //     'text_ulasan'=>null,
            //     'page_bug'=>null,
            //     'text_bug'=>null,
            //     'siswa_id'=>mt_rand(1,36),
            //     // 'collumn_wrong'=>collect($columns)->random,
            //     'collumn_wrong'=>'blyaaat',
            //     // 'data_wrong'=>DB::select(`SELECT {{ $columns }} FROM siswas`),
            //     'data_wrong'=>'blyat',
            //     'data_right'=>'syka blyat',
            //     'page_fitur'=>null,
            //     'text_fitur'=>null
            // ],
            // ulasan
            // [
            //     'isUlasan' => true,
            //     'isBug' => false,
            //     'isData' => false,
            //     'issaran' => false,
            //     'user_id'=>null,
            //     'rating'=>null,
            //     'text_ulasan'=>null,
            //     'page_bug'=>null,
            //     'text_bug'=>null,
            //     'siswa_id'=>null,
            //     'collumn_wrong'=>null,
            //     'data_wrong'=>null,
            //     'data_right'=>null,
            //     'page_fitur'=>fake()->randomElement(['profil', 'projek', 'pelajaran', 'kelas', 'gallery', 'feedback', 'login', 'register', 'guru', 'Lainnya']),
            //     'text_fitur'=>fake()->realText(200,2)
            // ],
        ];
    }
}
