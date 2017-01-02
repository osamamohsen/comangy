<?php
/**
 * Created by PhpStorm.
 * User: osama
 * Date: 01/01/17
 * Time: 07:13 م
 */

namespace App\Api\V1\Requests\Access;


class PermissionRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'company_id' => 'required',
        ];
    }

    public function authorize()
    {
        return true;
    }
}