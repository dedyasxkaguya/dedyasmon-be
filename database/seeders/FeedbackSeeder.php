<?php

namespace Database\Seeders;

use App\Models\Feedback;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

use function Symfony\Component\Clock\now;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Feedback::factory(15)->create();;
        $datas = [
            // ulasan
            [
                'isUlasan' => true,
                'isBug' => false,
                'isData' => false,
                'isSaran' => false,
                'user_id' => mt_rand(1, 36),
                'rating' => mt_rand(1, 5),
                'text_ulasan' => fake()->realText(200, 2),
                'page_bug' => null,
                'text_bug' => null,
                'collumn_wrong' => null,
                'data_wrong' => null,
                'data_right' => null,
                'page_fitur' => null,
                'text_fitur' => null,
            ],
            // bug
            [
                'isUlasan' => false,
                'isBug' => true,
                'isData' => false,
                'isSaran' => false,
                'user_id' => mt_rand(1, 40),
                'rating' => null,
                'text_ulasan' => null,
                'page_bug' => fake()->randomElement(['profil', 'projek', 'pelajaran', 'kelas', 'gallery', 'feedback', 'login', 'register', 'guru', 'Lainnya']),
                'text_bug' => fake()->realText(200, 2),
                'collumn_wrong' => null,
                'data_wrong' => null,
                'data_right' => null,
                'page_fitur' => null,
                'text_fitur' => null,
            ],
            // siswa
            [
                'isUlasan' => false,
                'isBug' => false,
                'isData' => true,
                'isSaran' => false,
                'user_id' => mt_rand(1,40),
                'rating' => null,
                'text_ulasan' => null,
                'page_bug' => null,
                'text_bug' => null,
                'collumn_wrong' => collect(Schema::getColumnListing('siswas'))->random(),
                'data_right' => 'syka blyat',
                'page_fitur' => null,
                'text_fitur' => null,
            ],
            [
                'isUlasan' => false,
                'isBug' => false,
                'isData' => true,
                'isSaran' => false,
                'user_id' => mt_rand(1,40),
                'rating' => null,
                'text_ulasan' => null,
                'page_bug' => null,
                'text_bug' => null,
                'collumn_wrong' => collect(Schema::getColumnListing('siswas'))->random(),
                'data_right' => 'syka blyat',
                'page_fitur' => null,
                'text_fitur' => null,
            ],
            [
                'isUlasan' => false,
                'isBug' => false,
                'isData' => true,
                'isSaran' => false,
                'user_id' => mt_rand(1,40),
                'rating' => null,
                'text_ulasan' => null,
                'page_bug' => null,
                'text_bug' => null,
                'collumn_wrong' => collect(Schema::getColumnListing('siswas'))->random(),
                'data_right' => 'syka blyat',
                'page_fitur' => null,
                'text_fitur' => null,
            ],
            // ulasan
            [
                'isUlasan' => true,
                'isBug' => false,
                'isData' => false,
                'isSaran' => false,
                'user_id' => mt_rand(1,40),
                'rating' => null,
                'text_ulasan' => null,
                'page_bug' => null,
                'text_bug' => null,
                'collumn_wrong' => null,
                'data_wrong' => null,
                'data_right' => null,
                'page_fitur' => fake()->randomElement(['profil', 'projek', 'pelajaran', 'kelas', 'gallery', 'feedback', 'login', 'register', 'guru', 'Lainnya']),
                'text_fitur' => fake()->realText(200, 2),
            ],
        ];
        foreach ($datas as $data) {
            if ($data['isData']) {
                $wrong_collumn = $data['collumn_wrong'];
                $dataSiswa = DB::table('siswas')->select($wrong_collumn,'id')->inRandomOrder()->first();
                DB::table('feedback')->insert([
                    'isUlasan' => $data['isUlasan'],
                    'isBug' => $data['isBug'],
                    'isData' => $data['isData'],
                    'isSaran' => $data['isSaran'],
                    'user_id' => $dataSiswa->id,
                    'rating' => $data['rating'],
                    'text_ulasan' => $data['text_ulasan'],
                    'page_bug' => $data['page_bug'],
                    'text_bug' => $data['text_bug'],
                    'siswa_id' => $dataSiswa->id,
                    'collumn_wrong' => $wrong_collumn,
                    'data_wrong' => $dataSiswa->$wrong_collumn,
                    'data_right' => DB::table('siswas')->select($wrong_collumn,'id')->inRandomOrder()->first()->$wrong_collumn,
                    'page_fitur' => $data['page_fitur'],
                    'text_fitur' => $data['text_fitur'],
                    'updated_at' => now(),
                    'created_at' => now(),
                ]);
            } else {
                DB::table('feedback')->insert([
                    'isUlasan' => $data['isUlasan'],
                    'isBug' => $data['isBug'],
                    'isData' => $data['isData'],
                    'isSaran' => $data['isSaran'],
                    'user_id' => $data['user_id'],
                    'rating' => $data['rating'],
                    'text_ulasan' => $data['text_ulasan'],
                    'page_bug' => $data['page_bug'],
                    'text_bug' => $data['text_bug'],
                    'siswa_id' => null,
                    'collumn_wrong' => null,
                    'data_wrong' => null,
                    'data_right' => $data['data_right'],
                    'page_fitur' => $data['page_fitur'],
                    'text_fitur' => $data['text_fitur'],
                    'updated_at' => now(),
                    'created_at' => now(),
                ]);
            }
        }
    }
}
