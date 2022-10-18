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
                <div class="card-body border-bottom">
                    <h4 class="card-title">Administracion de marcas</h4>
                </div>
                <div class="form-group row p-2">
                    <div class="col-sm-3">
                        <label for="">Categoria</label>
                        <select class="form-control form-control-sm" v-model="idcategoria">
                           
                           <template v-for="cat in datacategoria">
                            <option :value="cat.idtipo">{{cat.des_tipo}}</option>
                           </template>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label for="">Ingrese la marca</label>
                        <input type="text" ref='focusMe' class="form-control form-control-sm digitacion" placeholder="Ingrese la marca aqui" v-model="nombremarca" autofocus>
                    </div>
                    
                    <div class="col-sm-3">
                        <label for="">Estado de la marca</label>
                        <select class="form-control form-control-sm" v-model="estado">
                            <option value="1">Habilitado</option>
                            <option value="0">Desabilitado</option>
                        </select>
                    </div>
                    <div class="col-sm-3 mt-2">
                        <button class="btn btn-primary btn-sm" @click="agregarmarca">
                            <i class="fa-regular fa-file"></i> Agregar marca</button>
                    </div>

                </div>

                <div class="card-datatable table-responsive pt-0">
                    <table class="user-list-table table">
                        <thead class="table-light">
                            <tr>
                                <th>Codigo</th>
                                <th>Marca</th>
                                <th>Categoria</th>
                                <th>Estado</th>
                                <th>Creacion</th>
                                <th>Actualizacion</th>
                                <th>Acciones </th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="mar in datamarca">
                                <td>{{mar.idmarca}}</td>
                                <td>{{mar.des_marca}}</td>
                                <td>{{mar.des_tipo}}</td>
                                <td v-if="mar.stado_marca==1">Habilitado</td>
                                <td v-else>Desabilitado</td>
                                <td>{{mar.created_at}}</td>
                                <td>{{mar.updated_at}}</td>
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
            datamarca: {},
            datacategoria:{},
            nombremarca: '',
            idcategoria:'',
            estado: 1
        }
    },
    props: [],
    components: {

    },
    created() {
        this.listadodemarca();
        this.listadodecategoria();
    },
    mounted() {
        this.$refs.focusMe.focus();
    },
    methods: {
        listadodemarca() {
            var url = '/api/marcalista';
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
        agregarmarca()
        {
            var url='/api/agregamarca'
            
            axios.post(url,{
                'nombremarca':this.nombremarca,
                'estado':this.estado,
                'idcategoria':this.idcategoria
            }).then(response=>{
                console.log(response);
                this.listadodemarca();
                this.nombremarca='';
                this.$refs.focusMe.focus();
            });
        }
    }
}
</script>

<style lang="css" scoped>

.digitacion{text-transform: uppercase;}
</style>
