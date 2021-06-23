<template>
    <div class="dashboard">
        <div class="mx-2 w-full dash">
            <div class="flex flex-row">
                <div class="flex flex-col">
                    <div class="mb-4 ml-2 mt-32"> 
                        <button class="shadow-xl text-white bg-cool-gray-400 w-28 h-12 rounded-2xl font-bold" @click="toOrder = true; toProduits = false; toUtilisateur = false"> Commandes </button>
                    </div>
                    <div class="mb-4 ml-2">
                        <button class="shadow-xl text-white bg-cool-gray-400 w-28 h-12 rounded-2xl font-bold" @click="toOrder = false; toProduits = true; toUtilisateur = false"> Produits </button>
                    </div>
                    <div class="mb-4 ml-2">
                        <button class="shadow-xl text-white bg-cool-gray-400 w-28 h-12 rounded-2xl font-bold" @click="toOrder = false; toProduits = false; toUtilisateur = true"> Utilisateurs </button>
                    </div>
                </div>
                <div class=" w-full h-96 ml-4 rounded-lg p-2">
                    <Orders v-show="toOrder"/>
                    <Produits v-show="toProduits"/>
                    <Utilisateurs v-show="toUtilisateur"/>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Orders from './Orders.vue'
import Utilisateurs from './Utilisateurs.vue'
import Produits from './produit.vue'
export default {
    name: "Dashbord",
    components: {
        Orders,
        Utilisateurs,
        Produits
    },
    data() {
        return {
            toOrder: false,
            toProduits: false,
            toUtilisateur: false,
            toProduits: false,
            orders: 'orders',
            products: 'products',
            page: null
        }
    },
    methods: {
    },
    mounted() {
        this.page = localStorage.getItem('page')
        if(this.page == 'products')
            this.toProduits = true
        else
            this.orders = true
    //   this.toOrder = true
        // this.getPage()
    
    },
}
</script>

<style scoped>
.dash {
    height: 100%;
}
</style>