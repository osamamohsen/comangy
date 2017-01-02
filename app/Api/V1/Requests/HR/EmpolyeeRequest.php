<?php

namespace App\Api\V1\Requests\HR;

use Dingo\Api\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'image' => 'required',
            'work_address' => 'required',
            'work_mobile' => 'required',
            'job_id' => 'required',
            'bank_acc_num' => 'required',
            'position_id' => 'required',
            'manager_id' => 'required',
            'coach_id' => 'required',
            'department_id' => 'required',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
