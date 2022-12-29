<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>FORMATO DE DEVULICION DE BIENES</title>
        <style>
        h1{
        text-align: center;
        text-transform: uppercase;
        }
        .contenido{
        font-size: 20px;
        }
        #primero{
        background-color: #ccc;
        }
        #segundo{
        color:#44a359;
        }
        #tercero{
        text-decoration:line-through;
        }
        .bodecuadro{
            border: #ccc 1px solid;
        }
    </style>
    </head>
    <body>
        <h4 style="text-align: center">ANEXO N° 04</h4>
        <h4 style="text-align: center">ORDEN DE SALIDA, REINGRESO Y DESPLAZAMIENTO INTERNO DE BIENES MUEBLES PATRIMONIALES</h4>
        <img src="{{asset('/dist/img/logo2.png')}}" alt="" width="130">
        <hr>

        <table style="font-size: 10px" width="100%">
            <tr>
                <td><strong>ENTIDAD U ORGANIZACION DE LA ENTIDAD</strong>:</td><td class="bodecuadro">{{$datouser[0]->depe_nombre}}</td> 
                <td width="15%"></td>               
                <td><strong>FECHA</strong></td><td class="bodecuadro">{{date('d')}}/{{date('m')}}/{{date('Y')}}</td>                
            </tr>
            
        </table>
        <br>
        <table style="font-size: 10px" border="1" cellspacing="0" cellpadding="0" width="100%">
            <tr>
                <td><strong>TIPO</strong>:</td> <td width="5%"></td> <td><strong>REINGRESO</strong></td><td width="5%"></td><td><strong>DESPLAZAMIENTO INTERNO</strong></td><td width="5%"></td> 
            </tr>
            
        </table>
        <br>
        <div class="contenido">
            <table  style="font-size: 10px" border="1" cellspacing="0" cellpadding="0" width="100%">
                <thead>
                    <tr>
                        <th>N° INT</th>
                        <th>CÓD PATRIM</th>
                        <th>NOMBRE</th>
                        <th>MARCA</th>
                        <th>MODELO</th>
                        <th>TIPO</th>
                        <th>COLOR</th>
                        <th>SERIE</th>
                        <th>DIMENSION</th>
                        <th>ESTADO</th>
                        <th>CÓDIGO ANTERIOR</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < count($resultados); $i++)
                        <tr>
                            <td>{{$i+1}}</td>
                            <td>{{$resultados[$i]->cod_pat}}</td>
                            <td>{{$resultados[$i]->nom_bien}}</td>
                            <td>{{$resultados[$i]->des_marca}}</td>
                            <td>{{$resultados[$i]->des_modelo}}</td>
                            <td>{{$resultados[$i]->des_tipo}}</td>
                            <td>{{$resultados[$i]->des_color}}</td>
                            <td>{{$resultados[$i]->des_serie}}</td>
                            <td>{{$resultados[$i]->dimension}}</td>
                            <td>{{$resultados[$i]->des_estado}}</td>
                            <td>{{$resultados[$i]->cod_anterior}}</td>
                        </tr>
                    @endfor
                   
                </tbody>
            </table>
            <br><br><br><br>
            <table width='100%' style="margin-top: 50px" align="center" style="font-size: 10px">
                <tr>
                    <td width='33%' align="center">-------------------------------- <br>Usuario</td>
                    <td width='33%'></td>
                    <td width='33%' align="center">-------------------------------- <br>Personal inventariador</td>
                </tr>
            </table>
        </div>
    </body>
</html>