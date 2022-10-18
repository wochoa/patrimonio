<?php

namespace App\Http\Controllers\administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class series extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $series=DB::table('serie')->join('modelo','serie.id_modelo','=','modelo.idmodelo')->orderBy('idserie','ASC')->get();
        return response()->json(['datserie'=>$series], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function seriexmodelo($idmodelo)
    {
        $series=DB::table('serie')->join('modelo','serie.id_modelo','=','modelo.idmodelo')->where('id_modelo',$idmodelo)->orderBy('idserie','ASC')->get();
        return response()->json(['datserie'=>$series], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function agregar(Request $request)
    {
        //return $request->all();
        $validated = $request->validate([
            'idmodelo'=> 'required'
        ]);

        $creacion=date('Y-m-d H:i:s');
        
       
        if(strlen($request->nombreserie_otros)>1){
            DB::insert('insert into serie (des_serie,id_modelo,created_at,updated_at) values (?, ?,?,?)', [strtoupper($request->nombreserie_otros), $request->idmodelo,$creacion,$creacion]);
        }else{
            $seriesvehiculo=array('serie_motor'=>$request->nombreserie_motor,'serie_chasis'=>$request->nombreserie_chasis);
            DB::insert('insert into serie (des_serie_vehiculo,id_modelo,created_at,updated_at) values (?, ?,?,?)', [json_encode($seriesvehiculo), $request->idmodelo,$creacion,$creacion]);  
        }
        
        return 'ok';
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
