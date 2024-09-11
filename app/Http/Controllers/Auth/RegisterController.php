<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use  App\Http\Middleware\CheckBanned;
use  App\Http\Middleware\CheckTypeUesr;
use Illuminate\Support\Facades\Auth;
class RegisterController  extends \Illuminate\Routing\Controller
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
 /* 
    $this->middleware(CheckBanned::class);
    use  App\Http\Middleware\CheckBanned;
    */
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware(CheckBanned::class);
        $this->middleware(CheckTypeUesr::class);
       //$this->middleware('checkUser');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:10','regex:/^\d{10}$/'],
            'profile_photo' => [ 'required','image','mimes:jpeg,png,jpg,gif,svg' ,'max:2048'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);/* '' */
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    { 
        if (isset($data['profile_photo'])) {
            // Handle file upload
            $image = $data['profile_photo'];
            
            // Move uploaded file to public/images directory
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
        }
        /* if ($data->has('profile_photo')) {
            $image=$request->file('profile_photo');
            
            $imageName=time().'.'.$image->extension();
            $image->move(public_path('images'),$imageName);

        } */
        return User::create([

            'username' => $data['username'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone_number' => $data['phone_number'],
            'profile_photo' => $imageName,
            'status' => true,
            'type_user' => 0,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
