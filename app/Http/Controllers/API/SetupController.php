<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SetupController extends Controller
{  
    
    public function indexCount() 
    {
        $setup = DB::table('setup')
                ->select('setup.SetupId','setup.SetupName','setup.SetupPhone', DB::raw('COUNT(*) as SetupTotal'))
                ->join('brnzone', 'setup.SetupId', '=', 'brnzone.SetupId')    
                ->groupBy('setup.SetupId','setup.SetupName','setup.SetupPhone')
                ->get();
        return $setup;
    }

    public function index()
    {
        //
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
