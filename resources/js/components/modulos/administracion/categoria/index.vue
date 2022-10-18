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
                    <h4 class="card-title">Administracion de categorias</h4>
                </div>
                <div class="form-group row p-2">
                    <div class="col-sm-4">
                        <label for="">Ingrese la categoria</label>
                        <input type="text" ref='focusMe' class="form-control form-control-sm digitacion" placeholder="Ingrese la categoria aqui" v-model="nombrecategoria" autofocus>
                    </div>
                    
                    <div class="col-sm-4 mt-2">
                        <button class="btn btn-primary btn-sm" @click="agregarcategoria">
                            <i class="fa-regular fa-file"></i> Agregar categoria</button>
                    </div>

                </div>

                <div class="card-datatable table-responsive pt-0">
                    <table class="user-list-table table table-sm table-bordered table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Codigo</th>
                                <th>categoria</th>
                               
                                <th>Creacion</th>
                                <th>Actualizacion</th>
                                <th>Acciones </th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="mar in datacategoria">
                                <td>{{mar.idtipo}}</td>
                                <td>{{mar.des_tipo}}</td>
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
            datacategoria: {},
            nombrecategoria: '',
           
        }
    },
    props: [],
    components: {

    },
    created() {
        this.listadodecategoria();
    },
    mounted() {
        this.$refs.focusMe.focus();
    },
    methods: {
        listadodecategoria() {
            var url = '/api/categorias';
            axios.get(url)
                .then(response => {
                    console.log(response);
                    this.datacategoria = response.data.dattipo;
                });
        },
        agregarcategoria()
        {
            var url='/api/agregacategorias'
            
            axios.post(url,{
                'nombrecategoria':this.nombrecategoria
            }).then(response=>{
                console.log(response);
                this.listadodecategoria();
                this.nombrecategoria='';
                this.$refs.focusMe.focus();
            });
        }
    }
}
</script>

<style lang="css" scoped>
.digitacion{text-transform: uppercase;}
</style>
