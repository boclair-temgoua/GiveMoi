<?php

use Illuminate\Database\Seeder;

class CompileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 0; $i < 2; $i++){
            \Illuminate\Support\Facades\DB::table('testimonials')->insert([
                'fullname' =>'Temgoua'.$i,
                'Body' =>'Temgoua'.$i,
                'role' =>'@CEO'.$i,
                'created_at' => Carbon\Carbon::now(),

            ]);
        }
        for ($i = 0; $i < 2; $i++){
            \Illuminate\Support\Facades\DB::table('abouts')->insert([
                'fullname' =>'Temgoua'.$i,
                'Body' =>'Temgoua'.$i,
                'role' =>'@CEO'.$i,
                'created_at' => Carbon\Carbon::now(),

            ]);
        }
        for ($i = 0; $i < 2; $i++){
            \Illuminate\Support\Facades\DB::table('tags')->insert([
                'name' =>'Temgoua'.$i,
                'created_at' => Carbon\Carbon::now(),

            ]);
        }
        for ($i = 0; $i < 2; $i++){
            \Illuminate\Support\Facades\DB::table('categories')->insert([
                'name' =>'Temgoua'.$i,
                'slug' =>'temgoua'.$i,
                'created_at' => Carbon\Carbon::now(),

            ]);
        }
        for ($i = 0; $i < 2; $i++){
            \Illuminate\Support\Facades\DB::table('links')->insert([
                'name' =>'test'.$i,
                'created_at' => Carbon\Carbon::now(),

            ]);
        }
        for ($i = 0; $i < 4; $i++){
            \Illuminate\Support\Facades\DB::table('admins')->insert([
                'username' =>'bokino1'.$i,
                'name' =>'Temgoua'.$i,
                'email' => "temgoua201$i@yahoo.fr",
                "password" => bcrypt('0000000'),
                'created_at' => Carbon\Carbon::now(),

            ]);
        }
        for ($i = 0; $i < 900; $i++){
            \Illuminate\Support\Facades\DB::table('users')->insert([
                'username' =>'bokino1'.$i,
                'name' =>'Temgoua'.$i,
                'email' => "temgoua201$i@yahoo.fr",
                "password" => bcrypt('0000000'),
                'created_at' => Carbon\Carbon::now(),

            ]);
        }
        for ($i = 0; $i < 5; $i++){
            \Illuminate\Support\Facades\DB::table('posts')->insert([
                'title' =>'bokino1'.$i,
                'slug' =>'temgoua'.$i,
                'category' =>'temgoua'.$i,
                'body' =>'temgouajesuis encrisedepobelle'.$i,
                'created_at' => Carbon\Carbon::now(),

            ]);
        }
        for ($i = 0; $i < 16; $i++){
            \Illuminate\Support\Facades\DB::table('events')->insert([
                'title' =>'bokino1'.$i,
                'country' =>'Italia1'.$i,
                'city' =>'Genova1'.$i,
                'slug' =>'temgoua'.$i,
                'category' =>'temgoua'.$i,
                'user_id' =>'1',
                'body' =>'temgouajesuis encrisedepobelle'.$i,
                'name' =>'Temoua Boclair'.$i,
                'created_at' => Carbon\Carbon::now(),

            ]);
        }


        // $this->call(UsersTableSeeder::class);
    }
}