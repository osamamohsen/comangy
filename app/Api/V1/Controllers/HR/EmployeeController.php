<?php

namespace App\Api\V1\Controllers\HR;

use App\Employee;
use JWT_Token;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Api\V1\Requests\HR\EmployeeRequest;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;


class EmployeeController extends Controller
{
    function __construct(){

    }

    /*
     * Show All Employee
     */
    protected function show_all(){
        $token = new JWT_Token();
        if(!$token->getToken()){
            return $this->response->errorUnauthorized('Token is Invalid')->setStatusCode(401);
        }
        try{
            $employees = Employee::all();
        }catch (JWTException $ex){
            return $this->response->error('someThingWentWrong');
        }
        return $this->response->array(compact('employees'));
    }

    /*
     * Delete Employee
     */

    protected function delete($id){
        $token = new JWT_Token();
        if(!$token->getToken()){
            return $this->response->errorUnauthorized('Token is Invalid')->setStatusCode(401);
        }
        try{
            $employee = Employee::findorfail($id);
        }catch (JWTException $ex){
            return $this->response->error('someThingWentWrong')->setStatusCode(500);;
        }
        return $this->response->array(compact('$employee'))->setStatusCode(200);
    }

    /*
     * create new Employee
     */
    protected function create(EmployeeRequest $request){
        $token = new JWT_Token();
        if(!$token->getToken()){
            return $this->response->errorUnauthorized('Token is Invalid')->setStatusCode(401);
        }
        try {
            $employee = Employee::create($request->all());
            if(!$token) {
                throw new AccessDeniedHttpException();
            }

        } catch (JWTException $e) {
            throw new HttpException(500);
        }
        return $this->response()->array(compact('employee'))->setStatusCode(200);
    }

    /*
     * Edit Employee
     */

    protected function edit($id, EmployeeRequest $request){
        $token = new JWT_Token();
        if(!$token->getToken()){
            return $this->response->errorUnauthorized('Token is Invalid')->setStatusCode(401);
        }
        try {
            $emp = new Employee();
            $employee = Employee::findOrFail($id);
            if(!$token || !$employee) {
                throw new AccessDeniedHttpException();
            }
            foreach($emp->fillable as $key)
                $employee->$key = $request->get($key);
            $employee->save();
        } catch (JWTException $e) {
            throw new HttpException(500);
        }
        return $this->response()->array(compact('employee'))->setStatusCode(200);
    }

}
