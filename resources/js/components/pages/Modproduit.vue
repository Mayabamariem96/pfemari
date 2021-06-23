<template>
    <div  class="modproduit">
       <!-- <form @submit="updateProduit"> -->
            <!-- <div v-for="produit in produits" :key="produit.id">
               <div class="flex flex-col" >
                    <input class="rounded-full bg-white ring-1 w-64 h-12 p-2 mb-2" placeholder="Nom" v-model="produit.nom">
                    <input class="rounded-full bg-white ring-1 w-64 h-12 p-2 mb-2" placeholder="categorie" v-model="produit.categorie">
                    <input class="rounded-full bg-white ring-1 w-64 h-12 p-2 mb-2" placeholder="prix" v-model="produit.prix">
                    <input class="rounded-full bg-white ring-1 w-64 h-12 p-2 mb-2" placeholder="quantité" v-model="produit.quantite">
                    <input class="rounded-full bg-white ring-1 w-64 h-12 p-2 mb-2" placeholder="image" v-model="produit.image">
                    <input class="rounded-full bg-white ring-1 w-64 h-12 p-2 mb-2" placeholder="description" v-model="produit.description">
                </div>
        <button class="bg-gray-600 p-2 rounded-full" @click="updateProduit(produit)"> Enregistrer </button>
            </div>  -->
       <!-- </form> -->

        
       <!-- <form  class="w-full max-w-lg"> -->
         <div class="w-full max-w-lg" v-for="produit in produits" :key="produit.id">
      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
          Nom
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="Nom" v-model="produit.nom">
        
        </div>
        <div class="w-full md:w-1/2 px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >
          Categorie
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Categorie" v-model="produit.categorie">
        </div>
      </div>

    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
          Prix
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="number" placeholder="Prix" v-model="produit.prix">
        
        </div>
        <div class="w-full md:w-1/2 px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >
          Image
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="image" placeholder="Choisir une photo" v-model="produit.image">
        </div>
      </div>
    
      
      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
          Quantite
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="number" placeholder="Quantite"  v-model="produit.quantite">
        
        </div>
      </div>
      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
          Description
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-8 px-8 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Description" v-model="produit.description">
        
        </div>
      
      </div>
      <button class="bg-blue-400 hover:bg-blue-400 text-white font-bold py-4 px-8 border border-blue-700 rounded-xl" @click="updateProduit(produit)">Modifier</button>
      
      </div>

 
<!-- </form> -->

      
    </div>
</template>
<script>
import axios from 'axios'
export default {
    name: 'Modproduit',
    data() {
        return {
            selectedFile: null,
            produits: []
        }
    },
    created() {
        this.getProduits()
    },
    methods: {
        getProduits() {
            axios.get(`produits/${localStorage.getItem('id')}`)
            .then((response) => {
                this.produits = response.data
            })
        },
        updateProduit(produit) {
            axios.put(`produit/${localStorage.getItem('id')}`, {
                nom: produit['nom'],
                categorie: produit['categorie'],
                prix: produit['prix'],
                quantite: produit['quantite'],
                image: produit['image'],
                description: produit['description'],
                commande_confirme: 'no'
            }).then(() => {
                // console.log('updated');
                this.$router.push({ name: 'Dashboard' })
                
            })
        }
        // addArt() {
        //     axios.post('produit', {
        //         nom: this.nom,
        //         categorie: this.categorie,
        //         prix:  this.prix,
        //         quantite:  this.quantite,
        //         image:  this.image,
        //         description:  this.description,
        //         reviews: 3,
        //         commande_confirme: 'no'
        //     })
        //     .then(() => {
        //         console.log('Success');
        //         localStorage.setItem('page', 'products')
        //         this.$router.push({ name: 'Dashboard' })
        //     }).catch((e) => {
        //         console.log(e);
        //     })
        // },
        // onChange(e) {
        //     // if(this.selectedFile)
        //         this.file = e.target.files[0]
                
        // },
        // formSubmit(e) {
        //     e.preventDefault();
        //     let existingObj = this;

        //     const config = {
        //         headers: {
        //             'content-type': 'multipart/form-data'
        //         }
        //     }

        //     let data = new FormData();
        //     data.append('file', this.file)
        //     data.append('nom', this.nom)
        //     data.append('categorie', this.categorie)
        //     data.append('prix', this.prix)
        //     data.append('image', this.image)
        //     data.append('description', this.description)
        //     data.append('reviews', 3)
        //     data.append('commande_confirme', 'no')

        //     axios.post('produit', this.data)
        //     .then((res) => {
        //         existingObj.success = res.data.success
        //     })
        // }
    }
}
</script>

<style lang="scss" scoped>

</style>