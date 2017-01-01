<?php

namespace App\Api\V1\Requests\Auth;

use comangy;
use Dingo\Api\Http\FormRequest;

class SignUpRequest extends FormRequest
{
    public function rules()
    {
        return Config::get('Auth.sign_up.validation_rules');
    }

    public function authorize()
    {
        return true;
    }
}
