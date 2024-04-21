<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function runScriptUser(){
        $users = User::get();

        foreach ($users as $x => $item) {
            $updateRoleId = $item->position === 'administator' ? 1 : 2;
            User::where("id", $item->id)->update([
               'role_id' => $updateRoleId
            ]);
        }
        session()->flash("success", "Success update role id setelah migration !!!");
        return view("components.run-script-user", [
            "title" => "",
            "active" => "",
        ]);
    }

    public function confirmPassword(Request $request){
        $oldPassword = $request->input('oldPassword');
        $newPassword = $request->input('newPassword');
        $email = $request->input('email'); 
        if(isset($oldPassword)){
            $user = User::where('email','=',$email)->firstOrFail();
            $checkPassword = Hash::check($oldPassword, $user->password);
            if($checkPassword){
                return response()->json(['status'=> true, 'data'=>'successfull confirm password']);
            } else {
                return response()->json(['status'=> false, 'data'=>'unsuccessfull confirm password']);
            }
        }
    }
}
