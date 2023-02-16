<template>
    <PageComponent title="View or create Patient">
        <template v-slot:header>
            <div class="flex items-center justify-between">
                <h1 class="text-3x1 font-bold text-gray-900">
                    {{ model.id ? model.name: "Create a Patient" }}
                </h1>
            </div>

        </template>
        <form @submit.prevent="savePatient">
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                </div>

                <div>
                    <label for="fullname" class="block text-sm font-medium text-gray-700">
                        Fullname
                    </label>
                    <input type="text" name="fullname" id="fullname" v-model="fullname"
                    autocomplete="fullname"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500
                    block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
                    "
                    >
                </div>
                <div>
                    <label for="fullname" class="block text-sm font-medium text-gray-700">
                        Sex
                    </label>
                    <input type="text" name="sex" id="sex" v-model="sex"
                    autocomplete="sex"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500
                    block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
                    "
                    >
                </div>
                <div>
                    <label for="fullname" class="block text-sm font-medium text-gray-700">
                        Dni
                    </label>
                    <input type="text" name="dni" id="dni" v-model="dni"
                    autocomplete="dni"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500
                    block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
                    "
                    >
                </div>
                <div>
                    <label for="fullname" class="block text-sm font-medium text-gray-700">
                        Birthdate
                    </label>
                    <input type="date" name="birth_date" id="birth_date" v-model="birth_date"
                    autocomplete="birth_date"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500
                    block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
                    "
                    >
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

/*

Textos completos
id	
id_hospital	
fullname	
sex	
dni	
syntoms	
birth_date	
created_at	
updated_at

*/ 
    export default {  
        mounted() {  
            console.log('Component mounted.')  
        },  
        data() {  
            return {  
              fullname: '',  
              sex: '',  
              dni: '' ,
              birth_date: ''
            };  
        },  
        methods: {  
            savePatient(e) {  
                e.preventDefault();  
                let currentObj = this;  
                axiosClient.post('/medicine', {  
                    name: this.fullname,  
                    type: this.sex,
                    stock: this.dni,
                    expiration: this.birth_date 
                })  
                .then(function (response) {  
                    return response.data, this.clear();  
                })  
                .catch(function (error) {  
                    return error;  
                });  
            }  
        },
        clear(){
            let currentObj = this;
            return [
                this.fullname = '',
                this.sex = '',
                this.dni = '',
                this.birth_date = ''
            ]

        }

    }  

</script>

<style>

</style>