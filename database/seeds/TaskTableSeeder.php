<?php

use Illuminate\Database\Seeder;

class TaskTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     * @todo Should use Separate Eloquent Model Factory
     * @return void
     */
    public function run() {
        $faker = Faker\Factory::create();
        $priority= ['urgent','high', 'medium', 'low'];
        
        for ($i = 1; $i <= 300; $i++) {
            DB::table('tasks')->insert([
                'created_at' => $faker->dateTime,
                'updated_at' => $faker->dateTime,
                'deleted_at' => $faker->dateTime,
                'priority' => $priority[array_rand($priority)],
                'dueDate' => $faker->dateTime,
                'completetionDate' => $faker->dateTime,
                'title' => $faker->sentence,
                'content' => $faker->text,
                'sheet' => rand(1, 3),
            ]);
        }
    }

}
