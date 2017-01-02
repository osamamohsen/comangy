<?php

use App\Position;
use Illuminate\Database\Seeder;

class PositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * positions
     * ['name','position_id']
     * @return void
     */
    public function run()
    {
        $positions = ['jenior','senior','leader','director','general manager'];
        foreach(range(0,4) as $position) {
            Position::create([
                'name' => $positions[$position],
                'position_id' => 5 - $position
            ]);
        }
    }
}
