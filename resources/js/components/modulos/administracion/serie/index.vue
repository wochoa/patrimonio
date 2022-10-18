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
            <div class="card">
                <div class="card-body border-bottom p-1">
                    <h4 class="card-title">Administracion de series</h4>
                </div>
                <div class="form-group row p-2">
                    <div class="col-sm-2">
                        <label for="">Categoria</label>
                        <select class="form-control form-control-sm" v-model="idcategoria" @change="listadodemarca">

                            <template v-for="cat in datacategoria">
                                <option :value="cat.idtipo">{{cat.des_tipo}}</option>
                            </template>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label for="">Marca</label>
                        <select class="form-control form-control-sm" v-model="idmarca" @change="listadomodelo">

                            <template v-for="mar in datamarca">
                                <option :value="mar.idmarca">{{mar.des_marca}}</option>
                            </template>
                        </select>
                    </div>
                    <!-- <div class="col-sm-3">
                            <label for="">Ingrese la modelo</label>
                            <input type="text" ref='focusMe' class="form-control form-control-sm digitacion" placeholder="Ingrese la modelo aqui" v-model="nombreserie" autofocus>
                        </div> -->

                    <div class="col-sm-3">
                        <label for="">Modelo</label>
                        <select class="form-control form-control-sm" v-model="idmodelo">

                            <template v-for="mod in datamodelo">
                                <option :value="mod.idmodelo">{{mod.des_modelo}}</option>
                            </template>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group row mb-0" v-show="famnovehiculo">
                            <label for="">Ingrese el serie</label>
                            <input type="text" ref='focusMe' class="form-control form-control-sm digitacion" placeholder="Ingrese la serie aqui" v-model="nombreserie_otros" autofocus>
                        </div>
                        <div class="form-group row mb-0" v-show="famvehiculo">
                            <label for="">Ingrese el serie</label>
                            <input type="text" class="form-control form-control-sm digitacion" placeholder="Ingrese serie motor" v-model="nombreserie_motor" autofocus>
                            <input type="text" class="form-control form-control-sm digitacion" placeholder="Ingrese serie chasis" v-model="nombreserie_chasis" autofocus></input>
                        </div>

                        <div class="form-group row mt-0">
                            <label for="">La serie es familia de vehiculos?</label>
                            <div class="form-check">
                                <input class="" type="radio" name="radio1" @change="opcionserie(1)">
                                <label class="form-check-label pr-3">SI</label>
                                <input class="pl-5" type="radio" name="radio1" checked @change="opcionserie(2)">
                                <label class="form-check-label ">NO</label>

                            </div>
                        </div>
                    </div>

                    <div class="col-sm-1 mt-4">

                        <button class="btn btn-primary btn-sm" @click="agregarserie">
                            <i class="fa-regular fa-file"></i> Agregar</button>
                    </div>

                </div>

                <div class="card-datatable table-responsive pt-0">
                    <table class="user-list-table table">
                        <thead class="table-light">
                            <tr>
                                <th>Codigo</th>
                                <th>serie</th>
                                <th>modelo</th>

                                <th>Creacion</th>
                                <th>Actualizacion</th>
                                <th>Acciones </th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="ser in dataserie">
                                <td>{{ser.idserie}}</td>
                                <td v-if="ser.des_serie!=null">{{ser.des_serie}}</td>
                                <td v-else>{{ser.des_serie_vehiculo}}</td>
                                <td>{{ser.des_modelo}}</td>

                                <td>{{ser.created_at}}</td>
                                <td>{{ser.updated_at}}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm">
                                        <i class="fa-solid fa-pen-to-square"></i></button>
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fa-regular fa-trash-can"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
</template>

<script>
import axios from 'axios';

export default {
    name: '',
    data() {
        return {
            datamodelo: {},
            dataserie:{},
            datamarca: {},
            nombreserie_otros: '',
            nombreserie_motor: '',
            nombreserie_chasis: '',
            idmarca: '',
            idmodelo: '',
            datacategoria: {},
            idcategoria: '',
            famnovehiculo:true,
            famvehiculo:false
        }
    },
    props: [],
    components: {

    },
    created() {
        //this.listadodemodelo();
        this.listadodecategoria();
        this.listadoserie();
    },
    mounted() {
        this.$refs.focusMe.focus();
    },
    methods: {
        listadomodelo() {
            var url = '/api/modelolista/' + this.idmarca;
            axios.get(url)
                .then(response => {
                    console.log(response);
                    this.datamodelo = response.data.datmodelo;
                });
        },
        listadodemarca() {
            var url = '/api/marcaxcat/' + this.idcategoria;
            axios.get(url)
                .then(response => {
                    console.log(response);
                    this.datamarca = response.data.datmarca;
                });
        },
        listadodecategoria() {
            var url = '/api/categorias';
            axios.get(url)
                .then(response => {
                    console.log(response);
                    this.datacategoria = response.data.dattipo;
                    
                });
        },
        listadoserie()
        {
            
            var url = '/api/series';
            axios.get(url)
                .then(response => {
                    console.log(response);
                    this.dataserie = response.data.datserie;
                    
                });
        },
        agregarserie() {
            var url = '/api/agregaserie'

            axios.post(url, {
                'nombreserie_otros': this.nombreserie_otros,
                'nombreserie_motor': this.nombreserie_motor,
                'nombreserie_chasis': this.nombreserie_chasis,
                'idmodelo': this.idmodelo
            }).then(response => {
                console.log(response);
                this.listadoserie();
                this.nombreserie_otros = '';
                this.nombreserie_motor = '';
                this.nombreserie_chasis = '';
                this.famnovehiculo=true
                this.famvehiculo=false
                this.$refs.focusMe.focus();
            });
        },
        opcionserie(op){
            if(op==1){
                this.nombreserie_otros = '';
                this.famnovehiculo=false
                this.famvehiculo=true
            }
            else{
                this.famnovehiculo=true
                this.famvehiculo=false
                this.nombreserie_motor = '';
                this.nombreserie_chasis = '';
            }
        }
    }
}
</script>

<style lang="css" scoped>
.digitacion {
    text-transform: uppercase;
}
</style>
