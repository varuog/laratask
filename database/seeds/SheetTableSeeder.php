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
       
        
        for ($i = 1; $i <= 12; $i++) {
            DB::table('sheets')->insert([
                'created_at' => $faker->dateTime,
                'updated_at' => $faker->dateTime,
                'deleted_at' => $faker->dateTime,
                'title' => $faker->sentence(2),
                'description' => $faker->text,
                'user_id' => rand(1,5),
            ]);
        }
    }

}
