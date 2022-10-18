<template>
<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $route.meta.pageTitle }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <router-link :to="'/main'"><i class="fa-solid fa-house-user"></i></router-link>
                        </li>
                        <li class="breadcrumb-item active" v-for="item in $route.meta.breadcrumb" :key="item.text" :active="item.active" :to="item.to">{{ item.text }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="container-fluid">
            <!-- <div class="row">
                <div class="col-lg-6 col-12">

                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">

                        <router-link to="/Patrimonio/agregar" class="btn btn-primary btn-sm"><i class="fa-regular fa-file"></i>
                            Agregar nuevo bien</router-link>

                    </div>
                </div>

            </div> -->

            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="card card-primary card-outline ">
                        <div class="card-header p-1">
                            Documentos en proceso
                        </div>
                        <div class="card-body">
                            <!-- para las opciones de busqueda -->
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="group">
                                        <label for="" class="text-sm">Registro</label>
                                        <input type="number" class="form-control form-control-sm">
                                    </div>
                                </div>

                                <div class="col-md-2"><label for=""></label>
                                    <button type="button" class="btn btn-block btn-primary btn-sm">
                                        Buscar</button>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <table class=" table table-bordered table-condensed table-hover table-sm">
                                    <thead class="bg-lightblue  disabled color-palette pd-0">
                                        <tr class="info">
                                            <th style="width: 7%;"><small><strong>CODIGO</strong></small></th>
                                            <th style="width: 40%;"><small><strong>NOMBRE DEL BIEN</strong></small></th>
                                            <th style="width: 10%;"><small><strong>DESCRIPCION</strong></small></th>

                                            <th style="width: 10%;"><small><strong>TIPOS</strong></small></th>

                                            <th style="width: 10%;"><small><strong>DOCUMENTO</strong></small></th>
                                            <th style="width: 10%;"><small><strong>OBS</strong></small></th>
                                            <th style="width: 10%;"><small><strong>FECHA</strong></small></th>
                                            <th></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><small>
                                                    <strong>COD.PATRIMONIAL</strong>192542354<br>
                                                    <strong>COD.ANTERIOR</strong>192034521
                                                </small>
                                            </td>
                                            <td><small>COMPUTADORA DE ESCRITORIO</small></td>
                                            <td><small>
                                                    <strong>MARCA</strong>192542354<br>
                                                    <strong>MODELO</strong>192034521<br>
                                                    <strong>SERIE</strong>192034521<br>
                                                    <strong>COLOR</strong>192034521<br>
                                                    <strong>PLACA</strong>192034521
                                                </small>
                                            </td>
                                            <td><small>
                                                    <strong>TIPO</strong>192542354<br>
                                                    <strong>DIMENCION</strong>192034521<br>
                                                    <strong>ESTADO</strong>192034521
                                                </small>
                                            </td>

                                            <td><small>
                                                    <strong>DOC.COMPRA</strong>192542354<br>
                                                    <strong>MONTO:</strong>192034521
                                                </small>
                                            </td>
                                            <td>NINGUNA</td>

                                            <td>03/08/2022</td>
                                            <td>
                                                <button class="btn btn-warning btn-sm">
                                                    <i class="fa-regular fa-pen-to-square"></i></button>
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa-regular fa-paper-plane"></i></button>
                                                <button class="btn btn-danger btn-sm">
                                                    <i class="fa-regular fa-trash-can"></i></button></td>

                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</template>

    
<script>

        </script>

    
<style>

        </style>
