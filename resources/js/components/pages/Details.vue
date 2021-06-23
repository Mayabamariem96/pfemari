<template>
    <div class="details">

        <div  class="flex flex-row  justify-center">
        <div class="w-1/2 h-auto  mx-5 flex flex-col" v-for="produit in produits" :key="produit.id">
                <div class="grid grid-cols-3 grid-rows-7 grid-flow-row overflow-hidden rounded-lg bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out">
                <div class="col-span-3 row-span-4 p-1 m-1">
                <a href="#">
                    <img
                    :src="`../storage/app/public/${produit.path}`"
                    alt="Placeholder"
                    class=" h-96 rounded-xl object-cover h-48 w-full"
                    />
                </a>
                </div>

                <div class="col-span-3 row-span-1">
                <header
                    class="flex items-center justify-between leading-tight p-2 md:p-4"
                >
                
                    <h1 class="text-lg">
                    <a class="no-underline hover:underline text-black font-bold " href="#">
                    Nom: {{ produit.nom }}
                    </a>
                    <div></div>
                    <p><span  class="font-semibold text-black font-mono">Catagorie: {{ produit.categorie }} </span></p>
                
                    <p ><span class="font-semibold text-blue-900 font-mono">Prix: {{ produit.prix }}</span> <span class="font-bold font-mono"> MRU </span></p>
                     <div></div>
                    <p><span  class="font-semibold text-black font-mono">Quantite: {{ produit.quantite }}</span> </p>

                    <p ><span  class="font-semibold text-black font-mono">Description: {{ produit.description }}</span> </p>
                    </h1>

                    
                   
                </header>
                </div>
               
            </div>
        </div>
      </div>
    </div>
</template>

<script>
    export default {
        name: 'Details',
        data() {
            return {
                produits: []
            }
        },
        created() {
            this.getProduits()
        },
        methods: {
            getProduits(produit) {
                axios.get(`produits/${localStorage.getItem('id')}`)
                .then((response) => {
                    this.produits = response.data
                    console.log(this.produits);
                    
                })
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>