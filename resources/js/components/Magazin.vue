<template>
    <div class="magazin">
        <!-- <div class="v80-14 flex flex-row justify-center justify-evenly"> <p class="v80-15 text-center">Les articles</p> <input type="text" name="recherche" id="recherche" placeholder="Recherche ..." class="p-2 ring-4 my-4 w-40 h-8 rounded-full shadow-xl"> </div> -->
        <div class="flex flex-row justify-between mx-4"> 

          <p class="v80-15 text-center font-mono font-bold">Magazin</p>
          
           <div class="flex flex-row justify-between mx-2">
          <input type="text" name="recherche"  class="p-2 ring-4 my-4 w-40 h-8 rounded-full shadow-xl" placeholder="Recherche ..." v-model="search">
           </div>
        </div>
        <div class="flex flex-row mt-5 ">
              <div class="flex flex-col">
                <div   @click="perfumeGoTo('tout')" class="cursor-pointer font-mono font-bold ml-16 mb-4 text-2xl"> Tout</div>
                
                <div class="flex flex-row mb-4 mx-112">

                  <div class=" flex flex-col">

                       <div @click="perfumeGoTo('parfume')" class="cursor-pointer bg-pink-100 shadow-xl rounded-full mx-20  mr-5 w-20 h-20"><img src="perfume.png" alt="" class="p-4"> </div>
                 <div class="text-center ml-8">Parfume</div>
                  </div>
                 
                     <div class=" flex flex-col">
                      <div   @click="perfumeGoTo('soin')" class="cursor-pointer bg-pink-100 shadow-xl rounded-full mr-5 w-20 h-20"><img src="cream.png" alt="" class="p-4"> </div>
                   <div class=" ml-4">Soin</div>
                  </div>
                </div>  
                <div class="flex flex-row mx-112">
                   <div class=" flex flex-col">
                    <div @click="perfumeGoTo('maquillage')" class="cursor-pointer bg-pink-100 hover:shadow-3xl shadow-xl rounded-full mx-20  mr-5 w-20 h-20"> <img src="make.png" alt="" class="p-2"></div>
                   <div class="text-center ml-8">Maquillage</div>
                  </div>
                  
                   <div class=" flex flex-col">
                      <div  @click="perfumeGoTo('vetement')" class="cursor-pointer bg-pink-100 shadow-xl rounded-full mr-5 w-20 h-20"> <img src="vetem.png" alt="" class="p-2"> </div>
                       <div class=" ml-2">Vetement</div>
                   </div>  
                </div>  
              </div>
              

                  <div class="flex flex-wrap rounded-full" v-if="!categories.length">
                    <div v-for="article in filterProduit" :key="article.id" class="mb-4">
                        <div class="w-80 mr-2">
                            <div
                            class="grid grid-cols-3 grid-rows-7 grid-flow-row overflow-hidden rounded-lg bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out"
                        >
                            <div class="col-span-3 row-span-4 p-1 m-1">
                            <a href="#">
                                <img
                                @click="showFile(article)"
                                :src="`../storage/app/public/${article.path}`"
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
                                    {{ article.nom }}
                                </a>
                                </h1>
                                <p class="text-grey-darker text-sm"><span class="font-semibold text-blue-900 font-mono">{{ article.prix }}</span> <span class="font-bold font-mono"> MRU </span></p>
                            </header>
                            <div class="flex flex-row justify-evenly">
                                <a @click="addToCart(article)" href="#">
                                  <div> <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                  </div>
                                </a>
                                <div v-show="fav = !fav">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                  </svg>
                                </div>
                                <div v-show="fav = false">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                                  </svg>
                                </div>

                            </div>
                            </div>
                        </div>
                        </div>
                        </div>
                </div>
                  
                <div class="flex flex-wrap rounded-full" v-else>
                    <div v-for="article in filterCategories" :key="article.id" class="mb-4">
                        <div class="w-72 mr-2">
                            <div
                            class="grid grid-cols-3 grid-rows-7 grid-flow-row overflow-hidden rounded-lg bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out"
                        >
                            <div class="col-span-3 row-span-4 p-1 m-1">
                            <a href="#">
                                <img
                                @click="showFile(article)"
                                :src="`../storage/app/public/${article.path}`"
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
                                    {{ article.nom }}
                                </a>
                                </h1>
                                <p class="text-grey-darker text-sm"><span class="font-semibold text-blue-900 font-mono">{{ article.prix }}</span> <span class="font-bold font-mono"> MRU </span></p>
                            </header>
                            <div class="flex flex-row justify-evenly">
                               <a @click="addToCart(article)" href="#">
                                  <div> <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                  </div>
                                </a>
                                <div v-show="fav = !fav">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                  </svg>
                                </div>
                                <div v-show="fav = false">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                                  </svg>
                                </div>

                            </div>
                            </div>
                        </div>
                        </div>
                        </div>
                </div>

              
               </div>
                 <CartModal v-show="showModal" ref="CartModal"></CartModal>
    </div>
</template>

<script>
import axios from 'axios'
import CartModal from './pages/cartModal.vue'
export default {
    name: "Magazin",
     components: {
        CartModal,
    },
    data() {
      return {
        articles: [],
        categories: [],
        products: [],
         search: '',
         fav: false,
          showModal:false

      }
    },
    methods: {
      getArticles() {
        axios.get('produits')
        .then((response) => {
          this.articles = response.data
        })
      },
      perfumeGoTo(data) {
        axios.get(`produit/${data}`)
        .then((response) => {
          this.categories = response.data
        })
      },
      showFile(img) {
        // return `../storage/${img['path']}`
        window.open(`../storage/app/public/${img['path']}`)
      },
       addToCart(product) {
        this.$refs.CartModal.initProduct(product);
        this.$refs.CartModal.show=true;
        this.showModal=true;
      },
      
      // addProduct(article) {
      //   localStorage.setItem(`${article['nom']}`, JSON.stringify(article))
      //   localStorage.setItem('product' , JSON.stringify(this.products))
      //   // let tt = this.products.push(article['nom'])
      //   localStorage.setItem('product', JSON.stringify(article['nom']))
      // }
    },
    mounted() {
      this.getArticles()
    },


    computed: {
        filterProduit() {
            return this.articles.filter(article => {
                return article.nom.toLowerCase().includes(this.search)
            })
        },
        filterCategories() {
            return this.categories.filter(categorie => {
                return categorie.nom.toLowerCase().includes(this.search)
            })
        },
      },
};
</script>

<style lang="scss" scoped>
.v80-3 {
    background: rgba(255, 232, 219, 1);
    width: 100%;
    height: 196px;
}
.v80-8 {
    color: #333;
    font-family: Poppins;
    font-weight: Medium;
    font-size: 27px;
    opacity: 1;
}
.v80-6 {
    color: #333;
    font-family: Poppins;
    font-weight: Medium;
    font-size: 27px;
    opacity: 1;
}
.v80-14 {
    background: rgba(253, 245, 241, 1);
    width: 100%;
    height: 80px;
}
.v10 {
  background: #fff9f9;
  width: 178px;
  height: 178px;
  opacity: 1;
  border-radius: 50%;
}

.v80-15 {
  color: #333;
  font-family: Montserrat;
  font-weight: Bold;
  font-size: 44px;
  opacity: 1;
}
 .line {
  font-size: 14px;
  
}
.v10 {
  background: #0c0c0c;
  width: 21px;
  height: 20px;
  opacity: 1;
  border-radius: 50%;
}
.v10 {
  background: #0c0c0c;
  width: 21px;
  height: 20px;
  opacity: 1;
  border-radius: 50%;
}




</style>
