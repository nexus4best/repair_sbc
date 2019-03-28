<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Area;
use Illuminate\Support\Facades\DB;

class AreaController extends Controller
{
    public function index()
    {
        $area = Area::paginate(10);
        return $area;
    }

    public function indexCount() 
    {
        $area = DB::table('area')
                ->select('area.AreaId','area.AreaName','area.AreaPhone', DB::raw('COUNT(*) as AreaTotal'))
                ->join('brnzone', 'area.AreaId', '=', 'brnzone.AreaId')    
                ->groupBy('area.AreaId','area.AreaName','area.AreaPhone')
                ->get();
        return $area;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
