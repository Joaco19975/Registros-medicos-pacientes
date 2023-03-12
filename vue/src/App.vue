<script>
import { RouterLink, RouterView } from 'vue-router'
import PagePrincipal from './views/PagePrincipal.vue'
import {mapState} from 'vuex'
import Paginate from 'vuejs-paginate'


</script>

<template>
  <router-view :key="$route.path"></router-view>
</template>

