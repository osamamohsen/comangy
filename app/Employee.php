<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employee';

    protected $fillable =
        ['name','image','work_address','work_mobile','bank_acc_num',
            'position_id','job_id','manager_id','coach_id','department_id'];

}
