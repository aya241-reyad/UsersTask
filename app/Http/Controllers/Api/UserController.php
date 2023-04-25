<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\helpers\helper;
use App\Http\Interfaces\UsersRepositoryInterface;

class UserController extends Controller
{

    public function __construct()
    {
    $this->helper = new helper();
    }

public function create(UsersRepositoryInterface $UsersRepositoryInterface,Request $request){
    $validator=validator()->make($request->all(),[
        'user_name'=>'required',
        'email'=>'required|unique:users,email',
        'bio'=>'required',
        ]);
        if($validator->fails()){
        return $this->helper->ResponseJson(0,$validator->errors()->first(),$validator->errors());
        }

    $user=$UsersRepositoryInterface->createUser($request);
    return $this->helper->ResponseJson(1, 'User Created Successfully', $user);


    }

public function addAttachment(UsersRepositoryInterface $UsersRepositoryInterface,Request $request){
$user=$UsersRepositoryInterface->addAttachmentToUser($request);
return $this->helper->ResponseJson(1, 'Attachment Added Successfully', $user);



}



}
