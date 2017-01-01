<?php
namespace App\Api\V1\Requests\Access;


class GroupRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'company_id' => 'required',
        ];
    }

    public function authorize()
    {
        return true;
    }
}