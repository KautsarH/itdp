<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('ms_MY');
        ini_set('memory_limit', '50G');
        \Eloquent::reguard();
        $this->command->info('User Seed');

        for ($i = 0; $i < 5; $i++) {
            $name = $faker->name;
            $temp = explode(' ', trim($name));
            $nickname = $temp[0];


            $user = \App\User::updateOrCreate([
                'email' => $nickname. '@dell.com',
            ], [
                'name' => $name,
                'password' => bcrypt('secret'),
                'role' => 'participant',
                'isLead' => 0,
                'totalPoints' => rand(1,100),
            ]);
                
        }

        $name = $faker->name;
        $temp = explode(' ', trim($name));
        $nickname = $temp[0];


        $user = \App\User::updateOrCreate([
            'email' => $nickname. '@dell.com',
        ], [
            'name' => $name,
            'password' => bcrypt('secret'),
            'role' => 'participant',
            'isLead' => 1,
            'totalPoints' => rand(1,100),
        ]);

         $name = $faker->name;
            $temp = explode(' ', trim($name));
            $nickname = $temp[0];


            $user = \App\User::updateOrCreate([
                'email' => $nickname. '@dell.com',
            ], [
                'name' => $name,
                'password' => bcrypt('secret'),
                'role' => 'program manager',
                'isLead' => 0,
                'totalPoints' => 0,
            ]);
                               
    }
}
