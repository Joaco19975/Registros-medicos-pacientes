<template>
    <PageComponent title="View or create Medicine">
        <template v-slot:header>
            <div class="flex items-center justify-between">
                <h1 class="text-3x1 font-bold text-gray-900">
                    {{ model.id ? model.name: "Create a Medicine"  }}
                </h1>
            </div>

        </template>
        <pre>{{ model }}</pre>
        <form  ref="form" @submit.prevent="saveMedicine">
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                </div>

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">
                        Name
                    </label>
                    <input type="text" name="name" id="name" v-model="name"
                    autocomplete="medicine_name" placeholder="Write the name of the medicine"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500
                    block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
                    "
                    >

                </div>

                <div>
                <label for="type" class="block text-sm font-medium text-gray-700">
                        Type
                    </label>
                    <input type="text" name="type" id="type" v-model="type"
                    autocomplete="medicine_type"  placeholder="Write the name of the type"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500
                    block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
                    "
                    >
                </div>

                <div>
                    <label for="stock" class="block text-sm font-medium text-gray-700">
                        Stock
                    </label>
                    <input type="text" name="stock" id="stock" v-model="stock"
                    autocomplete="medicine_stock"  placeholder="Write the stock of the medicine"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500
                    block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
                    "
                    >

                </div>
                <div>
                    <label for="stock" class="block text-sm font-medium text-gray-700">
                        Expire data
                    </label>
                    <input type="date" name="expiration" id="expiration" v-model="expiration"
                    autocomplete="medicine_expiration"  placeholder="Write the expiration date of the medicine"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500
                    block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
                    "
                    >

                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button
                          type="submit"
                          class="inline-flex justify-center py-2 px-4 border border-transparent
                           shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600
                           hover:bg-indigo-700
                           focus:outline-none
                           focus:ring-2
                           focus:ring-offset-2
                           focus:ring-indigo-500
                          
                          "                        
                        >
                        Save

                        </button>

                    </div>
                </div>
            </div>

        </form>

    </PageComponent>

</template>


<script>  
import store from '../store';
import {ref} from "vue";
import {routerKey, useRoute} from "vue-router";
import PageComponent from "../components/PageComponent.vue";
import axiosClient from '../axios';

const route = useRoute();

    export default {  
        mounted() {  
            console.log('Component mounted.');
            console.log((this.$route.params.id));
          
              
        },  
        data() {  
            return {  
                name: '',
                type: '',
                stock: '',
                expiration: null
             
                
            };  
        },  
        methods: {  
            saveMedicine(e) {  
                e.preventDefault();  
                let currentObj = this;  
                //guardando en la base de datos
                axiosClient.post('/medicine', {  
                    name: this.name,  
                    type: this.type,
                    stock: this.stock,
                    expiration: this.expiration  
                })  
                    .then(function (response) {  
                        //limpiando datos
                        currentObj.name = '';
                        currentObj.type = '';
                        currentObj.stock = '';
                        currentObj.expiration = null;
                        
                    })  
                    .catch(function (error) {  
                        return error;  
                    }); 
                    
           
            },
            
            
        },
      

    }  
</script>  

<style>

</style>