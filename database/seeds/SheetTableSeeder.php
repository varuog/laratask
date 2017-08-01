<?php

use Illuminate\Database\Seeder;

class SheetTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     * @todo Should use Separate Eloquent Model Factory
     * @return void
     */
    public function run() {
        $faker = Faker\Factory::create();
       
        
        for ($i = 0; $i <= 3; $i++) {
            DB::table('sheets')->insert([
                'created_at' => $faker->dateTime,
                'updated_at' => $faker->dateTime,
                'deleted_at' => $faker->dateTime,
                'title' => $faker->sentence,
                'description' => $faker->text,
                'user' => rand(1,3),
            ]);
        }
    }

}
