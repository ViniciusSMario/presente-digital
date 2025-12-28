import { createRouter, createWebHistory } from 'vue-router'
import LandingPage from './components/LandingPage.vue'
import CreateGift from './components/CreateGift.vue'
import GiftView from './components/GiftView.vue'
import Login from './components/AuthLogin.vue'
import Register from './components/AuthRegister.vue'
import Dashboard from './components/Dashboard.vue'
import PaymentSuccess from './components/PaymentSuccess.vue'
import PaymentCancel from './components/PaymentCancel.vue'
import PaymentError from './components/PaymentError.vue'

const routes = [
  { path: '/', component: LandingPage },
  { path: '/dashboard', component: Dashboard },
  { path: '/create', component: CreateGift },
  { path: '/gifts/:slug', component: GiftView, props: true },
  { path: '/login', component: Login },
  { path: '/register', component: Register },
  { path: '/payment-success/:slug', component: PaymentSuccess },
  { path: '/payment-cancel/:slug?', component: PaymentCancel },
  { path: '/payment-error', component: PaymentError }
]

export default createRouter({ history: createWebHistory(), routes })
