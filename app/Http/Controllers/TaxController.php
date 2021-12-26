<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class TaxController extends Controller {
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

           $query = DB::table('iuran')->select('*')->get();

           $data = [
                'code' => 200,
                'result' => $query
           ];

           return response()->json($data);

        } catch (\Throwable $th) {
           
            $data = [
                'code'   => 500,
                'result' => ''
            ];

            return response()->json($data, 500);
        }
    }

    public function create(Request $req) {

        try {
            DB::table('iuran')->insert([
                'id'  => Uuid::uuid4(),
                'ket' => $req->ket,
                'jumlah' => $req->jumlah,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);

            $data = [
                'code' => 200,
                'result' => 'OK'
            ];

            return response()->json($data, 200);

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

            $query = DB::table('iuran')->select('*')->where('id', '=', $id)->get();

            $data = [
                'code'   => 200,
                'result' => $query
            ];

            return response()->json($data, 200);

        } catch (\Throwable $th) {
            
            $data = [
                'code' => 500,
                'result' => ''
            ];

            return response()->json($data, 500);
        }

    }

    public function update($id, Request $req) {

        try {
            DB::table('iuran')->where('id', '=', $id)->update([
                'ket' => $req->ket,
                'jumlah' => $req->jumlah,
            ]);

            $data = [
                'code' => 200,
                'result' => 'OK'
            ];

            return response()->json($data, 200);

        } catch (\Throwable $th) {
            
            $data = [
                'code' => 500,
                'result' => ''
            ];

            return response()->json($data, 200);
        }
    }

    public function delete($id) {
        
        try {
            DB::table('iuran')->where('id', '=', $id)->delete();

            $data = [
                'code' => 200,
                'result' => 'OK'
            ];

            return response()->json($data, 200);

        } catch (\Throwable $th) {
            
            $data = [
                'code' => 500,
                'result' => ''
            ];

            return response()->json($data, 500);
        }
    }

    public function lastweek(){
        try {
            $query = DB::table('iuran')->select('jumlah')->latest('created_at')->first();

            $data = [
                'code' => 200,
                'result' => $query
            ];

            return response()->json($data, 200);
        } catch (\Throwable $th) {
            $data = [
                'code' => 500,
                'result' => ''
            ];

            return response()->json($data, 500);
        }
    }
}
