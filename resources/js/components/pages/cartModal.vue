<template>
  <div v-show="show" class="min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none"  style="background: rgba(0,0,0,.2);" id="modal-id">
    <div class="w-full  max-w-lg p-5 relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
      <!--content-->
      <div class="">
        <!--body-->
        <div class="text-center flex-auto justify-center">
            <h2 class="text-xl font-bold py-4 ">Voulez vous ajouter a panier</h2>
                <p class="text-sm text-gray-500 px-8">Saisir le Quantité que vous voulez de cette produit s'il vous plait</p>
            <div class="mt-1">
              <div class="form">
                <div class="md:space-y-2 mb-3">
                  <div class="flex items-center py-6">
                    <div class="w-12 h-12 mr-4 flex-none rounded-xl border overflow-hidden">
                      <img class="w-12 h-12 mr-4 object-cover" :src="`../storage/app/public/${product.path}`">
                      </div>
                      <label class="cursor-pointer h5">{{product.nom}}</label>
                    </div>
                  </div>
                  <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                    <div class="mb-3 space-y-2 w-full text-xs">
                      <label class="font-semibold text-gray-600 py-2">Quantité<abbr title="required">*</abbr></label>
                      <input v-model="product.quantite" placeholder="Quantité produit" :max="product.qty_disponible" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" required="required" type="number" name="integration[shop_name]" id="integration_shop_name">
                      <p class="text-red text-xs hidden">Please fill out this field.</p>
                    </div>
                  </div>
              </div>
              <!--footer-->
              <div class="p-3  mt-2 text-center space-x-4 md:block">
                  <button @click="show=false" class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100">
                      Cancel
                  </button>
                  <button @click="addProductToCart()" class="mb-2 md:mb-0 bg-blue-500 border border-blue-500 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-blue-600">Ajouter</button>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    name: "CartModal",
      data(){
        return {
          product:{
            id:null,
            nom:null,
            prix:null,
            path:null,
            quantite:1,
            qty_disponible:null,
            description:null,
          },
          show:true
        }
      },
      methods: {
        initProduct(product){
          this.product.id=product.id
          this.product.nom=product.nom
          this.product.prix=product.prix
          this.product.path=product.path
          this.product.qty_disponible=product.quantite
          this.product.description=product.description
        },
        addProductToCart() {
          this.$store.commit('addProductToCart', this.product);
          this.show=false
          Toast.fire({
              icon: 'success',
              title: 'Produit ajouter au panier'
          });
        }
      }
}
</script>

<style>

</style>