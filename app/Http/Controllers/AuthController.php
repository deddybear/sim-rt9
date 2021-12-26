<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        date_default_timezone_set("Asia/Jakarta");
    }

    public function login(Request $req) {
       $email = $req->email;
       $pass  = $req->password;

       $user = User::where('email', $email)->first();

       if (Hash::check($pass, $user->password)) {
           $apiToken = base64_encode(Str::random(40));

           User::where('id', $user->id)->update(['api_token' => $apiToken]);

           return response()->json([
               'code' => 200,
               'data' => [
                   'user'   => $user,
                   'api_token'  => $apiToken
               ]
           ]);
       }
        return response()->json([
            'code' => 500,
            'data' => ''
        ],500);
    }

    public function logout($id) {
        $user = User::where('id', $id)->first();

        if ($user) {
            User::where('id', $user->id)->update(['api_token' => null]);

            return response()->json([
                'code' => 200,
                'result' => 'OK'
            ]);

        } 

        return response()->json([
            'code' => 500,
            'result' => 'OK'
        ], 500);
    }

}
