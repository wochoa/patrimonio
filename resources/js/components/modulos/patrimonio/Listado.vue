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
                <div class="col-lg-6 col-12">
                    <!-- button group radio -->

                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <!-- <button type="button" class="btn btn-outline-primary btn-sm ">
                            Listado de bienes</button> -->
                        <router-link to="/Patrimonio/listado/agregar" class="btn btn-primary btn-sm"><i class="fa-regular fa-file"></i>
                            Agregar nuevo bien</router-link>

                    </div>
                </div>

            </div>

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
                                        <input type="number" ref="focusMe" class="form-control form-control-sm">
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
                                        <tr v-for="bn in databien">
                                            <td><small>
                                                    <strong>COD.PATRIMONIAL:</strong>{{bn.cod_pat}}<br>
                                                    <strong>COD.ANTERIOR:</strong>{{bn.cod_anterior}}
                                                </small>
                                            </td>
                                            <td><small>{{bn.nom_bien}}</small></td>
                                            <td><small>
                                                    <strong>MARCA:</strong>{{bn.des_marca}}<br>
                                                    <strong>MODELO:</strong>{{bn.des_modelo}}<br>
                                                    <strong>SERIE:</strong>{{bn.des_serie}}<br>
                                                    <strong>COLOR:</strong>{{bn.des_color}}<br>
                                                    <strong>PLACA:</strong>{{bn.placa}}
                                                </small>
                                            </td>
                                            <td><small>
                                                    <strong>TIPO:</strong>{{bn.des_tipo}}<br>
                                                    <strong>DIMENCION:</strong>{{bn.dimension}}<br>
                                                    <strong>ESTADO:</strong>{{bn.des_estado}}
                                                </small>
                                            </td>

                                            <td><small>
                                                    <strong>DOC.COMPRA:</strong>{{bn.doc_compra}}<br>
                                                    <strong>MONTO:</strong>{{bn.monto_compra}}
                                                </small>
                                            </td>
                                            <td>{{bn.observacion}}</td>

                                            <td>{{bn.created_at}}</td>
                                            <td>
                                                <button class="btn btn-warning btn-sm" @click.prevent="verqr(bn.idbien,bn.cod_pat)">
                                                    <i class="fa-solid fa-qrcode"></i></button>
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa-regular fa-pen-to-square"></i></button>
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

    <!-- modal  -->
    <!-- Modal -->
    <div class="modal fade" id="mdqr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div id="vermodalqr" class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <!-- <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> -->
                <div class="modal-body pt-1 pb-0">
                    <table class="table table-bordered table-sm p-0">
                        <tr>
                            <td>
                                <!-- <iframe :src="imagenbien" frameborder="0" width="120" height="120"></iframe> -->
                                <img :src="imagenbien" alt="" width="120" height="120">
                            </td>
                            <td valign="top">
                                <img :src="ruta+'/dist/img/logo2.png'" class="img-fluid" alt="">
                                <p class="border-top">Bien registrado con:
                                    <b>Cod.Patrimonial:</b> {{codp}}</p>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer p-0">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" @click.prevent="print">Imprimir</button>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import axios from 'axios';
window.$ = window.jQuery = require('jquery')

export default {
    name: '',
    data() {
        return {
            databien: {},
            nombrecolor: '',
            codigocolor: '',
            imagenbien: '',
            codp: ''
        }
    },
    props: ['ruta'],
    components: {

    },
    created() {
        this.listabien();
    },
    mounted() {
        this.$refs.focusMe.focus();
    },
    methods: {
        listabien() {
            var url = '/api/listabien';
            axios.get(url)
                .then(response => {
                    console.log(response);
                    this.databien = response.data.datbien;
                });
        },
        agregarcolor() {
            var url = '/api/agregacolores'

            axios.post(url, {
                'nombrecolor': this.nombrecolor,
                'codigocolor': this.codigocolor
            }).then(response => {
                console.log(response);
                this.listadodecolor();
                this.nombrecolor = '';
                this.$refs.focusMe.focus();
            });
        },
        verqr(id, codp) {
            //alert(id)
            //var qr = document.querySelector('#configFirma')
            // $('#mdqr').modal('show');
            // $('#mdqr').modal('hide'); 
            $('#mdqr').data('bs.modal', null);
            $('#mdqr').modal({
                backdrop: 'static',
                keyboard: false
            })

            var url = this.ruta + '/api/qrcode/' + id
            this.codp = codp
            axios.get(url)
                 .then(response=>{
                    this.imagenbien=response.data
                 })
            //alert(url);
        },
        print() {
            
            const modal = document.getElementById("mdqr")
            const cloned = modal.cloneNode(true)
            let section = document.getElementById("print")

            if (!section) {
                section = document.createElement("div")
                section.id = "print"
                document.body.appendChild(section)
            }

            section.innerHTML = "";
            section.appendChild(cloned);
            window.print();

            
        }
    }
}
</script>

<style lang="css" scoped>
.digitacion {
    text-transform: uppercase;
}

@media screen {
  #print {
    display: none;
   }
}

@media print {
 body * {
  visibility:hidden;
  }
  #print, #print * {
    visibility:visible;
  }
  #print {
    position:absolute;
    left:0;
    top:0;
  }
}
</style>
