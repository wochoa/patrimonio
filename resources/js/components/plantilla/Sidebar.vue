<template>
<div>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <router-link :to="'/main'" class="brand-link text-decoration-none">
        <!-- <a href="index3.html" class="brand-link text-decoration-none"> -->
            <img :src="ruta+'/dist/img/AdminLTELogo.png'" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light ">Administrador</span>
        </router-link>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img :src="ruta+'/dist/img/user2-160x160.jpg'" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <!-- <a href="#" class="d-block text-decoration-none">{{usuario.fullname}}</a> -->
                   <router-link :to="{name:'Editar usuario',params:{id:usuario.id }}" class="d-block text-decoration-none">{{usuario.fullname}}</router-link> 
                </div>
            </div>
            <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                <div class="info">
                    
                    <a href="#" class="d-block text-decoration-none" @click="logout">
                        
                        <i class="fas fa-sign-out-alt"></i> Cerrar session
                    </a>
                </div>
            </div> -->

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


                    <li class="nav-item">
                                <router-link :to="'/main'" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>Dashboard</p>
                                </router-link>
                    </li>
                    
                    
                    <li class="nav-header text-info">Gestion de bienes</li>
                            <li class="nav-item">
                                <router-link :to="'/Patrimonio/listado'" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Registro de bienes</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link :to="'/Patrimonio/movimientobienes'" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Movimiento de bienes</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link :to="'/Patrimonio/asignacionuso'" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Asignación en uso(F3)</p>
                                </router-link>
                            </li>



                            <li class="nav-header text-info">Administración</li>
                            <li class="nav-item">
                                <router-link :to="'/Administracion/tipo'" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Categoria del bien</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link :to="'/Administracion/marca'" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Marca</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link :to="'/Administracion/modelo'" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Modelo</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link :to="'/Administracion/serie'" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Serie</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link :to="'/Administracion/color'" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Color</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link :to="'/Administracion/estado'" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Estado bien</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link :to="'/Administracion/usuarios'" class="nav-link">
                                    <i class="fa-regular fa-circle-user nav-icon"></i>
                                    <p>Usuarios</p>
                                </router-link>
                            </li>


                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
</div>
</template>

<script>
import axios from 'axios'
export default {
    name: 'StdvSidebar',
    props: ['ruta', 'usuario'],

    data() {
        return {

        };
    },

    mounted() {

    },

    methods: {

    },
};
</script>

<style lang="scss" scoped>

</style>
