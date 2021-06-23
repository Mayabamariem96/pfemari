/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;
import VueRouter from "vue-router";
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

import Vuex from 'vuex';
Vue.use(Vuex);

Vue.use(VueRouter)
Vue.component('home', require('./components/home.vue').default);
// Vue.component('orders', require('./components/Orders.vue'));

import Swal from 'sweetalert2';

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});

window.Swal = Swal;
window.Toast = Toast;


import Accueil from "./components/Accueil.vue";
import Magazin from './components/Magazin.vue';
import parfum from './components/parfum.vue';
import vetements from'./components/vetements.vue';
import Dashboard from'./components/Dashboard.vue';
import Orders from'./components/Orders.vue';
import Cart from './components/Cart.vue';
import Addarticle from'./components/pages/Addarticle.vue';
import Modproduit from'./components/pages/Modproduit.vue';
import UpdateUser from'./components/pages/Updateuser.vue';
import Utilisateurs from'./components/Utilisateurs.vue';
import Details from'./components/pages/Details.vue';


// import Cart from'./components/Cart.vue';
// import produit from'./components/produit.vue';


const routes =  [
    {
        path: '/', component: Accueil, name: 'Accueil'
    },
    {
        path: '/parfum', component: parfum, name: 'parfum'
    },

    {
        path: '/vetements', component: vetements, name: 'vetements'
    },
    {
        path: '/magazin', component: Magazin, name: 'Magazin'
    },
    {
        path: '/dash', component: Dashboard, name: 'Dashboard'
    },
    {
        path: '/orders', component: Orders, name: 'Orders'
    },
    {
        path: '/utilisateurs', component: Utilisateurs, name: 'Utilisateurs'
    },
    // {
    //     path: '/produit', component: produit, name: 'produit'
    // },
    {
        path: '/addarticle', component: Addarticle, name: 'Addarticle'
    },
    {
        path: '/modproduit', component: Modproduit, name: 'Modproduit'
    },
    {
        path: '/updateuser', component: UpdateUser, name: 'UpdateUser'
    },
    {
        path: '/details', component: Details, name: 'Details'
    },
    {
        path: '/cart', component: Cart, name: 'Cart'
    },
    // {
    //     path: '/cart', component: Cart, name: 'Cart'
    // },
]


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const router = new VueRouter({
    routes
})

const store = new Vuex.Store({
    state: {
        cart: {
            nom_client:null,
            adresse:null,
            phone:null,
            produits:[]
        },
    },

    mutations: {
        setProducts(state, products) {
            state.products = products;
        },

        addProductToCart(state, product) {
            state.cart.produits.push({
                id: product.id,
                nom: product.nom,
                prix: product.prix,
                path: product.path,
                quantite: product.quantite,
                description: product.description
            });
        },

        removeProductToCart(state, index) {
            state.cart.produits.splice(index, 1);
            Fire.$emit('Modified');
            Toast.fire({
                icon: 'success',
                title: 'Produit spprimer de la panier'
            });
        },
        setNom(state, nom_client){
            state.cart.nom_client = nom_client
            Fire.$emit('Modified');
        },
        setAdresse(state, adresse){
            state.cart.adresse = adresse
            Fire.$emit('Modified');
        },
        setPhone(state, phone){
            state.cart.phone = phone
            Fire.$emit('Modified');
        },
        Posting(state) {
            axios.post('api/panier', state.cart)
            .then(() => {
                Toast.fire({
                    icon: 'success',
                    title: 'Commande lancer avec succes'
                });
            }).catch((e) => {
                console.log(e);
            })
        }
    },

    actions: {
        ValidateCart() {
            axios.post('api/panier', this.$store.state.cart)
            .then(() => {
                console.log('Success');
            }).catch((e) => {
                console.log(e);
            })
        },
    },

});

window.Fire = new Vue() 

const app = new Vue({
    el: '#app',
    router,
    store,
});
