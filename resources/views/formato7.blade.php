<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>FORMATO DE ASIGNACION DE BIENES</title>
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
        <h4 style="text-align: center">ANEXO N° 07</h4>
        <h4 style="text-align: center">FORMATO DE FICHA DE LEVENATMIENTO DE INFORMACION INVENTARIO PATRIMNIAL</h4>
        <h4 style="text-align: center">CARGO PERSONAL - GOBIERNO REGIONAL HUANUCO</h4>
        <img src="{{asset('/dist/img/logo2.png')}}" alt="" width="130">
        <hr>

        <table style="font-size: 10px" width="100%">
            <tr>
                <td><strong>OFICINA</strong>:</td><td class="bodecuadro">{{$datouser[0]->depe_nombre}}</td> 
                <td width="15%"></td>               
                <td><strong>NUMERO</strong></td><td class="bodecuadro">....</td>                
            </tr>
            <tr>
                <td><strong>APELLIDOS Y NOMBRES</strong>:</td><td class="bodecuadro">{{$datouser[0]->adm_name}} {{$datouser[0]->adm_lastname}}</td>
                <td width="15%"></td>                 
                <td><strong>FECHA</strong></td><td class="bodecuadro">{{date('Y/m/d')}}</td>                
            </tr>
            <tr>
                <td><strong>DNI</strong>:</td><td class="bodecuadro">{{$datouser[0]->adm_dni}}</td>
                <td width="15%"></td>                 
                <td><strong></strong></td><td ></td>                
            </tr>
            <tr>
                <td><strong>CARGO Y NIVEL</strong>:</td><td class="bodecuadro">{{$datouser[0]->adm_cargo}}</td>
                <td width="15%"></td>                 
                <td><strong></strong></td><td></td>                
            </tr>
            <tr>
                <td><strong>CONDICION LABORAL</strong>:</td><td class="bodecuadro">CAS</td>
                <td width="15%"></td>                 
                <td><strong>CANTIDAD BIENES</strong></td><td class="bodecuadro"></td>                
            </tr>
            <tr>
                <td><strong>OBSERVACIONES</strong>:</td><td class="bodecuadro"></td>
                <td width="15%"></td>                 
                <td><strong></strong></td><td></td>                
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