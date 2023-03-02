<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <PageComponent>
      <template v-slot:header>
        
   </template>

  <div class="flex justify-between items-center">
    <h1 class="text-3xl font-bold text-gray-900">Log history</h1>
        <router-link
        :to="{name: 'RegistrationCreate'}"
        class="
        py-2
        px-3
        text-white
        bg-emerald-500
        rounded-md
        hover:bg-emerald-600
        "
        
        >
        <svg
         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
         stroke-width="1.5" stroke="currentColor" class="h-4 w-4 -mt-1 inline-block">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>
  
        Add new Register
        </router-link>
  
      </div>

      <div>
      <form>   
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
            <input @keyup="searchRegister" v-model="buscador" type="search" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for register by name of patient or name of medicine"  >
            <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
      </form> 
    </div>
  
    <div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
        <div class="overflow-hidden">
          <table class="min-w-full">
            <thead class="border-b">
              <tr>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                  Id
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                    Name of patient
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                    Name of medicine
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                   Syntoms
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                   Cant medicine
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                   Date
                </th>
                
              </tr>
            </thead>
  
       <tbody>
              <tr class="border-b" v-for="dato in datos" :key="dato.id">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> {{ dato.id}}</td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                  {{ dato.name_patient}}
                </td>
                 <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                  {{ dato.name_medicine}}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                  {{ dato.syntoms}}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                  {{ dato.cant_medicine}}
                </td>
              
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                  {{ dato.created_at}}
                </td>
                
                 
                  <button
                  v-if="dato.id"
                  type="button"
                  @click="deleteRegister(dato)"
                  class="h-8
                         w-8 
                         flex
                         items-center
                         justify-center
                         rounded-full
                         border border-transparent
                         text-sm text-red-500
                         focus:ring-2 focus:ring-offset-2 focus:ring-red-500
                        
                         "
                  >
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                  </svg>

                  
  
                  </button>
                
                
              </tr>
            
            </tbody>

    
            </table>
            </div>
        </div>
        </div>
    </div>
        
    </PageComponent>
    
  
    </template>
    
    <script>
    import store from "../store";
    import {computed} from "vue";
    import PageComponent from '../components/PageComponent.vue';
    import axiosClient from '../axios';

  

    export default {
              data() {
                      return {
                      datos: {},
                      buscador: '',
                      setTimeoutBuscador:'',
                      mensajeError:null,
                      }
                  },
              mounted() {
                this.getRegistrations();
                  
              },
              methods:{
              deleteRegister(dato){
                if(confirm('Are you sure you want to delete this medicine? operation cant be undone !!')){
                    //delete medicine

                  }

                  //delete
                  return axiosClient.delete(`/registration/${dato.id}`)
                        .then((res) => {
                            return this.registrations()

                            }).catch(error => {
                              this.mensajeError = error.response.data.error;

                            })

                      
            
              },

  
              getRegistrations(){
                axiosClient.get('/registration', {
                  params: {
                          buscador: this.buscador
                  }
                }).then(response => {
                        this.datos = response.data.data;      
                    }).catch(error => {
                            console.log(error);
                        });
              },

              searchRegister(){

                clearTimeout(this.setTimeoutBuscador);
                this.setTimeoutBuscador = setTimeout(this.getRegistrations, 360);

                },

            }
      } 
  
    
  
    </script>
    