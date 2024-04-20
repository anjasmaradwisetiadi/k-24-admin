<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
}
