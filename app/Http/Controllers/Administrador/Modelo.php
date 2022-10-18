<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Modelo extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modelo=DB::table('modelo')->join('marca','modelo.id_marca','=','marca.idmarca')->orderBy('idmodelo','ASC')->get();
        return response()->json(['datmodelo'=>$modelo], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function modeloxmarca($idmarca)
    {
        $modelo=DB::table('modelo')->join('marca','modelo.id_marca','=','marca.idmarca')->where('id_marca',$idmarca)->orderBy('idmodelo','ASC')->get();
        return response()->json(['datmodelo'=>$modelo], 200);
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
            'nombremodelo' => 'required',
            'idmarca'=> 'required'
        ]);
        $creacion=date('Y-m-d H:i:s');
        
        DB::insert('insert into modelo (des_modelo,id_marca,created_at,updated_at) values (?, ?,?,?)', [strtoupper($request->nombremodelo), $request->idmarca,$creacion,$creacion]);
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
