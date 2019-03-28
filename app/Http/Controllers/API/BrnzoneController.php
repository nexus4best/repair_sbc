<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrnzoneController extends Controller
{

    public function cts()
    {
        $cts = DB::table('cts')
                ->select('cts.CtsId','cts.CtsName','cts.CtsPhone', DB::raw('COUNT(*) as CtsTotal'))
                ->join('brnzone', 'cts.CtsId', '=', 'brnzone.CtsId')    
                ->groupBy('cts.CtsId','cts.CtsName','cts.CtsPhone')
                ->get();
        return $cts;        
    }   

    public function ctsZone($CtsId)
    {
        $cts = DB::table('brnzone')
                ->join('area', 'brnzone.AreaId', '=', 'area.AreaId')
                ->join('setup', 'brnzone.SetupId', '=', 'setup.SetupId')
                ->join('branch', 'brnzone.BrnCode', '=', 'branch.BrnCode')
                ->select('brnzone.BrnCode', 'branch.BrnName', 'branch.BrnTel', 'area.AreaName', 'setup.SetupName')
                ->where('brnzone.CtsId', $CtsId)
                ->get();

        return $cts;

    }    

    public function area()
    {
        $area = DB::table('area')
                ->select('area.AreaId','area.AreaName','area.AreaPhone', DB::raw('COUNT(*) as AreaTotal'))
                ->join('brnzone', 'area.AreaId', '=', 'brnzone.AreaId')    
                ->groupBy('area.AreaId','area.AreaName','area.AreaPhone')
                ->get();
        return $area;        
    }     

    public function areaZone($AreaId)
    {
        $area = DB::table('brnzone')
                ->join('cts', 'brnzone.CtsId', '=', 'cts.CtsId')
                ->join('setup', 'brnzone.SetupId', '=', 'setup.SetupId')
                ->join('branch', 'brnzone.BrnCode', '=', 'branch.BrnCode')
                ->select('brnzone.BrnCode', 'branch.BrnName', 'branch.BrnTel', 'cts.CtsName', 'setup.SetupName')
                ->where('brnzone.AreaId', $AreaId)
                ->get();

        return $area;

    }     

    public function setup()
    {
        $setup = DB::table('setup')
                ->select('setup.SetupId','setup.SetupName','setup.SetupPhone', DB::raw('COUNT(*) as SetupTotal'))
                ->join('brnzone', 'setup.SetupId', '=', 'brnzone.SetupId')    
                ->groupBy('setup.SetupId','setup.SetupName','setup.SetupPhone')
                ->get();
        return $setup;        
    } 
    
    public function setupZone($SetupId)
    {
        $setup = DB::table('brnzone')
                ->join('area', 'brnzone.AreaId', '=', 'area.AreaId')
                ->join('cts', 'brnzone.CtsId', '=', 'cts.CtsId')
                ->join('branch', 'brnzone.BrnCode', '=', 'branch.BrnCode')
                ->select('brnzone.BrnCode', 'branch.BrnName', 'branch.BrnTel' ,'area.AreaName', 'cts.CtsName')
                ->where('brnzone.SetupId', $SetupId)
                ->get();

        return $setup;

    }     
    
}                