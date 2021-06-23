<template>
  <div class="container mx-auto">

    <!-- component -->
    <!-- This is an example component -->
    <div class="min-h-screen flex items-center justify-center px-4">
        
        <div class="max-w-4xl  bg-white w-full rounded-lg shadow-xl">
            <div class="p-4 border-b">
                <h2 class="text-2xl ">
                    Client Informations
                </h2>
                <p class="text-sm text-gray-500">
                    Détails Personnel de la commande. 
                </p>
            </div>
            <div>
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                    <p class="text-gray-600 h6">
                        Nom Complet
                    </p>
                    <div class="flex flex-col mt-2">
                      <label for="nom" class="hidden">Nom Complet</label>
                      <input v-model="nom_client" @change="saisieNom" type="text" id="nom" placeholder="Nom Complet" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 font-semibold focus:border-indigo-500 focus:outline-none">
                    </div>
                </div>
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                    <p class="text-gray-600 h6">
                        Adresse du Client
                    </p>
                    <div class="flex flex-col mt-2">
                      <label for="adresse" class="hidden">Number</label>
                      <input v-model="adresse" @change="saisieAdresse" type="adresse" id="adresse" placeholder="Adresse Client" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 font-semibold focus:border-indigo-500 focus:outline-none">
                    </div>
                </div>
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                    <p class="text-gray-600 h6">
                        Phone number
                    </p>
                    <div class="flex flex-col mt-2">
                      <label for="tel" class="hidden">Number</label>
                      <input v-model="phone" @change="saisiePhone" type="tel" name="tel" id="tel" placeholder="Telephone Number" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 font-semibold focus:border-indigo-500 focus:outline-none">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex shadow-md">
      <div class="w-3/4 bg-white px-10 py-10">
        <div class="flex justify-between border-b pb-8">
          <h1 class="font-semibold text-2xl">Panier</h1>
          <h2 class="font-semibold text-2xl">{{count}} produits dans votre panier</h2>
        </div>
        <div class="flex mt-10 mb-5">
          <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Détails du produit</h3>
          <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Quantité</h3>
          <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Prix</h3>
          <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Total</h3>
        </div>
        <div v-for="(product, index) in this.$store.state.cart.produits" :key="index" class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
          <div class="flex w-2/5">
            <div class="w-20">
              <img class="h-24" :src="`../storage/app/public/${product.path}`" alt="">
            </div>
            <div class="flex flex-col justify-between ml-4 flex-grow">
              <span class="font-bold text-sm">{{ product.nom }}</span>
              <span class="text-gray-500 text-xs">{{ product.description }}</span>
              <a href="#" @click="$store.commit('removeProductToCart', index)" class="font-semibold hover:text-red-500 text-gray-500 text-xs">Supprimer du panier</a>
            </div>
          </div>
          <div class="flex justify-center w-1/5">

            <span class="mx-2 border text-center w-8" v-text="product.quantite"></span>

          </div>
          <span class="text-center w-1/5 font-semibold text-sm">{{ product.prix }} MRU</span>
          <span class="text-center w-1/5 font-semibold text-sm">{{ (product.prix * product.quantite) }} MRU</span>
        </div>


        <!-- <router-link :to="{name: 'products.index'}" class="flex font-semibold text-indigo-600 text-sm mt-10"><svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512"><path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"/></svg>
          Revenir faire les courses</router-link> -->
      </div>

      <div id="summary" class="w-1/4 px-8 py-10">
        <h1 class="font-semibold text-2xl border-b pb-8">Informations</h1>
        <div class="border-t mt-8">
          <div class="flex font-semibold justify-between py-6 text-sm uppercase">
            <span>Prix total</span>
            <span>{{ montant}} MRU</span>
          </div>
          <button @click="$store.commit('Posting')" class="bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full">Passer à la caisse</button>
        </div>
      </div>
    </div>


  </div>
</template>

<script>
    export default {
        name: "Cart",
        data(){
            return {
              show:true,
              nom_client:'',
              adresse:'',
              phone:'',
              count:0,
              montant:0
            }
        },
        methods: {
            CartCount() {
                this.count = this.$store.state.cart.produits.length;
            },
            totalPrice() {
                this.montant = this.$store.state.cart.produits.reduce((acc, current) => acc + current.prix * current.quantite, 0);
            },
            saisieNom() {
              this.$store.commit('setNom', this.nom_client);
            },
            saisieAdresse() {
              this.$store.commit('setAdresse', this.adresse);
            },
            saisiePhone() {
              this.$store.commit('setPhone', this.phone);
            },
            getClientInfo(){
              this.nom_client = this.$store.state.cart.nom_client
              this.adresse = this.$store.state.cart.adresse
              this.phone = this.$store.state.cart.phone
            },
            PostCart() {
              Fire.$emit('PostCart');
            }
        },
        mounted() {
          this.CartCount()
          this.getClientInfo()
          this.totalPrice()
          Fire.$on('Modified', () => {
              this.totalPrice();
              this.getClientInfo()
          });
        },
    }
</script>

<style lang="scss" scoped>

</style>