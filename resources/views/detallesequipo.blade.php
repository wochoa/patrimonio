@extends('layouts.loginp')
@section('title')
Datos del bien
@endsection
@section('content')


    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
          <b>DATOS DEL BIEN</b> GRH
        </div>
        <div class="card-body p-0">
            <table class="table table-sm table-bordered">
                <tr>
                    <td><b>COD.PATRIMONIAL:</b></td>
                    <td>{{$bien[0]->cod_pat}}</td>
                </tr>
                <tr>
                    <td><b>BIEN:</b></td>
                    <td>{{$bien[0]->nom_bien}}</td>
                </tr>

                <tr>
                    <td><b>TIPO:</b></td>
                    <td>{{$bien[0]->des_tipo}}</td>
                </tr>
                <tr>
                    <td><b>MARCA:</b></td>
                    <td>{{$bien[0]->des_marca}}</td>
                </tr>
                <tr>
                    <td><b>MODELO:</b></td>
                    <td>{{$bien[0]->des_modelo}}</td>
                </tr>
                <tr>
                    <td><b>SERIE:</b></td>
                    <td>{{$bien[0]->des_serie}}</td>
                </tr>
                <tr>
                    <td><b>COLOR:</b></td>
                    <td>{{$bien[0]->des_color}}</td>
                </tr>
                <tr>
                    <td><b>ESTADO:</b></td>
                    <td>{{$bien[0]->des_estado}}</td>
                </tr>
                <tr>
                    <td><b>PLACA:</b></td>
                    <td>{{$bien[0]->placa}}</td>
                </tr>
                <tr>
                    <td><b>DIMENSION:</b></td>
                    <td>{{$bien[0]->dimension}}</td>
                </tr>
                <tr>
                    <td><b>DOC. COMPRA:</b></td>
                    <td>{{$bien[0]->doc_compra}}</td>
                </tr>
                <tr>
                    <td><b>COSTO:</b></td>
                    <td>{{$bien[0]->monto_compra}}</td>
                </tr>
                <tr>
                    <td><b>FECHA:</b></td>
                    <td>{{$bien[0]->created_at}}</td>
                </tr>
                <tr>
                    <td><b>OBSERVACION:</b></td>
                    <td>{{$bien[0]->observacion}}</td>
                </tr>
            </table>
         
    
          
        </div>
        <!-- /.card-body -->
        <div class="card-bottom text-center">
            <a class="btn btn-sm btn-primary" href="{{url('editarbien/'.$id)}}">Actualizar datos</a>
        </div>
      </div>
      <!-- /.card -->
@endsection