<?php

use App\Permission;
use Illuminate\Database\Seeder;
use Faker\Factory as Facker;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * permissions
     * ['name','company_id']
     * @return void
     */
    public function run()
    {
        $faker = Facker::create();

        foreach(range(1,20) as $index) {
            Permission::create([
                'name' => "permission".$index,
                'company_id' => $faker->numberBetween(1,20)
            ]);
        }
    }
}
