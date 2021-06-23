<template>
    <div class="articles">
        <div class="flex flex-row justify-between mx-2">
            <input type="text" class="ring-1 rounded-xl p-2" placeholder="Recherche" v-model="search">
            <!-- <div class="font-bold"> Produits </div>
            <button class="shadow-xl text-white bg-blue-500 p-2 rounded-2xl font-bold" @click="addArticle"> Ajouter </button> -->
        </div>
        <div class="flex flex-wrap mt-5 rounded-full">
            <div v-for="produit in produits" :key="produit.id" class="mb-4 w-1/3">
                <div class="w-72 mr-2">
                    <div
                    class="grid grid-cols-3 grid-rows-7 grid-flow-row overflow-hidden rounded-lg bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out"
                >
                    <div class="col-span-3 row-span-4 p-1 m-1">
                    <a href="#">
                         <img
                        @click="showFile(produit)"
                        :src="`../storage/app/public/${produit.path}`"
                        alt="Placeholder"
                        class="rounded-xl object-cover h-48 w-full"
                        />
                    </a>
                    </div>

                    <div class="col-span-3 row-span-1">
                    <header
                        class="flex items-center justify-between leading-tight p-2 md:p-4"
                    >
                        <h1 class="text-lg">
                        <a class="no-underline hover:underline text-black" href="#">
                            {{ produit.nom }}
                        </a>
                        </h1>
                        <p class="text-grey-darker text-sm"><span class="font-semibold text-blue-900 font-mono">{{ produit.prix }}</span> <span class="font-bold font-mono"> MRU </span></p>
                    </header>
                    </div>
                </div>
                    <div class="flex flex-row justify-around bg-white mb-1">
                        <button class="bg-green-500 p-2 rounded-full shadow-md hover:shadow-xl" @click="detailProduit(produit)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <button class="bg-blue-500 p-2 rounded-full shadow-md hover:shadow-xl" @click="updateProduit(produit)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <button class="bg-red-500 p-2 rounded-full shadow-md hover:shadow-xl" @click="deleteArt(produit.id)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
                </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import AddArticle from './pages/Addarticle.vue'
    export default {
        name: 'Articles',
        components: {
            AddArticle
        },
        data() {
            return {
                add: false,
                produits: [],
                search: ''
            }
        },
        methods: {
            getArt() {
                axios.get('produits')
                .then((response) => {
                    this.produits = response.data
                })
            },
            detailProduit(produit) {
                localStorage.setItem('id', produit['id'])
                this.$router.push({ name: 'Details' })
            },
            deleteArt(id) {
                axios.delete(`produit/${id}`)
                .then(() => {
                    this.produits.splice(id, 1)
                    this.getArt()
                    // console.log('deleted')
                })
            },
            updateProduit(produit) {
                localStorage.setItem('id', produit['id'])
                this.$router.push({ name: 'Modproduit' })
            },
            showFile(img) {
                // return `../storage/${img['path']}`
                window.open(`../storage/app/public/${img['path']}`)
            }
        },
        computed: {
            filterProduit() {
               return this.produits.filter(produit => {
                    return produit.nom.includes(this.search)
                })
            }
        },
        mounted() {
            this.getArt()
        },
    }
</script>

<style lang="scss" scoped>

</style>