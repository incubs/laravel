<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\User::unguard();
        $faker = \Faker\Factory::create('ne_NP');


        for ($i = 1; $i<=1;$i++) {
            \App\Models\User::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->email,
                'role_id' => 1,
                'password' => 'password'
            ]);
        }
    }
}
