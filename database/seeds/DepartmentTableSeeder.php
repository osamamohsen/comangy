<?php

use App\Department;
use Illuminate\Database\Seeder;
use Faker\Factory as Facker;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * department
     * 'name','parent_id','manage_id'
     * @return void
     */
    public function run()
    {
        $faker = Facker::create();
        foreach(range(1,20) as $index) {
            Department::create([
                'name' => "Department".$index,
                'parent_id' => $faker->numberBetween(1,10),
                'manage_id' => $faker->numberBetween(1,10)
            ]);
        }
    }
}
