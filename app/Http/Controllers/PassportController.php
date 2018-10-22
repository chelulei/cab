<?php
namespace App\Http\Controllers;
use App\Address;
use App\Cartype;
use App\Idcard;
use App\User;
use App\Country;
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
            'password' => 'required|string|min:6',
            'phone_number' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        $user = User::create([
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
            'date_birth' => $request->date_birth,
            'gender' => $request->gender,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'user_type' => $request->user_type,
            'country' => $request->country,
            'phone_number' => $request->phone_number,
            'profile_pic' => $request->profile_pic
        ]);

        $userId = $user->id;
        $userName = $user->username;
        $userType = $user->user_type;
        if ($userType=='driver'){
            Address::create([
                'username' => $userName,
                'street' =>$request->street,
                'city' =>  $request->city,
                'province' => $request->province

            ]);
            Cartype::create([
                'username' => $userName,
                'car_type' => $request->car_type,
                'franchise_number'=> $request->franchise_number,
                'plate_number' => $request->plate_number,
                'cr_number' =>  $request->cr_number,
                'or_number' =>  $request->or_number,
                'lto_expiry_date' => $request->lto_expiry_date
            ]);

            Idcard::create([
                'user_id' => $userId,
                'id_type' => $request->id_type,
                'id_number' =>$request->id_number,
                'expiry_date' =>$request->expiry_date
            ]);
        }

        $token = $user->createToken('Cab')->accessToken;
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