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
                    <div class="card card-primary card-outline " v-show="perfiluser" v-for="user in datousuario" v-if="user.id!=1">
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
                                <div class="col-md-2">
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
                                    <button type="button" class="btn btn-block btn-warning btn-sm" data-toggle="modal" data-target="#asignarbien">
                                        <i class="fas fa-plus"></i> Asignar bien</button>
                                </div>
                                <div class="col-md-2"><label for=""></label>
                                    <a class="btn btn-block btn-primary btn-sm" :href="'/api/cargopersonal/'+dni" target="_blank">
                                        <i class="fa-solid fa-file-pdf"></i> Generar cargo personal</a>
                                </div>
                                <!-- <div class="col-md-2"><label for=""></label>
                                    <button type="button" class="btn btn-block btn-warning btn-sm" @click.stop="firmadigital({id:'123', id_documento:'456'})">
                                        <i class="fa-solid fa-file-pdf"></i> Firmar</button>
                                </div> -->
                                <div class="col-md-2"><label for=""></label>
                                    <a class="btn btn-block btn-info btn-sm" :href="'/api/devolucionbines/'+dni" target="_blank">
                                       Devolucion de bienes</a>
                                </div>
                                <div class="col-md-2"><label for=""></label>
                                    <a class="btn btn-block btn-danger btn-sm" :href="'/api/movimientobienes/'+dni" target="_blank">
                                       Salida de bienes</a>
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
                                            <th style="width: 10%;"><small><strong>DESP</strong></small></th>
                                            <th></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="asig in bienesasignados">
                                            <td><small>
                                                    <strong>COD.PATRIMONIAL</strong>{{asig.cod_pat}}<br>
                                                    <strong>COD.ANTERIOR</strong>{{asig.cod_anterior}}
                                                </small>
                                            </td>
                                            <td><small>{{asig.nom_bien}}</small></td>
                                            <td><small>
                                                    <strong>MARCA</strong>{{asig.nom_bien}}<br>
                                                    <strong>MODELO</strong>{{asig.des_modelo}}<br>
                                                    <strong>SERIE</strong>{{asig.des_serie}}<br>
                                                    <strong>COLOR</strong>{{asig.des_color}}<br>
                                                    <strong>PLACA</strong>{{asig.placa}}
                                                </small>
                                            </td>
                                            <td><small>
                                                    <strong>TIPO</strong>{{asig.des_tipo}}<br>
                                                    <strong>DIMENCION</strong>{{asig.dimension}}<br>
                                                    <strong>ESTADO</strong> {{asig.des_estado}}
                                                </small>
                                            </td>

                                            <td><small>
                                                    <strong>DOC.COMPRA</strong>{{asig.n_documento}}<br>
                                                    <strong>MONTO:</strong>{{asig.monto_compra}}
                                                </small>
                                            </td>
                                            <td>NINGUNA</td>

                                            <td>{{asig.fecha}}</td>
                                            <td>
                                                <input type="checkbox">
                                            </td>
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

    <!-- modal asignar Bien -->
    <!-- Modal -->
    <div class="modal fade" id="asignarbien" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Asignación del bien</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group row">
                        <label for="" class="col-sm-4">Código patrimonial</label>
                        <div class="col-sm-8">
                            <el-select v-model="idbien" filterable placeholder="Código patrimonial" size="small" class="" @change="buscabien($event)" style="width: 100%;">
                                <el-option v-for="item in databien" :key="item.idbien" :label="item.cod_pat" :value="item.idbien">
                                </el-option>
                            </el-select>
                        </div>

                    </div>
                    <div class="row form-group" v-show="activoresul">
                        <table class="table table-bordered table-sm">
                            <tr>
                                <td>Codigo patrimonial</td>
                                <td>{{ codpat }}</td>
                            </tr>
                            <tr>
                                <td>Nombre del bien</td>
                                <td>{{ nombien }}</td>
                            </tr>
                            <tr>
                                <td>Marca</td>
                                <td>{{ marca }}</td>
                            </tr>
                            <tr>
                                <td>Modelo</td>
                                <td>{{ modelo }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="row form-group">
                        <label for="" class="col-sm-4">Tipo movimiento</label>
                        <div class="col-sm-8">
                            <select name="" id="" class="form-control form-control-sm" v-model="idmotivo" placeholder="Tipo movimiento">
                                <option v-for="tipm in datamotivo" :value="tipm.idmotmovimiento">{{ tipm.motivo }}</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" @click="guardaasignacion">Asignar</button>
                </div>
            </div>
        </div>
    </div>

    <docu-invoker ref="foo" :iframe="iframe" />
    <!-- <docu-invoker ref="foo" :iframe="iframe" :route-invoker-get="routeInvokerGet" :route-invoker-post="routeInvokerPost" @firmado="firmado" /> -->
</div>
</template>

<script>
import VDragged from 'v-dragged'
import DocuInvoker from './DocuInvoker'
import Vue from 'vue'
import axios from 'axios';

window.$ = window.jQuery = require('jquery')
Vue.use(VDragged);
export default {
    props: ['ruta'],
    data() {
        return {
            datousuario: {},
            dni: '',
            perfiluser: false,
            listabien: false,
            // DATOS PARA REFIRMA INVOKER
            iframe: {
                src: null,
                loaded: false,
                type: null
            },
            databien: {},
            idbien: '',
            idmotivo: '',
            //////
            itembien: [],
            codpat: '',
            nombien: '',
            marca: '',
            modelo: '',
            activoresul: false,
            datamotivo: {},
            bienesasignados: {}

        }
    },
    components: {
        DocuInvoker
    },
    created() {

    },
    mounted() {
        this.codigopatrimonial();
        this.motivomovimiento();
    },
    methods: {
        buscarusuario() {
            var url = '/api/usuarioxdni/' + this.dni;
            axios.get(url)
                .then(response => {
                    console.log(response);
                    this.datousuario = response.data.datouser;
                    this.perfiluser = true;
                    this.fun_bienesasignados();
                });
        },
        asignaciondeblenes(iduser) {

            this.listabien = true
        },
        codigopatrimonial() {
            var url = '/api/listabien';
            axios.get(url).
            then(response => {
                console.log(response);
                this.databien = response.data.datbien;
            });
        },
        buscabien(item) {
            item = this.idbien;
            var url = '/api/buscarbien/' + this.idbien;
            axios.get(url)
                .then(response => {
                    console.log(response);
                    this.itembien = response.data.databien;
                    this.codpat = this.itembien[0].cod_pat;
                    this.nombien = this.itembien[0].nom_bien;
                    this.marca = this.itembien[0].des_marca;
                    this.modelo = this.itembien[0].des_modelo;
                    this.activoresul = true;
                });
        },
        motivomovimiento() {
            var url = '/api/listamotivo';
            axios.get(url)
                .then(
                    response => {
                        console.log(response);
                        this.datamotivo = response.data.movi;
                    }
                );
        },
        guardaasignacion() {
            var url = '/api/asignacionbien';
            if (this.idmotivo != '' && this.idbien != '') {
                axios.post(url, {
                        'dni': this.dni,
                        'idbien': this.idbien,
                        'idmotivo': this.idmotivo
                    })
                    .then(response => {
                        console.log(response);
                        $('#asignarbien').modal('hide');
                        this. fun_bienesasignados();
                        //this.datamotivo = response.data.movi;
                    });
            } else {
                alert('Falta seleccionar algunos datos')
            }

        },
        fun_bienesasignados() {
            var url = '/api/bienesasignados/' + this.dni;
            axios.get(url)
                .then(response => {
                    console.log(response);
                    this.bienesasignados=response.data.datos;
                });
        },
        firmadigital(documento) {

            this.$refs.foo.initInvoker('W', documento)
        },
        firmado() {
            //this.buscarDocumentos()
        },

    }
}
</script>

<style lang="css" scoped>
.digitacion {
    text-transform: uppercase;
}

/* .el-input_inner{
    height: calc(1.5em + 0.5rem + 2px);
    padding: 0.25rem 0.5rem;
    font-size: 0.7875rem;
    line-height: 1.5;
    border-radius: 0.2rem;
} */
</style>
