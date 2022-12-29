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
        <h4 style="text-align: center">CARGO PERSONAL - GOBIERNO REGIONAL HUANUCO</h4>
        <hr>

        <table style="font-size: 10px">
            <tr>
                <td><strong>OFICINA</strong>:</td><td class="bodecuadro">{{$datouser[0]->depe_nombre}}</td>                
                <td><strong>NUMERO</strong></td><td class="bodecuadro">....</td>                
            </tr>
            <tr>
                <td><strong>APELLIDOS Y NOMBRES</strong>:</td><td class="bodecuadro">{{$datouser[0]->adm_name}} {{$datouser[0]->adm_lastname}}</td>                
                <td><strong>FECHA</strong></td><td class="bodecuadro">3227</td>                
            </tr>
            <tr>
                <td><strong>DNI</strong>:</td><td class="bodecuadro">{{$datouser[0]->adm_dni}}</td>                
                <td><strong></strong></td><td ></td>                
            </tr>
            <tr>
                <td><strong>CARGO Y NIVEL</strong>:</td><td class="bodecuadro">{{$datouser[0]->adm_cargo}}</td>                
                <td><strong></strong></td><td></td>                
            </tr>
            <tr>
                <td><strong>CONDICION LABORAL</strong>:</td><td class="bodecuadro">CAS</td>                
                <td><strong>CANTIDAD BIENES</strong></td><td class="bodecuadro"></td>                
            </tr>
            <tr>
                <td><strong>OBSERVACIONES</strong>:</td><td class="bodecuadro"></td>                
                <td><strong></strong></td><td></td>                
            </tr>
        </table>

        <div class="contenido">
            .............
        </div>
    </body>
</html>