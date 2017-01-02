<?php

namespace App\Api\V1\Controllers\Access;

use App\Api\V1\Requests\Access\GroupRequest;
use App\Group;
use JWT_Token;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class GroupController extends Controller
{
    function __construct(){

    }

    /*
     * Show All Groups
     */
    protected function show_all(){
        $token = new JWT_Token();
        if(!$token->getToken()){
            return $this->response->errorUnauthorized('Token is Invalid')->setStatusCode(401);
        }
        try{
            $groups = Group::all();
        }catch (JWTException $ex){
            return $this->response->error('someThingWentWrong')->setStatusCode(500);
        }
        return $this->response->array(compact('groups'));
    }

    /*
     * Delete Group
     */

    protected function delete($id){
        $token = new JWT_Token();
        if(!$token->getToken()){
            return $this->response->errorUnauthorized('Token is Invalid')->setStatusCode(401);
        }
        try{
            $group = Group::findorfail($id);
        }catch (JWTException $ex){
            return $this->response->error('someThingWentWrong')->setStatusCode(500);
        }
        return $this->response->array(compact('group'))->setStatusCode(200);
    }

    /*
     * create new Group
     */
    protected function create(GroupRequest $request){
        $token = new JWT_Token();
        if(!$token->getToken()){
            return $this->response->errorUnauthorized('Token is Invalid')->setStatusCode(401);
        }
        try {
            $group = Group::create($request->all());
            if(!$token) {
                throw new AccessDeniedHttpException();
            }

        } catch (JWTException $e) {
            throw new HttpException(500);
        }
        return $this->response()->array(compact('group'))->setStatusCode(200);
    }

    /*
     * Edit Group
     */

    protected function edit($id, GroupRequest $request){
        $token = new JWT_Token();
        if(!$token->getToken()){
            return $this->response->errorUnauthorized('Token is Invalid')->setStatusCode(401);
        }
        try {
            $grp = new Group();
            $group = Group::findOrFail($id);
            if(!$token || !$group) {
                throw new AccessDeniedHttpException();
            }
            foreach($grp->fillable as $key)
                $group->$key = $request->get($key);
            $group->save();
        } catch (JWTException $e) {
            throw new HttpException(500);
        }
        return $this->response()->array(compact('group'))->setStatusCode(200);
    }

}
