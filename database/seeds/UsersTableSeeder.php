<?php

use App\Model\user\event;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 5)->create()->each(function($u) {
            if ($u->id == 1) {
                $u->assignRole('administrator');
            } else {
                $u->assignRole('user');
            }
        });
        factory(Event::class, 8)->create(['user_id'=>1]);
    }
}
