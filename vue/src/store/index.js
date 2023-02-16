import {createStore} from 'vuex';
import axiosClient from '../axios';
/*
Textos completos
id	
id_hospital	
name	
type	
stock	
expiration	
created_at	
updated_at
*/
const tmpPatients = [
    
        {
            id:14,
            fullname:"Joaquin paradela",	
            sex:"Masculino",
            dni:"40547878",
            birth_date:"1997-09-09",
           
        },



    
]
const tmpMedicines = [
    {
        id:14,
        id_hospital:4,
        name:"Antirra",
        type:"Antirrabia",
        stock:50,
        expiration:"2023-12-20",
        created_at:"2021-12-12",
        updated_at:"2021-12-12",
    },
    {
        id:15,
        id_hospital:4,
        name:"Antisida",
        type:"Sida",
        stock:30,
        expiration:"2024-12-20",
        created_at:"2022-12-12",
        updated_at:"2022-12-12",
    },
    {
        id:16,
        id_hospital:4,
        name:"Antirraza",
        type:"raza",
        stock:80,
        expiration:"2025-12-20",
        created_at:"2023-12-12",
        updated_at:"2023-12-12",
    },
    {
        id:17,
        id_hospital:4,
        name:"Antirrana",
        type:"Rana",
        stock:90,
        expiration:"2025-12-20",
        created_at:"2019-12-12",
        updated_at:"2019-12-12",
    }
];


const store = createStore({
     
    state:{
        user:{
            data:{},
            token:sessionStorage.getItem('TOKEN'),
        },
        medicines:[...tmpMedicines],
        patients:[...tmpPatients],
    },
    getters:{},

    actions:{
        saveMedicine({commit}, medicine){
            let response;
            if(medicine.id){
                response = axiosClient.put(`/medicine/${medicine.id}`, medicine)
                                      .then((res) => {
                                        commit("updateMedicine", res.data);
                                        return res;

                                      });
            }else{
                response = axiosClient.post("/medicine", medicine).then((res) => {
                 commit("saveSurvey", res.data);
                 return res;
                })
            }

        },
        register({commit}, user){
            return axiosClient.post('/register', user)
                  .then(({data}) => {
                    commit('setUser', data);
                    return data;
                  })
        },

        login({commit}, user){
            return axiosClient.post('/login', user)
                  .then(({data}) => {
                    commit('setUser', data);
                    return data;
                  })
        },
        logout({commit}) {
            return axiosClient.post('/logout')
              .then(response => {
                commit('logout')
                return response;
              })
          },
     },
    mutations:{
        saveSurvey: (state,medicine) => {
            state.medicines = [...state.medicine, medicine.data];
        },
        updateMedicine: (state,medicine) => {
            state.medicines = state.medicines.map((m) => {
                if(m.id == medicine.data.id){
                    return medicine.data;
                }
                return m;
            })

        }, 
        
        logout: (state) => {
            state.user.token = null;
            state.user.data = {};
            sessionStorage.removeItem("TOKEN");
          },
        
        setUser: (state, userData) => {
            state.user.token = userData.token;
            state.user.data = userData.user;
            sessionStorage.setItem('TOKEN', userData.token);
        }
    },
    modules: {},
});

export default store;