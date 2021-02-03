<?php

use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        ini_set('memory_limit', '50G');
        \Eloquent::reguard();
        $this->command->info('Event Seed');

        $user_id = \App\User::where('isLead',1)->inRandomOrder()->get()->first();

        for ($i = 0; $i < 5; $i++) {


            $event= \App\Event::updateOrCreate([
                'title' => $faker->bs,
                'description' => $faker->text,
                'date_start' => $faker->date($format = 'Y-m-d'),
                'date_end' =>  $faker->date($format = 'Y-m-d'),
                'seat' => rand(1,60),
                'link' => $faker->url,
                'points' => rand(1,100),
                'user_id' => $user_id->id,  //where isLead =1
            ]);
                
        }

                               
    }
}
