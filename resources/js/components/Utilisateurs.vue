<template>
    <div class="utilisateurs">
        <h1 class="font-bold text-xl"> Utilisateurs </h1>
      

       <!-- <table class="table">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
      <th scope="col">Num Tel</th>
      <th scope="col">Type</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="user in users" :key="user.id">
      <td > {{ user.name }} </td>
      <td> {{ user.email }} </td>
      <td> 
        <router-link to="/updateuser" >
          <button class="bg-blue-500 p-2 rounded-full shadow-md hover:shadow-xl" @click="updateUser(user)">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" viewBox="0 0 20 20" fill="currentColor">
                 <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                 <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
              </svg>
            </button>
        </router-link>
         
            <button class="bg-red-500 p-2 rounded-full shadow-md hover:shadow-xl" @click="deleteUser(user.id)">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" viewBox="0 0 20 20" fill="currentColor">
                 <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
              </svg>
            </button>
      </td>
      <td>25639966</td>
      <td>client</td>
    </tr>
  </tbody>
</table> -->
<div class="flex flex-wrap mt-5 rounded-full">
    <div v-for="user in users" :key="user.id" class="mb-4 w-1/3">
                <div class="w-72 mr-2">
                    <div
                    class="grid grid-cols-3 grid-rows-7 grid-flow-row overflow-hidden rounded-lg bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out"
                >
                    <div class="col-span-3 row-span-4 p-1 m-1 flex justify-center">
                    <a href="#">
                         <img
                         src="https://picsum.photos/200/300 "
                        alt="Placeholder"
                        class="rounded-full object-cover h-20 w-20"
                        />
                    </a>
                    </div>

                    <div class="col-span-3 row-span-1">
                    <header
                        class="text-center items-center justify-between leading-tight p-2 md:p-4"
                    >
                        <h1 class="text-lg">
                        <a class="no-underline hover:underline text-black" href="#">
                            {{ user.name }}
                        </a>
                        </h1>
                        <p class="text-grey-darker text-sm"><span class="font-semibold text-blue-900 font-mono">{{ user.email }}</span></p>
                    </header>
                    </div>
                </div>
                    <div class="flex flex-row justify-around bg-white mb-1">
                        <button class="bg-green-500 p-2 rounded-full shadow-md hover:shadow-xl" @click="updateUser(user)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                            </svg>
                        </button>
        
                        <button class="bg-red-500 p-2 rounded-full shadow-md hover:shadow-xl" @click="deleteUser(user.id)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    <!-- </div> -->
                </div>
                </div>
    </div>
    </div>
    </div>
</template>

<script>
import axios from 'axios'
    export default {
        name: 'Utilisateurs',
        data(){
            return{
                users:[]
            }
        },
        methods:{
            getUsers(){
             axios.get('users').then((response)=>{
                 this.users=response.data
                //  console.log(this.users);
             })
            },
        // },

           deleteUser(id) {
                axios.delete(`user/${id}`)
                .then(() => {
                    this.users.splice(id, 1)
                    this.getUsers()
                    // console.log('deleted')
                })
            },
          updateUser(user) {
            localStorage.setItem('id', JSON.stringify(user['id']))
            this.$router.push({ path: '/updateuser' })
          }
        },
          mounted() {
              this.getUsers()
              // localStorage.setItem('page', 'users')

          },
    }
</script>

<style lang="scss" scoped>

</style>