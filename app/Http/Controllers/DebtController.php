<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DebtController extends Controller {
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

            $query = DB::table('hutang')
        ->select('users.id',  'users.nama', DB::raw('SUM(hutang.jumlah) as total_hutang', 'created_at'))
        ->join('users', 'hutang.id', '=', 'users.id')
        ->groupBy('hutang.id')
        ->get();

            $data = [
                'code'   => 200,
                'result' => $query,
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
            DB::table('hutang')
               ->insert([
                    'id' => $req->id,
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
                'code'   => 500,
                'result' => '',
            ];

            return response()->json($data, 500);
        }
    }

    public function get($id) {
        
        try {
            $query = DB::table('hutang')
            ->select('users.id', 'hutang.created_at', 'users.nama',DB::raw('SUM(hutang.jumlah) as Total_Hutang'))
            ->join('users', 'hutang.id', '=', 'users.id')
            ->groupBy('hutang.id')
            ->where('hutang.id', '=', $id)
            ->get();

            $data = [
                'code'   => 200,
                'result' => $query
            ];

            return response()->json($data, 200);

        } catch (\Throwable $th) {

            $data = [
                'code'   => 500,
                'result' => ''
            ];

            return response()->json($data, 500);
        }

    }

    public function update(Request $req, $id) {

        try {
            DB::table('hutang')->where('id', '=', $id)->update([
                'jumlah'    => $req->jumlah,
                'updated_at'=> date("Y-m-d H:i:s")
            ]);

            $data = [
                'code'  => 200,
                'result'=> 'OK'
            ];

            return response()->json($data, 200);
        
        } catch (\Throwable $th) {
            
            $data = [
                'code'  => 500,
                'result'=> ''
            ];

            return response()->json($data, 500);
        }
    }

    public function delete($id) {

        try {
            DB::table('hutang')->where('id', '=', $id)->delete();

            $data = [
                'code'  => 200,
                'result'=> 'OK'
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
