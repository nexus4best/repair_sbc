<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CtsController extends Controller
{
    public function indexCount() 
    {
        $cts = DB::table('cts')
                ->select('cts.CtsId','cts.CtsName','cts.CtsPhone', DB::raw('COUNT(*) as CtsTotal'))
                ->join('brnzone', 'cts.CtsId', '=', 'brnzone.CtsId')    
                ->groupBy('cts.CtsId','cts.CtsName','cts.CtsPhone')
                ->get();
        return $cts;
    }

    public function index()
    {
        $cts = DB::table('cts')->get();
        $response = [
            'getCts' => $cts
        ];

        return response()->json($response);
    }

}
