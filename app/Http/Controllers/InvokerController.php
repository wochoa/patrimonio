<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class InvokerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postArguments(Request $request)
    {
        header('Access-Control-Allow-Origin', '*');
        //type=$_POST['type'];
        //$documentName=$_POST['documentName'];
        $type=$request->type;
        $motivo = [
            0=>"Soy el autor del documento",
            1=>"En señal de conformidad",
            2=>"Doy V° B°",
            3=>"Por encargo",
            4=>"Doy fé"
        ];

        if(isset($request->iddocumento)&&$request->iddocumento!=null){
            $documentName   =  $request->idFile;
            $documentName   .=  '-'.$request->iddocumento.'.pdf';
        }else
            $documentName = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 40).".PDF" ;
            $rutaupload=env('APP_URL').'/upload.php';

        $param=[
                'app'=>'pdf',
                'fileUploadUrl'=>env('APP_URL').'/upload.php',//'http://patrimonio.test/api/invoker/upload',//'http://invokerapi.test/controller/upload.php',//route('invoker.upload'),
                'reason'=>$motivo[$request->motivo],
                'clientId'=>env('CLIENTID'),
                'clientSecret'=>env('CLIENTSECRET'),
                'dcfilter'=>'.*FIR.*|.*FAU.*',
                'posx'=>$request->posx,
                'posy'=>$request->posy,
                'protocol'=>'T',
                'stampAppearanceId'=>'0',
                'isSignatureVisible'=>'true',
                'fileDownloadLogoUrl'=>env('APP_URL').'/img/refirma/iLogo1.png',
                'fileDownloadStampUrl'=>env('APP_URL').'/img/refirma/iFirma1.png',
                'pageNumber'=>'0',
                'maxFileSize'=>'5242880',
                'fontSize'=>'7',
                'timestamp'=>'false',
                'idFile'=>'MyForm',
                ];
        if($type=="L")
        {
            $param['type']='L';
            $param['fileDownloadUrl']='';
            $param['outputFile']=$documentName;
            $param['contentFile']='';
            // $param['idFile']='MyForm';
        }	
        if($type=="W")
        {
            $param['type']='W';
            $param['outputFile']=$documentName;
            $param['contentFile']=$request->iddocumento.'.pdf';

            
            $rutaDeArchivo = url('storage/documentos_word/informe.pdf');
	       

            $param['fileDownloadUrl']=$rutaDeArchivo;
            //$param['contentFile']='demo.pdf';
            // $param['idFile']='MyForm';
       
        }
        //dd($param);
        $jsonReplaces = array(array("\\"),
            array(''));
        $r =  str_replace($jsonReplaces[0], $jsonReplaces[1], json_encode((Object)$param));

        return base64_encode($r);
        //return $r;//base64_encode($r);
    }

    public function upload(Request $request)
    {
        // $filenametostore = $request->file('MyForm')->getClientOriginalName();
        // Storage::disk('firmados')->put('21212-3354672.pdf', $filenametostore);
            //Store $filenametostore in the database
            return 'correcto';



    }

    public function getArguments(Request $request)
    {
        if(isset($request->iddocumento)){

        }else
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 40).".PDF" ;
        //return 'xeAXhpIbk0oaLYVf87ZznOumrCKWS54UwdHgNJMq.PDF';
    }

    public function getFile(Request $request)
    {
        $documentName = $request->documentName; 

        $separa=DIRECTORY_SEPARATOR;

        $tmp = dirname(tempnam (null,'')); 

        $archivo = $tmp.$separa."upload".$separa.$file_name.$documentName;

        header('Content-Type: application/pdf');
        header('Content-Disposition:attachment;filename="'.$documentName.'"');
        readfile($archivo);
    }

    public function printPdfR($idFile, $idDocumento)
    {
        $exp = explode('.', $idDocumento);
        return File::getPdf($idFile, $exp[0], 1);
    }

    public function index()
    {
        //
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
