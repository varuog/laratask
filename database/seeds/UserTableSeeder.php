<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     * @todo Should use Separate Eloquent Model Factory
     * @return void
     */
    public function run() {
        $faker = Faker\Factory::create();
        DB::table('users')->insert([
                'created_at' => $faker->dateTime,
                'updated_at' => $faker->dateTime,
                'deleted_at' => $faker->dateTime,
                'name' => 'Gourav Sarkar',
                'email' => 'gsarkar.dev@gmail.com',
                'password' => Hash::make('gsarkar.dev')
            ]);
        
        for ($i = 0; $i <= 2; $i++) {
            $email=$faker->email;
            DB::table('users')->insert([
                'created_at' => $faker->dateTime,
                'updated_at' => $faker->dateTime,
                'deleted_at' => $faker->dateTime,
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make(explode('@', $email)[0])
            ]);
        }
    }

}
