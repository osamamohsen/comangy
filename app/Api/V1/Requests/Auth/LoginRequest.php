<?php

namespace App\Api\V1\Requests\Auth;

use Config;
use Dingo\Api\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules()
    {
        return Config::get('Auth.login.validation_rules');
    }

    public function authorize()
    {
        return true;
    }
}
