<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('position','=','member')
            ->where('status','=',true)->latest()->paginate(10)->withQueryString();
        return view('member.member', [
            'title' => 'Member',
            'active' => 'member',
            'users'=>$users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('member.member-create', [
            'title' => 'Member',
            'active' => 'member'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'no_ktp' => 'required|',
            'email'=> 'required|email|unique:users',
            'no_hp' => 'required|min:10|max:14',
            'gender' => 'required',
            'date_birth' => 'required',
            'position' => 'required',
            'password' => 'required|min:8|max:24',
            'photo' =>'image|file|max:1024'
        ]);

        if($request->file('photo')){
            $validatedData['photo'] = $request->file('photo')->store('photo-users');
        }

        $registerValidate['password'] = Hash::make($validatedData['password']);
        $validatedData['status'] = $validatedData['position'] === 'member' ? 0 : 1;
        $validatedData['id'] = Str::uuid()->toString();
        User::create($validatedData);

        return redirect('/member')->with('success', 'Successful make new member !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $user = User::where('id','=',$id)->firstOrFail();

        return view('member.member-detail', [
            'title' => 'Member',
            'active' => 'member',
            'user'=> $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id','=',$id)->firstOrFail();
        return view('member.member-edit', [
            'title' => 'Member',
            'active' => 'member',
            'user'=> $user
        ]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function templateJsonMember(){
        return view('member.member-list-json', [
            'title' => 'Member',
            'active' => 'member'
        ]);
    }
}
