<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schedules = [
            [
                'day' => 'senin',
                'activity' => [
                    [

                        'type' => 'Minggu 1&2',
                        'name' => 'Upacara',
                    ],
                    [
                        'type' => 'Minggu 3&4',
                        'name' => 'Apel',
                    ],
                ],
                'subject_0' => 1,
                'subject_1' => 2,
                'subject_2' => 3,
                'subject_3' => null,
                'uniform' => 'Putih Abu',
                'wearpack' => true,
            ],
            [
                'day' => 'selasa',
                'activity' => [
                    'type' => 'Konsisten',
                    'name' => 'BIMTAQ',
                ],
                'subject_0' => 4,
                'subject_1' => 5,
                'subject_2' => 6,
                'subject_3' => null,
                'uniform' => 'Putih Abu',
                'wearpack' => false,
            ],
            [
                'day' => 'rabu',
                'activity' => [
                    'type' => 'Konsisten',
                    'name' => 'Pramuka',
                ],
                'subject_0' => 7,
                'subject_1' => 8,
                'subject_2' => 3,
                'subject_3' => null,
                'uniform' => 'Pramuka',
                'wearpack' => true,
            ],
            [
                'day' => 'kamis',
                'activity' => [
                    'type' => 'Konsisten', 'name' => 'Literasi',
                ],
                'subject_0' => 9,
                'subject_1' => 10,
                'subject_2' => 11,
                'subject_3' => 2,
                'uniform' => 'Putih Abu',
                'wearpack' => false,
            ],
            [
                'day' => 'jumat',
                'activity' => [
                    [
                        'type' => 'Bergantian',
                        'name' => 'senam',
                    ],
                    [
                        'type' => 'Bergantian',
                        'name' => 'sarapan',
                    ],
                    [
                        'type' => 'Bergantian',
                        'name' => 'kebersihan',
                    ],
                ],
                'subject_0' => 11,
                'subject_1' => 1,
                'subject_2' => 5,
                'subject_3' => null,
                'uniform' => 'Sadariah',
                'wearpack' => false,
            ],
        ];
        foreach ($schedules as $s) {
            DB::table('schedules')->insert([
                'day' => $s['day'],
                'activity' => json_encode($s['activity']),
                'subject_0' => json_encode(Subject::find($s['subject_0'])),
                'subject_1' => json_encode(Subject::find($s['subject_1'])),
                'subject_2' => json_encode(Subject::find($s['subject_2'])),
                'subject_3' => json_encode(Subject::find($s['subject_3'])),
                'uniform' => $s['uniform'],
                'wearpack' => $s['wearpack'],
            ]);
        }
    }
}
