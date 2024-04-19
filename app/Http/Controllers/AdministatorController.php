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
        $users = User::where('position','=','administator')->latest()->paginate(10)->withQueryString();

        return view('admin.admin', [
            'title' => 'Administator',
            'active' => 'administator',
            'users'=> $users,
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
            'title' => 'Administator',
            'active' => 'administator',
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
        $validatedData = $this->validatorInput($request,'create');
        if($request->file('photo')){
            $savePhoto = $request->file('photo')->store('photo-users');
            $validatedData['photo'] = (env('APP_URL').'storage/'.$savePhoto);
        }

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['status'] = $validatedData['position'] === 'member' ? 0 : 1;
        $validatedData['id'] = Str::uuid()->toString();

        User::create($validatedData);

        session()->flash('success', 'Successful make new administator !!!');
        return redirect('/administator');
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
            'title' => 'Administator',
            'active' => 'administator',
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
            'title' => 'Administator',
            'active' => 'administator',
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
        $user = User::where('id','=', $id)->firstOrFail();
        $validatedData = $this->validatorInput($request,'edit');

        if($request->file('photo')){
            if($request->oldPhoto){
                $nameOldPhoto = str_replace( env('APP_URL').'storage/','',$request->oldPhoto);
                if($nameOldPhoto !== 'photo-users/shuraiq-omen.jpg'){
                    Storage::delete($nameOldPhoto);
                }
            }
            $savePhoto = $request->file('photo')->store('photo-users');
            $validatedData['photo'] = (env('APP_URL').'storage/'.$savePhoto);
        }

        User::where('id', $user->id)
        ->update($validatedData);

        session()->flash('success', 'Successful update administator !!!');
        return redirect('/administator');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id','=',$id)->firstOrFail(); 
        if($user->photo){
            $nameOldPhoto = str_replace(env('APP_URL').'storage/','',$user->photo);
            if($nameOldPhoto !== 'photo-users/shuraiq-omen.jpg'){
                Storage::delete($nameOldPhoto); 
            }
        }

        User::destroy($user->id);
        session()->flash('success', 'User has been deleted !!!');
        return redirect('/administator');
    }

    public function validatorInput($request, $from){
        if($from === 'create'){
            return $request->validate([
                'name' => 'required|max:255',
                'no_ktp' => 'required|',
                'email'=> 'required|email|unique:users',
                'no_hp' => 'required|min:10|max:16',
                'gender' => 'required',
                'date_birth' => 'required',
                'position' => 'required',
                'password' => 'required|min:8|max:24',
                'photo' =>'image|file|max:1024'
            ]);
    
        } else if($from === 'edit'){
            return $request->validate([
                'name' => 'required|max:255',
                'no_ktp' => 'required|',
                'no_hp' => 'required|min:10|max:16',
                'gender' => 'required',
                'date_birth' => 'required',
                'position' => 'required',
            ]);
        }
    }
}
