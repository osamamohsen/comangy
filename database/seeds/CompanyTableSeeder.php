<?php

use App\Company;
use Illuminate\Database\Seeder;
use Faker\Factory as Facker;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Companies
     * ['name','activity_id']
     * @return void
     */
    public function run()
    {
        $faker = Facker::create();

        foreach(range(1,10) as $index) {
            Company::create([
                'name' => $faker->company,
                'activity_id' => $faker->numberBetween(1,10)
            ]);
        }
    }
}
