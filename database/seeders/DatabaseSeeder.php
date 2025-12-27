<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Siswa;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test ',
        //     'email' => 'test@example.com',
        // ]);
        $users = [
            [
                'name' => 'admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => 'admin123',
                'role' => 'ADMIN',
            ],
            [
                'name' => 'Dedy Anang Setiawan',
                'username' => 'dedyas',
                'email' => 'dedyas031209@gmail.com',
                'password' => 'dedyas123',
                'role' => 'ADMIN',
            ],
            [
                'name' => 'Alzaro Rashad Prakas',
                'username' => 'AlzaroRP',
                'email' => 'alzaro123@gmail.com',
                'password' => 'jaroganteng',
                'role' => 'GURU',
            ],
            [
                'name' => 'Aryo Ajisadewo',
                'username' => 'ajinomoto',
                'email' => 'ajisadewo@gmail.com',
                'password' => 'ajiganteng',
                'role' => 'SISWA',
            ],

        ];
        $accounts = [
            ['id' => 1, 'email' => 'adhelia_kharunissa_tofari@gmail.com', 'nis' => '202523180'],
            ['id' => 2, 'email' => 'adilah_hammam_akram@gmail.com', 'nis' => '202523181'],
            ['id' => 3, 'email' => 'adinda_afifah_putri@gmail.com', 'nis' => '202523182'],
            ['id' => 4, 'email' => 'adzan_ahlil_fiqri@gmail.com', 'nis' => '202523183'],
            ['id' => 5, 'email' => 'aira_saskia_sahwa@gmail.com', 'nis' => '202523184'],
            ['id' => 6, 'email' => 'almira_rakhadhiya_aryacitadi@gmail.com', 'nis' => '202523185'],
            ['id' => 7, 'email' => 'annisa_maharani@gmail.com', 'nis' => '202523186'],
            ['id' => 8, 'email' => 'annisah_agustin@gmail.com', 'nis' => '202523187'],
            ['id' => 9, 'email' => 'arif_raffy_fadlurahman@gmail.com', 'nis' => '202523188'],
            ['id' => 10, 'email' => 'aryo_aji_sadewo@gmail.com', 'nis' => '202523189'],
            ['id' => 11, 'email' => 'cahaya@gmail.com', 'nis' => '202523190'],
            ['id' => 12, 'email' => 'callyla_sakhi_faiha@gmail.com', 'nis' => '202523191'],
            ['id' => 13, 'email' => 'dedy_anang_setiawan@gmail.com', 'nis' => '202523192'],
            ['id' => 14, 'email' => 'deje_enne_dani_rosaline@gmail.com', 'nis' => '202523193'],
            ['id' => 15, 'email' => 'dewa_nyoman_zed_zamuel_zouseuf@gmail.com', 'nis' => '202523194'],
            ['id' => 16, 'email' => 'fersya_wulanda@gmail.com', 'nis' => '202523195'],
            ['id' => 17, 'email' => 'ihsan_hafidz_assidiq@gmail.com', 'nis' => '202523196'],
            ['id' => 18, 'email' => 'intan_nurhikmah@gmail.com', 'nis' => '202523197'],
            ['id' => 19, 'email' => 'ksatria_ali@gmail.com', 'nis' => '202523198'],
            ['id' => 20, 'email' => 'marcellino@gmail.com', 'nis' => '202523199'],
            ['id' => 21, 'email' => 'muhammad_fauzan_kamal_putra@gmail.com', 'nis' => '202523200'],
            ['id' => 22, 'email' => 'muhammad_rafa_fadilah@gmail.com', 'nis' => '202523201'],
            ['id' => 23, 'email' => 'najwa_fajrina_ayatul_husna@gmail.com', 'nis' => '202523202'],
            ['id' => 24, 'email' => 'nauval_arief_hibatulloh@gmail.com', 'nis' => '202523203'],
            ['id' => 25, 'email' => 'naysheilla_bilqis_heryanto@gmail.com', 'nis' => '202523204'],
            ['id' => 26, 'email' => 'nazmu_toriq@gmail.com', 'nis' => '202523205'],
            ['id' => 27, 'email' => 'qisya_awfiyah_ramadhani@gmail.com', 'nis' => '202523206'],
            ['id' => 28, 'email' => 'rambuana_ahmad_adnan@gmail.com', 'nis' => '202523207'],
            ['id' => 29, 'email' => 'rayhan_saputra@gmail.com', 'nis' => '202523208'],
            ['id' => 30, 'email' => 'rayvan_irfansyah@gmail.com', 'nis' => '202523209'],
            ['id' => 31, 'email' => 'rivael_lionel_messi_boryan@gmail.com', 'nis' => '202523210'],
            ['id' => 32, 'email' => 'saddam_qadafi_nurama@gmail.com', 'nis' => '202523211'],
            ['id' => 33, 'email' => 'safa_oktafianti@gmail.com', 'nis' => '202523212'],
            ['id' => 34, 'email' => 'salsa_nabila@gmail.com', 'nis' => '202523213'],
            ['id' => 35, 'email' => 'siti_syeera_azzahrah@gmail.com', 'nis' => '202523214'],
            ['id' => 36, 'email' => 'syadira_putri_aulia@gmail.com', 'nis' => '202523215'],
        ];
        $this->call(SiswaSeeder::class);
        
        foreach ($accounts as $user) {
            $siswa = Siswa::find($user['id']);
            $name = Str::of($siswa->name)->explode(' ');
            DB::table('users')->insert([
                'slug' => Str::random(8),
                'name' => $siswa->name,
                'username' => Str::lower($name[0]) . '.' . (isset($name[1])? $name[1][0] : '') . (isset($name[2]) ? $name[2][0] : ' '),
                // 'username' => Str::lower($name[0]),
                'email' => $user['email'],
                'role' => 'SISWA',
                'password' => Hash::make($user['nis']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        foreach ($users as $user) {
            DB::table('users')->insert([
                'slug' => Str::random(8),
                'name' => $user['name'],
                'username' => $user['username'],
                'email' => $user['email'],
                'role' => $user['role'],
                'password' => Hash::make($user['password']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        $this->call(SubjectCommentSeeder::class);
        $this->call(TeacherCommentSeeder::class);
        $this->call(TeacherSeeder::class);
        $this->call(SubjectSeeder::class);
        $this->call(ScheduleSeeder::class);
        $this->call(PhotoSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(CategorySeeder::class);
    }
}
