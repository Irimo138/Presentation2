<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\Type;
use Illuminate\Support\Facades\App;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexUser()
    {
        $usersList = DB::table('users')
        ->where('role', 3)
        ->simplePaginate(10);
        return view('userAdmin',[ 'users' => $usersList]);
    }

    public function indexArtist()
    {
        $artistsList= DB::table('users')
        ->where('role', 2)
        ->simplePaginate(10);
        return view('artistAdmin',[ 'artists' => $artistsList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cover = $request->file('image');
        $extension = $cover->getClientOriginalExtension();
        Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
    
        $user = new User();
        $request->validate([
            'mail' => 'required|unique:users',
            'phone'=> 'required|numeric|digits:9|unique:users',
            'password' => 'required',
            'artisticName' => 'unique:users'

             

        ]);
        $user->name = $request->name;
        $user->surName = $request->surName;
        $user->mime = $cover->getClientMimeType();
        $user->original_filename = $cover->getClientOriginalName();
        $user->filename = $cover->getFilename().'.'.$extension;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role=3;
        $user->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type= Type::all();
        $userEdit = User::findOrFail($id);
        return view ('editUser', ['user'=>$userEdit,'typeList'=>$type]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $user = User::findOrFail($id);
        $user->name= $request->name;
        $user->surName= $request->surname;
        $user->date= $request->date;
        $user->phone= $request->phone;
        $user->town= $request->town;
        if($request ->password !=null){
            $user->password=$request->password;
        }else{
            $user->password=$user->password;
        }
        if($user->role==2){
            $user->type= $request->type;
            $user->subType= $request->subType;
            $user->description= $request->description;
            $user->link= $request->url;
            $user->artisticName= $request->artisticName;
            $user->save();
            return redirect('/showArtists');
            
        }else{
            $user->save();
            return redirect('/showUsers');
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
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/showUsers');
    }
}
