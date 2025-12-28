<template>
  <header class="border-b border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 shadow-sm transition-colors">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <router-link to="/" class="text-xl sm:text-2xl font-bold text-slate-900 dark:text-white">
            Presentei<span class="text-blue-600 dark:text-blue-400">AI</span>
          </router-link>
        </div>
        
        <!-- Desktop Navigation -->
        <nav class="hidden md:flex items-center gap-2">
          <button 
            @click="toggleTheme" 
            class="rounded-md p-2 text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors"
            :title="isDark ? 'Modo claro' : 'Modo escuro'"
          >
            <svg v-if="isDark" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            <svg v-else class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
            </svg>
          </button>
          <router-link v-if="user" to="/dashboard" class="rounded-md px-3 py-2 text-sm font-medium text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-slate-900 dark:hover:text-white transition-colors">Dashboard</router-link>
          <router-link to="/create" class="rounded-md bg-blue-600 dark:bg-blue-500 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 dark:hover:bg-blue-400 transition-colors whitespace-nowrap">Criar Presente</router-link>
          <router-link v-if="!user" to="/login" class="rounded-md px-3 py-2 text-sm font-medium text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-slate-900 dark:hover:text-white transition-colors">Entrar</router-link>
          <a v-if="user" href="#" class="rounded-md px-3 py-2 text-sm font-medium text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-slate-900 dark:hover:text-white transition-colors" @click.prevent="logout">Sair</a>
        </nav>
        
        <!-- Mobile Menu Button -->
        <div class="flex md:hidden items-center gap-2">
          <button 
            @click="toggleTheme" 
            class="rounded-md p-2 text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors"
            :title="isDark ? 'Modo claro' : 'Modo escuro'"
          >
            <svg v-if="isDark" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            <svg v-else class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
            </svg>
          </button>
          <button 
            @click="mobileMenuOpen = !mobileMenuOpen"
            class="rounded-md p-2 text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors"
          >
            <svg v-if="!mobileMenuOpen" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg v-else class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
      
      <!-- Mobile Navigation -->
      <div v-if="mobileMenuOpen" class="md:hidden py-4 space-y-2">
        <router-link v-if="user" to="/dashboard" class="block rounded-md px-3 py-2 text-sm font-medium text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-slate-900 dark:hover:text-white transition-colors" @click="mobileMenuOpen = false">Dashboard</router-link>
        <router-link to="/create" class="block rounded-md px-3 py-2 text-sm font-medium bg-blue-600 dark:bg-blue-500 text-white hover:bg-blue-500 dark:hover:bg-blue-400 transition-colors" @click="mobileMenuOpen = false">Criar Presente</router-link>
        <router-link v-if="!user" to="/login" class="block rounded-md px-3 py-2 text-sm font-medium text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-slate-900 dark:hover:text-white transition-colors" @click="mobileMenuOpen = false">Entrar</router-link>
        <a v-if="user" href="#" class="block rounded-md px-3 py-2 text-sm font-medium text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-slate-900 dark:hover:text-white transition-colors" @click.prevent="logout(); mobileMenuOpen = false">Sair</a>
      </div>
    </div>
  </header>
</template>

<script>
export default {
  data() { 
    return { 
      user: null,
      isDark: false,
      mobileMenuOpen: false
    } 
  },
  async mounted() { 
    await this.checkAuth()
    
    // Check initial theme
    this.isDark = localStorage.getItem('theme') === 'dark' || 
      (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)
    
    if (this.isDark) {
      document.documentElement.classList.add('dark')
    }
    
    // Escutar eventos de mudança de autenticação
    window.addEventListener('auth-changed', this.handleAuthChange)
    
    // Escutar mudanças no localStorage (para sincronizar entre abas)
    window.addEventListener('storage', this.handleStorageChange)
  },
  beforeUnmount() {
    // Limpar event listeners
    window.removeEventListener('auth-changed', this.handleAuthChange)
    window.removeEventListener('storage', this.handleStorageChange)
  },
  methods: {
    async checkAuth() {
      // Verificar autenticação com o backend
      const token = localStorage.getItem('api_token');
      if (token) {
        try {
          const res = await this.$axios.get('/api/user');
          if (res.data.user) {
            this.user = res.data.user;
            localStorage.setItem('user', JSON.stringify(res.data.user));
          }
        } catch (e) {
          // Token inválido ou expirado - limpar dados
          localStorage.removeItem('api_token');
          localStorage.removeItem('user');
          this.user = null;
        }
      } else {
        // Tentar ler do localStorage como fallback
        try { 
          this.user = JSON.parse(localStorage.getItem('user')) 
        } catch(e){
          this.user = null;
        }
      }
    },
    handleAuthChange(event) {
      // Atualizar usuário quando login/registro acontece
      if (event.detail?.user) {
        this.user = event.detail.user
        localStorage.setItem('user', JSON.stringify(event.detail.user))
      } else if (event.detail?.action === 'logout') {
        this.user = null
      }
    },
    handleStorageChange(event) {
      // Sincronizar quando localStorage muda em outra aba
      if (event.key === 'api_token' || event.key === 'user') {
        this.checkAuth()
      }
    },
    toggleTheme() {
      this.isDark = !this.isDark
      if (this.isDark) {
        document.documentElement.classList.add('dark')
        localStorage.setItem('theme', 'dark')
      } else {
        document.documentElement.classList.remove('dark')
        localStorage.setItem('theme', 'light')
      }
    },
    logout() {
      localStorage.removeItem('api_token');
      localStorage.removeItem('user');
      this.user = null;
      
      // Disparar evento para notificar outros componentes
      window.dispatchEvent(new CustomEvent('auth-changed', { 
        detail: { action: 'logout' } 
      }))
      
      this.$router.push('/');
    }
  }
}
</script>

<style scoped>
.router-link-active {
  @apply bg-slate-100 dark:bg-slate-800 text-slate-900 dark:text-white;
}
</style>
