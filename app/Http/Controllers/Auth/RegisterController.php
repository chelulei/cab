<?php

namespace App\Http\Controllers\Auth;

use App\Address;
use App\Cartype;
use App\Idcard;
use App\User;
use App\Country;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

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
        return Validator::make($data, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'date_birth' => 'required',
            'gender' => 'required',
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
            'phone_number' => 'required',
            'email' => 'required|string|email|max:255|unique:users',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $user = User::create([
            'firstname' => $data['firstname'],
            'middlename' => $data['middlename'],
            'lastname' => $data['lastname'],
            'date_birth' => $data['date_birth'],
            'gender' => $data['gender'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'phone_number' => $data['code'].$data['phone_number'],
//            'profile_image' => $data['profile_image'],
            'user_type' => $data['user_type'],
            'country' => $data['country'],
            'email' => $data['email'],
        ]);

        $userId = $user->id;
        $userName = $user->username;
        $userType = $user->user_type;

        if ($userType=='driver'){

            Address::create([
                'username' => $userName,
                'street' => $data['street'],
                'city' => $data['city'],
                'province' => $data['province'],

            ]);

            Cartype::create([
                'username' => $userName,
                'car_type' => $data['car_type'],
                'franchise_number' => $data['franchise_number'],
                'plate_number' => $data['plate_number'],
                'cr_number' => $data['cr_number'],
                'or_number' => $data['or_number'],
                'lto_expiry_date' => $data['lto_expiry_date'],

            ]);

            Idcard::create([
                'user_id' => $userId,
                'id_type' => $data['id_type'],
                'id_number' => $data['id_number'],
                'expiry_date' => $data['expiry_date'],
            ]);

        }


        return $user;


    }


    public function showRegistrationForm()
    {
        $countries = Country::all();
        return view('auth.register')->with('countries',$countries);
    }

}