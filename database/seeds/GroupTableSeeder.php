<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Facker;
use App\Group;
class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Groups
     * ['name','description','company_id']
     * @return void
     */
    public function run()
    {
        $faker = Facker::create();
        /*Admin*/
        foreach(range(1,50) as $index) {
            Group::create([
                'name' => "group".$index,
                'description' => $faker->paragraph,
                'company_id' => $faker->numberBetween(1,10)
            ]);
        }
    }
}
