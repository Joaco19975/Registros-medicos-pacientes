<template>
    <form action="" @submit.prevent="saveRegistration">
<div class="shadow sm:rounded-md sm:overflow-hidden">
    <div class="form-group">
        <label for="paciente">Select Patient</label>
        <select  class="form-control" id="patient" v-model="selectedPatient" >
            <option v-for="patient in patients" :value="patient">{{patient.fullname}} </option>
        </select>
    </div>
    <div class="form-group">
        <label for="paciente">Select Medicine</label>
        <select  class="form-control" id="medicine" v-model="selectedMedicine">
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
                axiosClient.post('/registration', {  
                    id_patient: this.selectedPatient.id,  
                    id_medicine: this.selectedMedicine.id,
                    syntoms: this.syntoms,  
                    name_patient: this.selectedPatient.fullname,
                    name_medicine: this.selectedMedicine.name,
                }).then(response => {
                    console.log(response);
                });
                


               // console.log(this.selectedPatient.id);
              },


              getMedicines(){
                axiosClient.get('/hospital/medicines')
                    .then(response => {
                        this.medicines = response.data;
                    }).catch(error => {
                            console.log(error);
                        });
              },

              getPatients(){
                axiosClient.get('/hospital/patients')
                     .then(response => {
                        this.patients = response.data;
                     }).catch(error => {
                            console.log(error);
                        });

              }

            }
    } 

</script>


<style>

</style>