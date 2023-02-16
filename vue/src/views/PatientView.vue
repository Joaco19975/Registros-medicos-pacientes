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
                    autocomplete="fullname" placeholder="patient's fullname"
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
                    autocomplete="sex" placeholder="patient's sex"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500
                    block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
                    "
                    >
                </div>
                <div>
                    <label for="dni" class="block text-sm font-medium text-gray-700">
                        Dni
                    </label>
                    <input type="text" name="dni" id="dni" v-model="dni"
                    autocomplete="dni" placeholder="patient's dni"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500
                    block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
                    "
                    >
                </div>
                <div>
                    <label for="birth_date" class="block text-sm font-medium text-gray-700">
                        Birthdate
                    </label>
                    <input type="date" name="birth_date" id="birth_date" v-model="birth_date"
                    autocomplete="birth_date" placeholder="patient's date of birth"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500
                    block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
                    "
                    >
                </div>
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

        </form>

    </PageComponent>

</template>

<script>
import store from '../store';
import {ref} from "vue";
import {routerKey, useRoute} from "vue-router";
import PageComponent from "../components/PageComponent.vue";
import axiosClient from '../axios';

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
                axiosClient.post('/patient', {  
                    fullname: this.fullname,  
                    sex: this.sex,
                    dni: this.dni,
                    birth_date: this.birth_date 
                })  
                .then(function (response) {  
                    return response.data;  
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