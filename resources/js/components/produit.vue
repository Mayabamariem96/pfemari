<template>
    <div class="produit">
        <div class="flex flex-row justify-between mx-28">
            <!-- <input type="text" class="ring-1 rounded-xl p-2" placeholder="Recherche"> -->
            <div class="font-bold"> Produits </div>
            <button class="bg-green-500 p-2 rounded-full shadow-xl hover:shadow-sm" @click="addArticle">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
       
        <!-- <div v-show="produits">  lksjfkdsjmfsdkflsdfkdsmkjfdsqklmfjsqfjklmdskmlklmsdklfjsdlkf </div> -->
        <Article v-show="!produits"/>
        <AddArticle v-show="add"/>
    </div>
</template>

<script>
import Article from './Articles.vue'
import AddArticle from './pages/Addarticle.vue'
    export default {
        name:"produit",
        components: {
            Article,
            AddArticle
        },
        data() {
            return {
                produits: false,
                add: false
            }
        },
        methods: {
            // toAddArt() {
                
            // },
            addArticle() {
                this.$router.push({ name: 'Addarticle' })
            }
        },
        mounted() {
            localStorage.getItem('page', 'products')
        },
        computed:{
            filter(produit){
                return this
            }
        }
    };
</script>

<style lang="scss" scoped>

</style>