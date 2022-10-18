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
            <div class="row">
                <div class="col-sm-3 col-12">
                    <div class="card">
                        <div class="card-header p-1">
                            Datos usuario
                        </div>
                        <div class="cad-body mt-2 p-2">
                            <div class="form-group row">

                                <div class="col-sm-9">
                                    <input type="number" class="form-control form-control-sm" placeholder="Buscar por NRO DNI" v-model="dni" autofocus>
                                </div>
                                <div class="col-sm-3">
                                    <button class="btn btn-primary btn-sm" @click="buscarusuario"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline " v-show="perfiluser" v-for="user in datousuario" >
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" :src="ruta+'/dist/img/user1-128x128.jpg'" alt="User profile picture">
                            </div>

                            <p class="text-muted text-center p-0"><small>{{user.adm_name}} {{user.adm_lastname}}</small><br>
                                <small>{{user.adm_cargo}}</small></p>

                            <ul class="list-group list-group-unbordered mb-1">
                                <li class="list-group-item p-0">
                                    <b>Correo</b> <a class="float-right text-sm"><small>{{user.adm_correo}}</small></a>
                                </li>
                                <li class="list-group-item p-0">
                                    <b>Telefono</b> <a class="float-right"><small>{{user.adm_telefono}}</small></a>
                                </li>
                                <li class="list-group-item p-0">
                                    <b>DNI</b> <a class="float-right"><small>{{user.adm_dni}}</small></a>
                                </li>
                                <!-- <li class="list-group-item p-0">
                                    <b>Usuario(SGD)</b> <a class="float-right">{{user.adm_email}}</a>
                                </li> -->
                            </ul>

                            <a href="#" class="btn btn-primary btn-block" @click="asignaciondeblenes(user.id)">Asignar bienes</a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-sm-9 col-12" v-show="listabien">
                    <div class="card card-primary card-outline ">
                        <div class="card-header p-1">
                            Listado de bienes asignados
                        </div>
                        <div class="card-body">
                            <!-- para las opciones de busqueda -->
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="group">
                                        <label for="" class="text-sm">Código patrimonial</label>
                                        <input type="number" class="form-control form-control-sm" placeholder="Digite el código">
                                    </div>
                                </div>

                                <div class="col-md-2"><label for=""></label>
                                    <button type="button" class="btn btn-block btn-info btn-sm">
                                        <i class="fa-sharp fa-solid fa-magnifying-glass"></i> Buscar</button>
                                </div>
                                <div class="col-md-2"><label for=""></label>
                                    <button type="button" class="btn btn-block btn-danger btn-sm">
                                        <i class="fa-solid fa-file-pdf"></i> Descargar</button>
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
                                                    <i class="fa-solid fa-qrcode"></i></button>

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
export default {
    props: ['ruta'],
    data() {
        return {
            datousuario: {},
            dni: '',
            perfiluser: false,
            listabien: false
        }
    },
    components: {

    },
    created() {

    },
    mounted() {

    },
    methods: {
        buscarusuario() {
            var url = '/api/usuarioxdni/' + this.dni;
            axios.get(url)
                .then(response => {
                    console.log(response);
                    this.datousuario = response.data.datouser;
                    this.perfiluser = true
                });
        },
        asignaciondeblenes(iduser) {

            this.listabien = true
        }

    }
}
</script>

<style lang="css" scoped>
.digitacion {
    text-transform: uppercase;
}
</style>
