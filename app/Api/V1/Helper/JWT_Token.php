<?php
use Tymon\JWTAuth\Facades\JWTAuth;

/**
 * Created by PhpStorm.
 * User: osama
 * Date: 01/01/17
 * Time: 06:28 م
 */
class JWT_Token
{
    public function getToken(){
        $token = JWTAuth::getToken();
        if(!$token)
            return false;
        $refreshToken = JWTAuth::refresh($token);/*refresh Token*/
        return $refreshToken;
    }
}