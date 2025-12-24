<?php

namespace Database\Seeders;

use App\Models\TeacherComment;
use Database\Factories\TeacherCommentFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comments = [
            [
                'username'=>'dedyas',
                'teacher_id'=>1,
                'text'=>fake()->text(64)
            ],
            [
                'username'=>'dedyas',
                'teacher_id'=>1,
                'text'=>'test'
            ],
            [
                'username'=>'admin',
                'teacher_id'=>1,
                'text'=>fake()->text(64)
            ],
            [
                'username'=>'blyat',
                'teacher_id'=>2,
                'text'=>fake()->text(64)
            ],
            [
                'username'=>'dedyas',
                'teacher_id'=>1,
                'text'=>fake()->text(64)
            ],
        ];
        foreach($comments as $c){
            DB::table('teacher_comments')->insert([
                'username'=>$c['username'],
                'teacher_id'=>$c['teacher_id'],
                'text'=>$c['text'],
                'rating'=>fake()->randomElement([1,2,3,4,5]),
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);

            TeacherComment::factory(16384)->create();
        }
    }
}
