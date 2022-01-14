<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        
        if( !isset($data['artisticName'])){
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'phone'=> ['required' ,'numeric','digits:9','unique:users'],
                'password' => ['required'],
                
            ]);
            
    }else{
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone'=> ['required' ,'numeric','digits:9','unique:users'],
            'password' => ['required'],
            'email' => 'required|unique:users',
            'phone'=> 'required|numeric|digits:9|unique:users',
            'password' => 'required',
            'artisticName' => 'unique:users',
            'type' => 'required|alpha',
            'date' => 'required|before:tomorrow',
            'description'=>'required',
            'town' => 'required|alpha',
            'link'=>'required|url',

        ]);
    }


    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data) {
       /* 
        $cover = $request->file('image');
        $extension = $cover->getClientOriginalExtension();
        Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
       */ 
      if( !isset($data['artisticName'])){
        return User::create([
            'name' => $data['name'],
            'surName' => $data['surName'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'date' => $data['date'],
            'password' => Hash::make($data['password']),
            'role' => 3
            
            
        ]);
                
    }else{
        return User::create([

            'name' => $data['name'],
            'surName' => $data['surName'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'date' => $data['date'],
            'password' => Hash::make($data['password']),
            'role' => 2,
            'artisticName' => $data['artisticName'],
            'type' => $data['type'],
            'description' => $data['description'],
            'town' => $data['town'],
            'link' => $data['link'],

        ]);
    }

  
        

    }
    
}
