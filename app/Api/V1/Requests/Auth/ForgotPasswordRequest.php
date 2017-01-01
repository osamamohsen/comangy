<?php

namespace App\Api\V1\Requests\Auth;

use comangy;
use Dingo\Api\Http\FormRequest;

class ForgotPasswordRequest extends FormRequest
{
    public function rules()
    {
        return Config::get('Auth.forgot_password.validation_rules');
    }

    public function authorize()
    {
        return true;
    }
}
