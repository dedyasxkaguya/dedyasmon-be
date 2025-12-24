<?php

namespace Database\Seeders;

use App\Models\SubjectComment;
use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function Symfony\Component\Clock\now;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [
            [
                'name' => 'Indonesia',
                'days' => [
                    [
                        'type' => 'double',
                        'name' => 'Senin',
                    ],
                    [
                        'type' => 'double',
                        'name' => 'Jumat',
                    ],
                ],
            ],
            [
                'name' => 'English',
                'days' => [
                    [
                        'type' => 'double',
                        'name' => 'Senin',
                    ],
                    [
                        'type' => 'double',
                        'name' => 'Kamis',
                    ],
                ],
            ],
            [
                'name' => 'DPK',
                'days' => [
                    [
                        'type' => 'double',
                        'name' => 'Senin',
                    ],
                    [
                        'type' => 'double',
                        'name' => 'Rabu',
                    ],
                ],
            ],
            [
                'name' => 'PAI',
                'days' => [
                    'type' => 'single',
                    'name' => 'Selasa',
                ],
            ],
            [
                'name' => 'PIPAS',
                'days' => 
                [
                    [
                        'type' => 'double',
                        'name' => 'Selasa',
                    ],
                    [
                        'type' => 'double',
                        'name' => 'Jumat',
                    ],
                ]
            ],
            [
                'name' => 'Informatika',
                'days' => [
                    'type' => 'single',
                    'name' => 'Selasa',
                ],
            ],
            [
                'name' => 'KKA',
                'days' => [
                    'type' => 'single',
                    'name' => 'Rabu',
                ],
            ],
            [
                'name' => 'Seni Budaya',
                'days' => [
                    'type' => 'single',
                    'name' => 'Rabu',
                ],
            ],
            [
                'name' => 'Sejarah',
                'days' => [
                    'type' => 'single',
                    'name' => 'Kamis',
                ],
            ],
            [
                'name' => 'Matematika',
                'days' => [
                    'type' => 'single',
                    'name' => 'Kamis',
                ],
            ],
            [
                'name' => 'Pancasila',
                'days' => 
                [
                    'type' => 'single',
                    'name' => 'Kamis',
                ],
            ],
            [
                'name' => 'PJOK',
                'days' => [
                    'type' => 'single',
                    'name' => 'Jumat',
                ],
            ],
        ];
        foreach ($subjects as $subject) {
            DB::table('subjects')->insert([
                'name' => $subject['name'],
                'days' => json_encode($subject['days']),
                'teacher_name' => Teacher::where('subject', $subject['name'])->first()->name,
                'teacher_id' => Teacher::where('subject', $subject['name'])->first()->id,
                // 'comments'=>json_encode(SubjectComment::where('subject_name',$subject['name'])->get()),
                'rating' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
