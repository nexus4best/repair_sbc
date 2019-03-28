<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function brnZone(Request $request) 
    {
        $CtsId = $request->input('CtsId');
        $SetupId = $request->input('SetupId');
        $AreaId = $request->input('AreaId');
        $BrnCode = $request->input('BrnCode');
        $BrnName = $request->input('BrnName');
        $BrnPrv = $request->input('BrnPrv');
        $PrvRgn = $request->input('PrvRgn');

        $cts = DB::table('cts')->select('CtsId','CtsName')->get();
        $area = DB::table('area')->select('AreaId','AreaName')->get();
        $setup = DB::table('setup')->select('SetupId','SetupName')->get();
        $province = DB::table('province')->select('PrvCode','PrvName','PrvRgn')->get();

        $item = DB::table('brnzone')
        ->join('cts', 'brnzone.CtsId', '=', 'cts.CtsId')
        ->join('area', 'brnzone.AreaId', '=', 'area.AreaId')
        ->join('setup', 'brnzone.SetupId', '=', 'setup.SetupId')
        ->join('branch', 'brnzone.BrnCode', '=', 'branch.BrnCode')
        ->join('province', 'brnzone.BrnPrv', '=', 'province.PrvCode')
        ->select(
            'brnzone.BrnCode',
            'cts.CtsName',
            'area.AreaName',
            'setup.SetupName',
            'branch.BrnName'
        )
        ->where([
            ['brnzone.BrnCode', 'LIKE', '%'.$BrnCode.'%'],
            ['branch.BrnName', 'LIKE', '%'.$BrnName.'%'],
            ['branch.BrnPrv', 'LIKE', '%'.$BrnPrv.'%'],
            ['province.PrvRgn', 'LIKE', $PrvRgn],
            ['cts.CtsId', 'LIKE', $CtsId],
            ['setup.SetupId', 'LIKE', $SetupId],
            ['area.AreaId', 'LIKE', $AreaId],
        ])
        ->paginate(999);

        $response = [
            'data' => $item,
            'cts' => $cts,
            'area' => $area,
            'setup' => $setup,
            'province' => $province
        ];

        return response()->json($response);
    }

}
