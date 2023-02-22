import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import Dashboard from '../views/Dashboard.vue'
import Login from '../views/Login.vue';
import Register from '../views/Register.vue'
import Medicines from '../views/Medicines.vue'
import MedicineView from '../views/MedicineView.vue'
import PatientView from '../views/PatientView.vue'
import Patients from '../views/Patients.vue'
import Registration from '../views/Registration.vue'
import RegistrationView from '../views/RegistrationView.vue'
import PagePrincipal from '../views/PagePrincipal.vue'
import DefaultLayout from '../components/DefaultLayout.vue'
import AuthLayout from '../components/AuthLayout.vue'
import store from '../store';

const routes = [
  {
    path: "/dashboard",
    component: DefaultLayout,
    meta: { requiresAuth: true },
    children: [
      { path: "/dashboard", name: "Dashboard", component: Dashboard },
      { path: "/hospital/medicines",name: 'Medicines', component: Medicines },
      { path:"/medicine/create", name:"MedicineCreate", component: MedicineView },
      { path:"/medicine/:id", name:"MedicineView", component: MedicineView },
      { path: "/hospital/patients",name: 'Patients', component: Patients },
      { path:"/patient/create", name:"PatientCreate", component: PatientView },
      { path:"/patient/:id", name:"PatientView", component: PatientView },
      {path:"/hospital/registration", name:"Registration", component: Registration},
      {path:"/hospital/registration/create", name:"RegistrationCreate", component: RegistrationView},
      {path:"/hospital/registration/:id", name:"RegistrationView", component: RegistrationView}
     

      

    ],
  },

  {
    path: '/auth',
    redirect: '/login',
    name: 'Auth',
    component: AuthLayout,
    meta:{isGuest: true},
    children: [
      {
        path: '/login',
        name: 'Login',
        component: Login,
      },
      {
        path: '/register',
        name: 'Register',
        component: Register
      },
    ]
  },
 
  {
    path: "/",
    name: 'PagePrincipal',
    component: PagePrincipal
  },

];

const router = createRouter({
  history: createWebHistory(),
  routes
});

router.beforeEach((to, from, next) => {
  if(to.meta.requiresAuth && !store.state.user.token){
    next({name: 'Login'});
  }else if(store.state.user.token && (to.meta.isGuest)){
    next({name:'Dashboard'});
  }else{
    next(); 
  }
});

export default router;