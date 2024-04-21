<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class AdministatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::where("position", "=", "administator")
            ->latest()
            ->filter(request("search"))
            ->paginate(10)
            ->withQueryString();

        if (
            auth()
                ->user()
                ->rolePermision("full view administator")
        ) {
            return view("admin.admin", [
                "title" => "Administator",
                "active" => "administator",
                "users" => $users,
            ]);
        } else {
            session()->flash("loginError", "You don't have permision !!!");
            return redirect("/");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (
            auth()
                ->user()
                ->rolePermision("full view administator")
        ) {
            return view("member.member-create", [
                "title" => "Administator",
                "active" => "administator",
            ]);
        } else {
            session()->flash("loginError", "You don't have permision !!!");
            return redirect("/");
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (
            auth()
                ->user()
                ->rolePermision("full view administator")
        ) {
            $validatedData = $this->validatorInput($request, "create");
            if ($request->file("photo")) {
                $savePhoto = $request->file("photo")->store("photo-users");
                $validatedData["photo"] =
                    env("APP_URL") . "storage/" . $savePhoto;
            }

            $validatedData["password"] = Hash::make($validatedData["password"]);
            $validatedData["status"] =
            $validatedData["position"] === "member" ? 0 : 1;
            $validatedData["role_id"] = $validatedData["position"] === "administator" ? "1" : "2";
            $validatedData["id"] = Str::uuid()->toString();

            User::create($validatedData);

            session()->flash("success", "Successful make new administator !!!");
            return redirect("/administator");
        } else {
            session()->flash("loginError", "You don't have permision !!!");
            return redirect("/");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (
            auth()
                ->user()
                ->rolePermision("full view administator")
        ) {
            $user = User::where("id", "=", $id)->firstOrFail();

            return view("member.member-detail", [
                "title" => "Administator",
                "active" => "administator",
                "user" => $user,
            ]);
        } else {
            session()->flash("loginError", "You don't have permision !!!");
            return redirect("/");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (
            auth()
                ->user()
                ->rolePermision("full view administator")
        ) {
            $user = User::where("id", "=", $id)->firstOrFail();
            return view("member.member-edit", [
                "title" => "Administator",
                "active" => "administator",
                "user" => $user,
            ]);
        } else {
            session()->flash("loginError", "You don't have permision !!!");
            return redirect("/");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (
            auth()
                ->user()
                ->rolePermision("full view administator")
        ) {
            $user = User::where("id", "=", $id)->firstOrFail();
            $validatedData = $this->validatorInput($request, "edit", $request->rePasswordConfirm);

            if ($request->file("photo")) {
                if ($request->oldPhoto) {
                    $nameOldPhoto = str_replace(
                        env("APP_URL") . "storage/",
                        "",
                        $request->oldPhoto
                    );
                    // prevent default delete image spesific (shuraiq-omen.jpg)
                    if ($nameOldPhoto !== "photo-users/shuraiq-omen.jpg") {
                        Storage::delete($nameOldPhoto);
                    }
                }
                $savePhoto = $request->file("photo")->store("photo-users");
                $validatedData["photo"] =
                    env("APP_URL") . "storage/" . $savePhoto;
            }
            if(isset($validatedData["password"])){
                $validatedData["password"] = Hash::make($validatedData["password"]);
            }
            $validatedData["role_id"] = $validatedData["position"] === "administator" ? "1" : "2";

            User::where("id", $user->id)->update($validatedData);

            session()->flash("success", "Successful update administator !!!");
            return redirect("/administator");
        } else {
            session()->flash("loginError", "You don't have permision !!!");
            return redirect("/");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (
            auth()
                ->user()
                ->rolePermision("full view administator")
        ) {
            $user = User::where("id", "=", $id)->firstOrFail();
            if ($user->photo) {
                $nameOldPhoto = str_replace(
                    env("APP_URL") . "storage/",
                    "",
                    $user->photo
                );
                // prevent default delete image spesific (shuraiq-omen.jpg)
                if ($nameOldPhoto !== "photo-users/shuraiq-omen.jpg") {
                    Storage::delete($nameOldPhoto);
                }
            }

            User::destroy($user->id);
            session()->flash("success", "User has been deleted !!!");
            return redirect("/administator");
        } else {
            session()->flash("loginError", "You don't have permision !!!");
            return redirect("/");
        }
    }

    public function validatorInput($request, $from, $changePassword='unchecked')
    {
        if ($from === "create") {
            return $request->validate([
                "name" => "required|max:255",
                "no_ktp" => "required|",
                "email" => "required|email|unique:users",
                "no_hp" => "required|min:10|max:16",
                "gender" => "required",
                "date_birth" => "required",
                "position" => "required",
                "password" => "required|min:8|max:24",
                "photo" => "required|image|file|max:1024",
            ]);
        } elseif ($from === "edit") {
            $validateInput = [
                "name" => "required|max:255",
                "no_ktp" => "required",
                "no_hp" => "required|min:10|max:16",
                "gender" => "required",
                "date_birth" => "required",
                "position" => "required",
            ];
            
            $request->file("photo") ? ($validateInput['photo'] = 'required|image|file|max:1024') : false;
            if($changePassword === 'unchecked'){
                return $request->validate($validateInput);
            } else if($changePassword === 'checked'){
                $validateInput['password'] = "required";
                return $request->validate($validateInput);
            }
        }
    }
}
