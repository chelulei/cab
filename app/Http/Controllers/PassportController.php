<?php

namespace App\Http\Controllers;
use App\Address;
use App\Cartype;
use App\Idcard;
use App\User;
use Illuminate\Http\Request;

class PassportController extends Controller
{
    /**
     * Handles Registration Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'date_birth' => 'required',
            'gender' => 'required',
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
            'phone_number' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        $user = User::create([
            'firstname' => $request->firstname
            'lastname' => $request->lastname,
            'date_birth' => $request->date_birth,
            'gender' => $request->gender,
            'username' => $request->username,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'phone_number'=> $request->phone_number,
//            'profile_image' => $data['profile_image'],
            'user_type' => $request->phone_number,
            'country'=> $request->country,
            'email' => $request->email,
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
        
        $token = $user->createToken('TutsForWeb')->accessToken;

        return response()->json(['token' => $token], 200);
    }

    /**
     * Handles Login Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($credentials)) {
            $token = auth()->user()->createToken('TutsForWeb')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'UnAuthorised'], 401);
        }
    }

    /**
     * Returns Authenticated User Details
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function details()
    {
        return response()->json(['user' => auth()->user()], 200);
    }
}