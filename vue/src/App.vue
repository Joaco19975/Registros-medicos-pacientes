<script>
import { RouterLink, RouterView } from 'vue-router'
import HelloWorld from './components/HelloWorld.vue'
import {mapState} from 'vuex'


</script>

<template>
  


  <router-view :key="$route.path"></router-view>
</template>

