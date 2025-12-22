<?php

namespace Database\Seeders;

// use Illuminate\Container\Attributes\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubjectCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comments = [
            [
                'subject_id'=>3,
                'username'=>'dedyas',
                'text'=>'test123'
            ],
            [
                'subject_id'=>3,
                'username'=>'dedyas',
                'text'=>fake()->text(24)
            ],
            [
                'subject_id'=>1,
                'username'=>'dedyas',
                'text'=>fake()->text(24)
            ],
            [
                'subject_id'=>2,
                'username'=>'dirwan',
                'text'=>fake()->text(24)
            ],
        ];
        foreach( $comments as $c){
            DB::table('subject_comments')->insert([
                'subject_id'=>$c['subject_id'],
                'username'=>$c['username'],
                'text'=>$c['text'],
            ]);
        }
    }
}
