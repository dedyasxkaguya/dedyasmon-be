<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhotoSeeder extends Seeder
{
    public function run(): void
    {
        $photos = [
            ['image'=>'images/img(1).jpg'],
            ['image'=>'images/img(2).jpg'],
            ['image'=>'images/img(3).jpg'],
            ['image'=>'images/img(4).jpg'],
            ['image'=>'images/img(5).jpg'],
            ['image'=>'images/img(6).jpg'],
            ['image'=>'images/img(7).jpg'],
            ['image'=>'images/img(8).jpg'],
            ['image'=>'images/img(9).jpg'],
            ['image'=>'images/img(10).jpg'],
            ['image'=>'images/img(11).jpg'],
            ['image'=>'images/img(12).jpg'],
            ['image'=>'images/img(13).jpg'],
            ['image'=>'images/img(14).jpg'],
            ['image'=>'images/img(15).jpg'],
            ['image'=>'images/img(16).jpg'],
            ['image'=>'images/img(17).jpg'],
        ];
        foreach($photos as $photo){
            DB::table('photos')->insert([
                'image'=>$photo['image'],
                'user'=>User::find(fake()->randomElement([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16])),
                'title'=>fake()->text(24),
            ]);
        }
    }
}
