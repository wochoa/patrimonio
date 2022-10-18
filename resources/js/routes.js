import Vue from 'vue';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import Router from 'vue-router';

Vue.use(Router);
// Import Bootstrap and BootstrapVue CSS files (order is important)
// import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

// Make BootstrapVue available throughout your project
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)


import Inicio  from './components/dashboard/index.vue';
// tramites
import Listado  from './components/modulos/patrimonio/Listado'// por defecto se va mostrar en proceso
import Nuevobien  from './components/modulos/patrimonio/Nuevobien.vue'// nuevo tramite
import Movimientobien  from './components/modulos/patrimonio/Listadomovimiento.vue'// documentos por recepcionar
import Asignacionuso from './components/modulos/patrimonio/asignacionuso.vue'//


// Administracion
import Categoria  from './components/modulos/administracion/categoria/index'// listar
import Marca  from './components/modulos/administracion/marca/index'// listar
import Modelo  from './components/modulos/administracion/modelo/index'// listar
import Serie  from './components/modulos/administracion/serie/index'// listar
import Color  from './components/modulos/administracion/color/index'// listar
import Estado  from './components/modulos/administracion/estado/index'// listar

// usuarios
import Usuarios  from './components/modulos/administracion/usuarios/index'// documentos por recepcionar
import Editar  from './components/modulos/administracion/usuarios/editar'// documentos por recepcionar

export default new Router({
    mode: 'history',
    routes:[
        // {    
        //     path:'/login',
        //     name:'login',
        //     component:Login 
        // },
        {   path:'/main',
            name:'dashboard',
            component:Inicio 
        },
        {    
            path:'/Patrimonio/listado',
            name:'listadobienes',
            component:Listado,
            meta: {
                pageTitle: 'Listado de bienes',
                breadcrumb: [
                  {
                    text: 'Listado de bienes',
                    active: true,
                  },
                ],
              }, 
        },
        {   
            path:'/Patrimonio/listado/agregar',
            name:'nuevobien',
            component:Nuevobien,
            meta: {
                pageTitle: 'Añadir Patrimonio',
                breadcrumb: [
                  {
                    text: 'Agregar bien',
                    active: true,
                  },
                ],
              },
        },
        {   
            path:'/Patrimonio/movimientobienes',
            name:'mvoimientodebien',
            component:Movimientobien,
            meta: {
                pageTitle: 'Movimiento de bienes',
                breadcrumb: [
                  {
                    text: 'Movimiento de bienes',
                    active: true,
                  },
                ],
              }, 
        },
        {   
          path:'/Patrimonio/asignacionuso',
          name:'asignacionuso',
          component:Asignacionuso,
          meta: {
              pageTitle: 'Asignación en uso del bien',
              breadcrumb: [
                {
                  text: 'Asignación en uso',
                  active: true,
                },
              ],
            }, 
      },
        
        // administracion
        // categoria
        {   
          path:'/Administracion/tipo',
          name:'gestiontipo',
          component:Categoria,
          meta: {
              pageTitle: 'Administración de categoria del bien',
              breadcrumb: [
                {
                  text: 'Administración de categorias',
                  active: true,
                },
              ],
            }, 
      },
        // marca 
        {   
            path:'/Administracion/marca',
            name:'gestionmarca',
            component:Marca,
            meta: {
                pageTitle: 'Administración de marcas',
                breadcrumb: [
                  {
                    text: 'Administración de marcas',
                    active: true,
                  },
                ],
              }, 
        },
        // Modelo 
        {   
            path:'/Administracion/modelo',
            name:'gestionmodelo',
            component:Modelo,
            meta: {
                pageTitle: 'Administración de modelos',
                breadcrumb: [
                  {
                    text: 'Administración de modelos',
                    active: true,
                  },
                ],
              },
        },
        // serie 
        {   
          path:'/Administracion/serie',
          name:'gestionserie',
          component:Serie,
          meta: {
              pageTitle: 'Administración de series',
              breadcrumb: [
                {
                  text: 'Administración de series',
                  active: true,
                },
              ],
            },
        },
        // serie 
        {   
          path:'/Administracion/color',
          name:'gestioncolor',
          component:Color,
          meta: {
              pageTitle: 'Administración de colores',
              breadcrumb: [
                {
                  text: 'Administración de colores',
                  active: true,
                },
              ],
            },
        },
        // estado 
        {   
          path:'/Administracion/estado',
          name:'gestionestador',
          component:Estado,
          meta: {
              pageTitle: 'Administración de estado del bien',
              breadcrumb: [
                {
                  text: 'Administración de estado',
                  active: true,
                },
              ],
            },
        },
        // usuarios
        {   
            path:'/Administracion/usuarios',
            name:'Gestión de usuarios',
            component:Usuarios 
        },
        {   
            path:'/Administracion/usuarios/edit/:id',
            name:'Editar usuario',
            component:Editar,
            props:true
        },


    ],
    linkActiveClass:'active'
})