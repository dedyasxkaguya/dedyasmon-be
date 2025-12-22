<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function Illuminate\Support\now;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teachers = [
            [
                'name' => 'Alzaro Rashad Prakas S.Tr',
                'subject' => 'DPK',
            ],
            [
                'name' => 'Sudirwan',
                'subject' => 'B. Indonesia',
            ],
            [
                'name' => 'Neneng Desi M.',
                'subject' => 'B. Inggris',
            ],
            [
                'name' => 'Wanto Ari Wibowo',
                'subject' => 'DPK',
            ],
            [
                'name' => 'Mutmainah Naiyan',
                'subject' => 'PAI',
            ],
            [
                'name' => 'Siti Hajar M.',
                'subject' => 'PIPAS',
            ],
            [
                'name' => 'Wanto Ari Wibowo',
                'subject' => 'Informatika ',
            ],
            [
                'name' => 'Amrul Khairullah',
                'subject' => 'KKA',
            ],
            [
                'name' => 'Sri Wahyuni',
                'subject' => 'Seni Budaya',
            ],
            [
                'name' => 'Windi Fauziah',
                'subject' => 'Sejarah',
            ],
            [
                'name' => 'Agustini M.',
                'subject' => 'Matematika',
            ],
            [
                'name' => 'Hafizh T.',
                'subject' => 'Pancasila',
            ],
            [
                'name' => 'Luke Nugroho',
                'subject' => 'PJOK',
            ],
        ];

        foreach ($teachers as $teacher) {
            DB::table('teachers')->insert([
                'name' => $teacher['name'],
                'subject' => $teacher['subject'],
                'rating'=>0,
                'favorites'=>0,
                'created_at'=>now(),
                'updated_at'=>now()
            ]);
        }
    }
}
