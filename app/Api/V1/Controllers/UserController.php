<?php

namespace App\Api\V1\Controllers;

use App\User;

class UserController
{
    public function show(){
        return User::all();
    }

}