<?php

namespace App\Http\Eloquent;

use App\Models\User;
use Illuminate\Http\Request;
use App\helpers\Attachment;
use App\Http\Interfaces\UsersRepositoryInterface;


class UserRepository implements UsersRepositoryInterface{

    

public function createUser(Request $request){
    $user=User::create([
        'user_name'=>$request->user_name,
        'email'=>$request->email,
        'bio'=>$request->bio,
    ]);

if($request->has('map_location')||$request->has('date_of_birth')){

    $user=User::where('email',$request->email)->first();
    $user->update([
        'map_location'=>$request->map_location,
        'date_of_birth'=>$request->date_of_birth,
        ]);
       
}
    return $user;

}




public function addAttachmentToUser(Request $request){
$user=User::where('email',$request->email)->first();
if ($request->hasFile('attachment'))
{
Attachment::addAttachment($request->file('attachment'), $user, 'users/attachment', ['save' => 'original','usage'=>'attachment']);
}
return $user->with('attachmentRelation')->first();

}





    
}