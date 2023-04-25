<?php

namespace App\Http\Interfaces;

use Illuminate\Http\Request;


interface UsersRepositoryInterface{

public function createUser(Request $request);
public function addAttachmentToUser(Request $request);

}
















