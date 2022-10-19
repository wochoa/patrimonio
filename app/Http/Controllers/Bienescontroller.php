<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Bienescontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $bien=DB::table('bien')
                                ->join('marca','bien.id_marca','=','marca.idmarca')
                                ->join('modelo','bien.id_modelo','=','modelo.idmodelo')
                                ->join('serie','bien.id_serie','=','serie.idserie')
                                ->join('color','bien.id_color','=','color.idcolor')
                                ->join('tipo','bien.id_tipo','=','tipo.idtipo')
                                ->join('estado','bien.id_estado','=','estado.idestado')
                                ->orderBy('idbien','ASC')->get();
        return response()->json(['datbien'=>$bien], 200);
        
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
    public function agregarbien(Request $request)
    {
        $validated = $request->validate([
            'codpat' => 'required',
            'dimension' => 'required',
            'doccompra' => 'required',
            'idcategoria' => 'required',
            'idcolor' => 'required',
            'idestado' => 'required',
            'idmarca' => 'required',
            'idmodelo' => 'required',
            'idserie' => 'required',
            'iduser' => 'required',
            'monto' => 'required',
            'nombrebien' => 'required'
        ]);
        $creacion=date('Y-m-d H:i:s');

        DB::insert('insert into bien (
            cod_pat,
            nom_bien,
            id_marca,
            id_modelo,
            id_tipo,
            id_serie,
            id_color,
            dimension,
            id_estado,
            placa,
            doc_compra,
            monto_compra,
            observacion,
            iduser,
            created_at,
            updated_at) values (?, ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)', 
            [
                strtoupper($request->codpat),
                strtoupper($request->nombrebien),
                $request->idmarca,
                $request->idmodelo,
                $request->idcategoria,
                $request->idserie,
                $request->idcolor,
                strtoupper($request->dimension),
                $request->idestado,
                strtoupper($request->placa),
                strtoupper($request->doccompra),
                $request->monto,
                strtoupper($request->observacion),
                $request->iduser,
                $creacion,
                $creacion]);
        return 'ok';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function verbien($id)
    {
        $bien=DB::table('bien')
                                ->join('marca','bien.id_marca','=','marca.idmarca')
                                ->join('modelo','bien.id_modelo','=','modelo.idmodelo')
                                ->join('serie','bien.id_serie','=','serie.idserie')
                                ->join('color','bien.id_color','=','color.idcolor')
                                ->join('tipo','bien.id_tipo','=','tipo.idtipo')
                                ->join('estado','bien.id_estado','=','estado.idestado')
                                ->where('idbien',$id)
                                ->get();
        //return response()->json(['datbien'=>$bien], 200);
        return view('detallesequipo',compact('bien','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function qrcode($id)// id del bien
    {
        $url=url('/api/verbien/'.$id);
        // $image = \QrCode::format('png')
        //                  ->merge('dist/img/iFirma.png', 0.5, true)
        //                  ->size(200)->errorCorrection('H')
        //                  ->generate($url);
        $image = \QrCode::size(100)
        ->backgroundColor(255,55,0)
        ->generate($url);


        Storage::disk('codigosqr')->put($id.'.svg', $image);//guarda
        
        $url=url('storage/codigosqr/'.$id.'.svg');
        return $url;
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
