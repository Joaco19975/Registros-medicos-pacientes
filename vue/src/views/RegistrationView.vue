<template>
      <div v-if="success == 1" class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
            <p class="font-bold">Success!</p>
            <p class="text-sm">The registration has been created successfully.</p>
        </div>
    <form action="" @submit.prevent="saveRegistration">
<div class="shadow sm:rounded-md sm:overflow-hidden">
    <div class="form-group">
        <label for="paciente" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Patient</label>
        <select  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="patient" v-model="selectedPatient" >

            <option v-for="patient in patients" :value="patient">{{patient.fullname}} </option>
        </select>
    </div>
    <div class="form-group">
        <label for="paciente" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Medicine</label>
        <select  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="medicine" v-model="selectedMedicine">
            <option v-for="medicine in medicines" :value="medicine">{{medicine.name}}</option>
        </select>
    </div>
    <div class="form-group">
    <label for="syntoms" class="block text-sm font-medium text-gray-700">
                        Syntoms
    </label>
    <input type="text" name="syntoms" id="syntoms" v-model="syntoms"
                    autocomplete="medicine_name" placeholder="Write the syntoms"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500
                    block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
                    "
    >
    </div>      
    <div class="form-group">
    <label for="syntoms" class="block text-sm font-medium text-gray-700">
                        Cant of medicine
    </label>
    <input type="text" name="cant_medicine" id="cant_medicine" v-model="cant_medicine"
                    autocomplete="medicine_name" placeholder="Write the syntoms"
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


</template>

<script>
import store from "../store";
  import {computed} from "vue";
  import PageComponent from '../components/PageComponent.vue';
  import axiosClient from '../axios';
  import {routerKey, useRoute} from "vue-router";

  const route = useRoute();


  
  export default {
            data() {
                    return {
                        selectedPatient:{},
                        selectedMedicine:{},
                        patients: [], // <-- La lista de pacientes
                        medicines: [], // <-- La lista de medicinas
                        success: null,
                    }
                },
            mounted() {
                this.getPatients();
                this.getMedicines();
                console.log("Mounted...");
                
                
            },
            methods:{
              /*deleteMedicine(dato){
                if(confirm('Are you sure you want to delete this medicine? operation cant be undone !!')){
                    //delete medicine

                  }
              
                    return axiosClient.delete(`/medicine/${dato.id}`).then((res) => {
                      return this.getMedicines()
                      
                     // return res;
                    });
                  

              },*/
              saveRegistration(e){
                e.preventDefault();  

                let currentObj = this;

              
                  //validacion
                  if (!this.validateForm()) {
                            return;
                }

                if (this.selectedMedicine.stock < this.cant_medicine) {
                    alert('No hay suficientes medicamentos en stock para realizar la venta.');
                    return;
                }


                axiosClient.post('/registration', {  
                    id_patient: this.selectedPatient.id,  
                    id_medicine: this.selectedMedicine.id,
                    syntoms: this.syntoms,  
                    name_patient: this.selectedPatient.fullname,
                    name_medicine: this.selectedMedicine.name,
                    cant_medicine: this.cant_medicine,
                }).then(response => {
                    currentObj.success = 1;

                   
                    console.log(response);
                });
                


               // console.log(this.selectedPatient.id);
              },

              validateForm() {

                      
                        if (!this.selectedMedicine.id || !this.selectedMedicine.id) {
                            alert('Selected medicine is required');
                            return false;
                        }
                        if (!this.selectedPatient.fullname || !this.selectedPatient.id ) {
                            alert('Selected patient is required');
                            return false;
                        }
                        if (!this.syntoms) {
                            alert('Syntoms field cannot be empty');
                            return false;
                        }
                        if (!this.cant_medicine) {
                            alert('Cant medicine field cannot be empty');
                            return false;
                        }
                        return true;
                },


              getMedicines(){
                axiosClient.get('/medicine')
                    .then(response => {
                        this.medicines = response.data.data;
                    }).catch(error => {
                            console.log(error);
                        });
              },

              getPatients(){
                axiosClient.get('/patient')
                     .then(response => {
                        this.patients = response.data.data;
                     }).catch(error => {
                            console.log(error);
                        });

              }

            }
    } 

</script>


<style>

</style>