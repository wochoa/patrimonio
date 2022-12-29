<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class formatospdf extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cargopersonal($dni)
    {
        $iduser=DB::table('admin')->where(['adm_dni'=>$dni,'adm_estado'=>1])->orderBy('id','DESC')->limit(1)->value('id');
        $datouser=DB::table('admin')->join('dependencia','admin.depe_id','=','dependencia.iddependencia')->where(['adm_dni'=>$dni,'adm_estado'=>1])->orderBy('id','DESC')->limit(1)->get();

        $resultados=DB::table('movimiento')->join('bien','movimiento.id_bien','=','bien.idbien')
                                            ->join('marca','bien.id_marca','=','marca.idmarca')
                                            ->join('modelo','bien.id_modelo','=','modelo.idmodelo')
                                            ->join('serie','bien.id_serie','=','serie.idserie')
                                            ->join('color','bien.id_color','=','color.idcolor')
                                            ->join('tipo','bien.id_tipo','=','tipo.idtipo')
                                            ->join('estado','bien.id_estado','=','estado.idestado')
                                            ->where('user_end',$iduser)->get();
        //return response()->json(['datos'=>$resultados], 200);
        //return view('formato7');
        $pdf = \PDF::loadView('formato7', compact('resultados','datouser'))->setPaper('a4', 'landscape');
        //return $pdf->download($dni.'.pdf');
        //return $resultados;
        // return view('formato7',compact('datouser'));
        return $pdf->stream();
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
