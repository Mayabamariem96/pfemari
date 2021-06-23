<template>
    <div>
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
            <div class="mb-10 carousel-item active">
                <div>
                    <div class="sl py-4 px-8 justify-center">
                        <div class=" font-mono font-bold flex justify-end text-5xl mt-56"> 
                            <div> Bienvenue  sur Ghayti</div>
                        </div>
                        

                        <p class=" font-mono font-bold flex justify-end text-center text-2xl mt-8">
                        Achetez librement En tout sécurité <br>
                            Avec un minimum d’effort
                         </p>    
                        <!-- <div class="hover:text-red-500 w-52 font-bold"> Bienvenue </div> -->
                        <router-link to="/magazin">
                        <button class="bg-red-300 w-80 text-xl font-bold p-6 rounded-xl ml-3/4 mt-8 mr-8"> Magaziner </button>
                        
                    </router-link>
                     </div>
                </div>
            </div>
            </div>
            </div>

        <p class="v17 ml-20 mb-20 mt-2">Nouvelle Arrivées</p>
        
         <div class="flex flex-wrap justify-center rounded-full mx-32">
                    <div v-for="article in produits" :key="article.id" class="mb-4">
                        <div class="w-80 mr-5">
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
                                <div @click="addProduct(article)"> <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                  </svg></div>
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
        <div class="v34-3 mt-72">
            <div class="mx-10 flex flex-row justify-between">
                <p class="v62-12 text-center w-1/3">
                    Des Cadeau et des Concours precieux pour nos clients fidèles
                </p>
                <p class="v62-12 text-center w-1/3 mt-40">
                    Des remises mansuelles considérables sur nos produits
                </p>
            </div>
        </div>e
        <div class="flex flex-row mt-48 justify-center">
            <div class="bg-gray-300 shadow-xl rounded-full mr-5 w-32 h-32"><img src="paypal.png"  alt="" class="w-15 h-15 m-10"></div>
            <div class="bg-gray-300 shadow-xl rounded-full mr-5 w-32 h-32"><img src="logo.png"  alt="" class="w-16  h-16 m-8"></div>
            <div class="bg-gray-300 shadow-xl rounded-full w-32 h-32"><img src="cash.png"  alt="" class="w-16 h-16 m-9"></div>
        </div>
        
        <footer class="mt-48">
            <div
                class="bg-black text-white text-center font-mono font-bold h-12 mt-5"
            >
                © Copyright 2021. All Right Reserved for BOUTIQUE
            </div>
        </footer>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    name: "Home",
    data() {
        return {
            produits: []
        }
    },
    methods: {
        getProduits() {
            axios.get('produitByDate')
            .then((response) => {
                this.produits = response.data.slice(0,6)
                // console.log(this.produits.slice(0,6));
                
            })
        },
        // showProduit() ]
    },
    mounted() {
        this.getProduits()
    },
};
</script>

<style lang="css" scoped>
/* * {
    box-sizing: border-box;
} */
/* body {
    font-size: 14px;
} */
.sl {
    background: url('sl1.jpg') ;
    background-size: cover;
    height: 50%;
}
.v158_0 {
    width: 100%;
    height: 816px;
    background: url("sl1.jpg");
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    opacity: 1;
    position: relative;
    top: 0px;
    left: 0px;
    overflow: hidden;
}
.v68_0 {
    width: 100%;
    height: 816px;
    background: url("../images/v68_0.png");
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    opacity: 1;
    position: relative;
    top: 0px;
    left: 0px;
    overflow: hidden;
}
.v68_2 {
    width: 677px;
    color: rgba(12, 3, 68, 1);
    position: absolute;
    top: 405px;
    left: 1064px;
    font-family: Montserrat;
    font-weight: SemiBold;
    font-size: 37px;
    opacity: 1;
    text-align: center;
}
.v68_1 {
    width: 756px;
    color: rgba(22, 4, 94, 1);
    position: absolute;
    top: 290px;
    left: 1025px;
    font-family: Montserrat;
    font-weight: Bold;
    font-size: 55px;
    opacity: 1;
    text-align: left;
}
.v69_6 {
    width: 259px;
    height: 84px;
    background: rgba(55, 206, 211, 1);
    opacity: 1;
    position: absolute;
    top: 581px;
    left: 1280px;
    border-top-left-radius: 30px;
    border-top-right-radius: 30px;
    border-bottom-left-radius: 30px;
    border-bottom-right-radius: 30px;
    overflow: hidden;
}
.v69_13 {
    width: 190px;
    color: rgba(234, 234, 234, 1);
    position: absolute;
    top: 599px;
    left: 1329px;
    font-family: Poppins;
    font-weight: Bold;
    font-size: 30px;
    opacity: 1;
    text-align: left;
}
.v17 {
    color: #333;
    font-family: Montserrat;
    font-weight: Bold;
    font-size: 45px;
    opacity: 1;
}
.v17-20 {
    background: rgba(196, 196, 196, 1);
    width: 395px;
    height: 389px;
}
.v68-4 {
    color: #333;
    font-family: Poppins;
    font-weight: Medium;
    font-size: 27px;
    opacity: 1;
}
.v34-3 {
    background: url(discount.jpg);
    background-size: cover;
    width: 100%;
    height: 347px;
}
.v62-12 {
    color: #333;
    font-family: IM FELL English SC;
    font-weight: Regular;
    font-size: 44px;
    opacity: 1;
}
.v62-13 {
    color: #333;
    font-family: IM FELL English SC;
    font-weight: Regular;
    font-size: 44px;
    opacity: 1;
}
.v62_0 {
  width: 803px;
  height: 208px;
  background: url("../images/v62_0.png");
  background-repeat: no-repeat;
  background-position: center center;
  background-size: cover;
  opacity: 1;
  position: absolute;
  top: 0px;
  left: 0px;
  overflow: hidden;
}
.v37_7 {
  width: 208px;
  height: 208px;
  background: url("../images/v37_7.png");
  background-repeat: no-repeat;
  background-position: center center;
  background-size: cover;
  opacity: 1;
  position: absolute;
  top: 0px;
  left: 305px;
  overflow: hidden;
}
.v34_9 {
  width: 208px;
  height: 208px;
  background: rgba(239,234,234,1);
  opacity: 1;
  position: absolute;
  top: 0px;
  left: 0px;
  border-radius: 50%;
  box-shadow: 4px 4px 19px rgba(0, 0, 0, 0.25);
}
.v37_0 {
  width: 179px;
  height: 110px;
  background: url("../images/v37_0.png");
  background-repeat: no-repeat;
  background-position: center center;
  background-size: cover;
  opacity: 1;
  position: absolute;
  top: 49px;
  left: 14px;
  overflow: hidden;
}
.v37_6 {
  width: 208px;
  height: 208px;
  background: url("../images/v37_6.png");
  background-repeat: no-repeat;
  background-position: center center;
  background-size: cover;
  opacity: 1;
  position: absolute;
  top: 0px;
  left: 595px;
  overflow: hidden;
}
.v37_2 {
  width: 208px;
  height: 208px;
  background: rgba(239,234,234,1);
  opacity: 1;
  position: absolute;
  top: 0px;
  left: 0px;
  border-radius: 50%;
  box-shadow: 4px 4px 19px rgba(0, 0, 0, 0.25);
}
.v37_1 {
  width: 133px;
  height: 133px;
  background: url("../images/v37_1.png");
  background-repeat: no-repeat;
  background-position: center center;
  background-size: cover;
  opacity: 1;
  position: absolute;
  top: 37px;
  left: 37px;
  overflow: hidden;
}
.v37_8 {
  width: 208px;
  height: 208px;
  background: url("../images/v37_8.png");
  background-repeat: no-repeat;
  background-position: center center;
  background-size: cover;
  opacity: 1;
  position: absolute;
  top: 0px;
  left: 0px;
  overflow: hidden;
}
.v37_3 {
  width: 208px;
  height: 208px;
  background: rgba(239,234,234,1);
  opacity: 1;
  position: absolute;
  top: 0px;
  left: 0px;
  border-radius: 50%;
  box-shadow: 4px 4px 19px rgba(0, 0, 0, 0.25);
}
.v37_5 {
  width: 129px;
  height: 129px;
  background: url("../images/v37_5.png");
  background-repeat: no-repeat;
  background-position: center center;
  background-size: cover;
  opacity: 1;
  position: absolute;
  top: 41px;
  left: 42px;
  overflow: hidden;
}

.v68_1 {
  width: 756px;
  color: rgba(22,4,94,1);
  position: absolute;
  top: 469px;
  left: 1025px;
  font-family: Montserrat;
  font-weight: Bold;
  font-size: 55px;
  opacity: 1;
  text-align: left;
} 

.v68_2 {
  width: 677px;
  color: rgba(12,3,68,1);
  position: absolute;
  top: 584px;
  left: 1064px;
  font-family: Montserrat;
  font-weight: SemiBold;
  font-size: 37px;
  opacity: 1;
  text-align: center;
}

</style>
