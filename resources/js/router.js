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
  { 
    path: '/dashboard', 
    component: Dashboard,
    meta: { requiresAuth: true }
  },
  { 
    path: '/create', 
    component: CreateGift,
    meta: { requiresAuth: true }
  },
  { path: '/gifts/:slug', component: GiftView, props: true },
  { path: '/login', component: Login },
  { path: '/register', component: Register },
  { path: '/payment-success/:slug', component: PaymentSuccess },
  { path: '/payment-cancel/:slug?', component: PaymentCancel },
  { path: '/payment-error', component: PaymentError }
]

const router = createRouter({ history: createWebHistory(), routes })

// Guard de navegação para rotas protegidas
router.beforeEach(async (to, from, next) => {
  if (to.meta.requiresAuth) {
    const token = localStorage.getItem('api_token');
    if (!token) {
      next({ path: '/login', query: { redirect: to.fullPath } });
      return;
    }
    
    // Verificar se o token ainda é válido
    try {
      const axios = window.axios;
      await axios.get('/api/user');
      next();
    } catch (error) {
      // Token inválido - limpar e redirecionar
      localStorage.removeItem('api_token');
      localStorage.removeItem('user');
      next({ path: '/login', query: { redirect: to.fullPath } });
    }
  } else {
    next();
  }
});

export default router
