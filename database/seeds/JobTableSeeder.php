<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Facker;
use App\Job;

class JobTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * jobs
     * ['title','description','department_id']
     * @return void
     */
    public function run()
    {
        $faker = Facker::create();

        foreach(range(1,20) as $index) {
            Job::create([
                'title' => $faker->title,
                'description' => $faker->paragraph,
                'department_id' => $faker->numberBetween(1,20)
            ]);
        }
    }
}
