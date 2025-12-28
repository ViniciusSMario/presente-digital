import { createApp } from 'vue'
import axios from 'axios'
import router from './router'
import NavBar from './components/NavBar.vue'

import './bootstrap'

console.log('resources/js/app.js loaded')


const app = createApp({})
app.component('nav-bar', NavBar)
app.config.globalProperties.$axios = axios
app.use(router)
app.mount('#app')
