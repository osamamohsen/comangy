<?php

use App\Module;
use Illuminate\Database\Seeder;
use Faker\Factory as Facker;

class ModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * modules
     * ['name','description','company_id']
     * @return void
     */
    public function run()
    {
        $faker = Facker::create();

        $modules = ['Module 1','Module 2', 'HR' , 'Account', 'Sales' , 'Payload' , 'Module 3'];

        foreach($modules as $module) {
            Module::create([
                'name' => $module,
                'description' => $faker->paragraph,
                'company_id' => $faker->numberBetween(1,10)
            ]);
        }
    }
}
