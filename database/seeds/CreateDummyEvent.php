<?php

use App\Model\user\event;
use Illuminate\Database\Seeder;

class CreateDummyEvent extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = ['ItSolutionStuff.com', 'Webprofile.me', 'HDTuto.com', 'Nicesnippets.com'];


        foreach ($events as $key => $value) {

            Event::create(['title'=>$value]);
            Event::create(['slug'=>$value]);

        }
    }
}
