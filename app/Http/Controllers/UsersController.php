<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Ramsey\Uuid\Uuid;

class UsersController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        date_default_timezone_set("Asia/Jakarta");
    }

    public function read() {
        
        try {
            $query = User::select('*')->get();

            $data = [
                'code' => 200,
                'result' => $query
            ];

            return response()->json($data);

        } catch (\Throwable $th) {
            
            $data = [
                'code' => 500,
                'result' => ''
            ];

            return response()->json($data, 500);
        }
    }

    public function create(Request $req) {

        try {

            DB::table('users')->insert([
                'id' => Uuid::uuid4(),
                'nama' => $req->nama,
                'email' => $req->email,
                'password' => Hash::make($req->password),
                'roles' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);    

            $data = [
                'code' => 200,
                'result' => 'OK'
            ];

            return response()->json($data);
            
        } catch (\Throwable $th) {
            
            $data = [
                'code' => 500,
                'result' => ''
            ];

            return response()->json($data, 500);

        }

    }

    public function get($id) {
        
        try {

            $query = User::select('*')->where('id', '=', $id)->get();

            $data = [
                'code' => 200,
                'result' => $query
            ];

            return response()->json($data);

        } catch (\Throwable $th) {
            
            $data = [
                'code' => 500,
                'result' => ''
            ];

            return response()->json($data);
        }
    }

    public function update($id, Request $req) {
        try {

            DB::table('users')->where('id', '=', $id)->update([
                'nama' => $req->nama,
                'email' => $req->email,
                'password' => Hash::make($req->password),
                'updated_at' => date("Y-m-d H:i:s")
            ]);    

            $data = [
                'code' => 200,
                'result' => 'OK'
            ];

            return response()->json($data);
        } catch (\Throwable $th) {

            $data = [
                'code' => 500,
                'result' => ''
            ];

            return response()->json($data);
        }
    }

    public function delete($id) {
        try {
            DB::table('users')->where('id', '=', $id)->delete();

            $data = [
                'code' => 200,
                'result' => 'OK'
            ];

            return response()->json($data);

        } catch (\Throwable $th) {
            
            $data = [
                'code' => 500,
                'result' => ''
            ];

            return response()->json($data);
            
        }
    }
}
