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
                    <input type="text" name="fullname" id="fullname" v-model="model.fullname"
                    autocomplete="medicine_name"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500
                    block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
                    "
                    >
                </div>
            </div>

        </form>

    </PageComponent>

</template>

<script setup>
import store from '../store';
import {ref} from "vue";
import {useRoute} from "vue-router";
import PageComponent from "../components/PageComponent.vue";

const route = useRoute();

//Create empty medicine
let model = ref({
    fullname: "",
    type: "",
    stock: 0,
    expiration: null

});

/*
if (route.params.id){
    model.value = 
}
*/

</script>

<style>

</style>