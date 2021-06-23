<template>
    <div  class="updateuser">
       <!-- <form @submit="updateuser"> -->
           <!-- <div v-for="user in users" :key="user.id"> -->
               <!-- <div class="flex flex-col" >
                    <input class="rounded-full bg-white ring-1 w-64 h-12 p-2 mb-2" placeholder="Nom" v-model="user.name">
                    <input class="rounded-full bg-white ring-1 w-64 h-12 p-2 mb-2" placeholder="Email" v-model="user.email">
                    <input class="rounded-full bg-white ring-1 w-64 h-12 p-2 mb-2" placeholder="password" v-model="user.password">

                </div> -->
 <form >
 <div v-for="user in users" :key="user.id">
     <div class="flex flex-wrap -mx-3 mb-6">
   <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">

    <div class="w-full px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
     Nom
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Nom"  v-model="user.name">
     
    </div>

     <div class="w-full px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
    Email
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Email"  v-model="user.email">
     
    </div>

     <div class="w-full px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
  Mot de passe
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="password" placeholder="Mot de passe"  v-model="user.Password">
     
    </div>
    <div class="w-full px-3">
         <button class="bg-gray-400 hover:bg-blue-400 text-white font-bold py-4 px-8 border border-blue-700 rounded-xl" @click="updateUser(user)"> Modifier </button>
  </div>
  </div>
  

  </div>
       
           </div>
       </form>
    </div>
</template>
<script>
import axios from 'axios'
export default {
    name: 'Updateuser',
    data() {
        return {
            selectedFile: null,
            users: [],
            user: ''
        }
    },
    created() {
        this.getusers()
    },
    methods: {
        getusers() {
            axios.get(`user/${localStorage.getItem('id')}`)
            .then((response) => {
                this.users = response.data
                console.log(this.users);
                
            })
        },
        updateUser(user) {
            axios.put(`user/${localStorage.getItem('id')}`, {
                name: user['name'],
                email: user['email'],
                password: user['password'],
            }).then(() => {
                this.$router.push({ name: 'Dashboard' })
                
            })
        }
      
    },
    mounted() {
        this.user = (localStorage.getItem('id'))
        // console.log(this.user);
        
    },
}
</script>

<style lang="scss" scoped>

</style>