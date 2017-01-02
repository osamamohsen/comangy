<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->cleanDataBase();

        $this->call(CompanyTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
        $this->call(EmployeeTableSeeder::class);
        $this->call(GroupTableSeeder::class);
        $this->call(JobTableSeeder::class);
        $this->call(ModuleTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(PositionTableSeeder::class);

        Model::unguard();
    }

    protected $tables = ['companies','departments','employees',
        'groups','jobs','modules','permissions','positions'];

    public function cleanDataBase(){
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        foreach($this->tables as $table){
            DB::table($table)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
