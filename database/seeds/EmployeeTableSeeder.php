<?php

use App\Employee;
use Illuminate\Database\Seeder;
use Faker\Factory as Facker;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Facker::create();
        /*Admin*/
        foreach(range(1,3) as $index) {
            Employee::create([
                'name' => $faker->name, //number between refere to users id of stored
                'image' => "no image",
                'work_address' => $faker->address,
                'work_mobile' => $faker->phoneNumber,
                'bank_acc_num' => $faker->bankAccountNumber,
                'position_id' => 0,
                'manager_id' => 0,
                'job_id' => 0,
                'coach_id' => 0,
                'department_id' => 0,
            ]);
        }
        /*Employees*/
        foreach(range(4,50) as $index){
            Employee::create([
                'name' => $faker->name,
                'image' => "no image",
                'work_address' => $faker->address,
                'work_mobile' => $faker->phoneNumber,
                'bank_acc_num' => $faker->bankAccountNumber,
                'position_id' => $faker->numberBetween(1,20),
                'manager_id' => $faker->numberBetween(1,20),
                'job_id' => $faker->numberBetween(1,20),
                'coach_id' => $faker->numberBetween(1,20),
                'department_id' => $faker->numberBetween(1,20),
            ]);
        }
    }

}
