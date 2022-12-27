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
            <div class="row mt-10">
                <div class="col-lg-6 col-10">
                    <button class="btn btn-info btn-sm" @click="retroceder()"><i class="fa-regular fa-circle-left"></i> Volver a Listado de bienes</button>
                </div>

            </div>
            <div class="card mt-2">

                <div class="card-header p-1">
                    <h5>{{ $route.meta.pageTitle }}</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group row">
                                <label for="" class="col-sm-3">Codigo:</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control form-control-sm" placeholder="Digitar codigo" autofocus v-model="codpat">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-3">Bien:</label>
                                <div class="col-sm-9">
                                    <textarea cols="30" rows="4" class="form-control form-control-sm" placeholder="Describa el bien" v-model="nombrebien"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3">Observación:</label>
                                <div class="col-sm-9">
                                    <textarea cols="30" rows="4" class="form-control form-control-sm" placeholder="Describa el obs" v-model="obs"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group row">
                                <label for="" class="col-sm-3">Tipo:</label>
                                <div class="col-sm-7">
                                    <select class="form-control form-control-sm" v-model="idcategoria" @change="listadodemarca">

                                        <template v-for="cat in datacategoria">
                                            <option :value="cat.idtipo">{{cat.des_tipo}}</option>
                                        </template>
                                    </select>
                                </div>
                                <div class="col-sm-1">
                                    <button class="btn  btn-primary btn-xs"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3">Marca:</label>
                                <div class="col-sm-7">
                                    <select class="form-control form-control-sm" v-model="idmarca" @change="listadomodelo">

                                        <template v-for="mar in datamarca">
                                            <option :value="mar.idmarca">{{mar.des_marca}}</option>
                                        </template>
                                    </select>
                                </div>
                                <div class="col-sm-1">
                                    <button class="btn  btn-primary btn-xs"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3">Modelo:</label>
                                <div class="col-sm-8">
                                    <select class="form-control form-control-sm" v-model="idmodelo" @change="listaserie">

                                        <template v-for="mod in datamodelo">
                                            <option :value="mod.idmodelo">{{mod.des_modelo}}</option>
                                        </template>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3">Serie:</label>
                                <div class="col-sm-8">
                                    <select class="form-control form-control-sm" v-model="idserie">
                                        <template v-for="ser in dataserie">
                                            <option :value="ser.idserie" v-if="ser.des_serie!=null">{{ser.des_serie}}</option>
                                            <option :value="ser.idserie" v-else>{{ser.des_serie_vehiculo}}</option>
                                        </template>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3">Color:</label>
                                <div class="col-sm-8">
                                    <select class="form-control form-control-sm" v-model="idcolor">
                                        <template v-for="col in datacolor">
                                            <option :value="col.idcolor">{{col.des_color}}</option>
                                        </template>
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group row">
                                <label for="" class="col-sm-3">Estado:</label>
                                <div class="col-sm-8">
                                    <select class="form-control form-control-sm" v-model="idestado">
                                        <template v-for="est in dataestado">
                                            <option :value="est.idestado">{{est.des_estado}}</option>
                                        </template>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3">Placa:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" placeholder="Digitar placa en caso de vehiculos" v-model="placa">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3">Dimensión:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" placeholder="Digitar dimensión" v-model="dimension">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3">Doc. compra:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" placeholder="Digitar doc. compra" v-model="doccompra">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3">Monto bien:</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control form-control-sm" placeholder="Digitar monto" v-model="monto">
                                </div>
                            </div>
                            <!-- <div class="form-group row">
                                <label for="" class="col-sm-3">Fecha reg.:</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control form-control-sm" placeholder="fecha">
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-primary btn-sm" @click="registrobien">Registrar bien</button>
                    
                </div>

            </div>
        </div>
    </div>

</div>
</template>

<script>
import axios from 'axios';
// import { response } from 'express';

export default {
    name: '',
    data() {
        return {
            datamodelo: {},
            dataserie: {},
            datamarca: {},
            nombreserie_otros: '',
            nombreserie_motor: '',
            nombreserie_chasis: '',
            idmarca: '',//
            idmodelo: '',//
            idserie: '',//
            idcolor: '',//
            idestado:'',//
            datacategoria: {},
            datacolor: {},
            dataestado:{},
            idcategoria: '',//
            // datos para guardar
            codpat:'',
            nombrebien:'',
            obs:'',
            placa:'',
            dimension:'',
            doccompra:'',
            monto:''
        }
    },
    props: [],
    components: {

    },
    created() {
        //this.listadodemodelo();
        this.listadodecategoria();
        this.listacolor();
        this.listadodeestado();
    },
    mounted() {
        // this.$refs.focusMe.focus();
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
        listaserie() {

            var url = '/api/series/' + this.idmodelo;
            axios.get(url)
                .then(response => {
                    console.log(response);
                    this.dataserie = response.data.datserie;

                });
        },
        listacolor() {
            //datacolor
            var url = '/api/colores';
            axios.get(url)
                .then(response => {
                    console.log(response);
                    this.datacolor = response.data.datcolor;
                });
        },
        listadodeestado() {
            var url = '/api/estado';
            axios.get(url)
                .then(response => {
                    console.log(response);
                    this.dataestado = response.data.datestado;
                });
        },
        registrobien(){
            var url='/api/registrobien';
            var parametros={
                'codpat':this.codpat,
                'nombrebien':this.nombrebien,
                'obs':this.obs,
                'idcategoria':this.idcategoria,
                'idmarca':this.idmarca,
                'idmodelo':this.idmodelo,
                'idserie':this.idserie,
                'idcolor':this.idcolor,
                'idestado':this.idestado,
                'placa':this.placa,
                'dimension':this.dimension,
                'doccompra':this.doccompra,
                'monto':this.monto,
                'iduser':this.$attrs.usuario.id
            }
            axios.post(url,parametros)
                .then(response=>{
                    console.log(response);
                    // LIMPIAMOS
                    this.codpat='',
                    this.nombrebien='',
                    this.obs='',
                    this.idcategoria='',
                    this.idmarca='',
                    this.idmodelo='',
                    this.idserie='',
                    this.idcolor='',
                    this.idestado='',
                    this.placa='',
                    this.dimension='',
                    this.doccompra='',
                    this.monto=''
                });

        },
        retroceder() {
            window.history.back();
        }

    }
}
</script>

<style lang="css" scoped>
.digitacion {
    text-transform: uppercase;
}
.btn-xs{
    padding: 0.125rem 0.25rem;
    font-size: .75rem;
    line-height: 1.5;
    border-radius: 0.15rem;
}
</style>
