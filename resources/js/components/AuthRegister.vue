<template>
  <div class="min-h-screen bg-gradient-to-br from-emerald-50 via-white to-teal-50 dark:from-slate-900 dark:via-slate-800 dark:to-slate-900 flex items-center justify-center px-4 sm:px-6 lg:px-8 py-12">
    <div class="w-full max-w-md">
      <!-- Logo/Brand -->
      <div class="text-center mb-8">
        <router-link to="/" class="inline-block">
          <h1 class="text-3xl sm:text-4xl font-bold text-slate-900 dark:text-white mb-2">
            Presentei<span class="text-emerald-600 dark:text-emerald-400">AI</span>
          </h1>
        </router-link>
        <p class="text-sm text-slate-600 dark:text-slate-400 mt-2">Crie sua conta e comece a compartilhar presentes</p>
      </div>

      <!-- Card -->
      <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-xl p-8 sm:p-10 border border-slate-200 dark:border-slate-700">
        <div class="mb-8">
          <h2 class="text-2xl font-bold text-slate-900 dark:text-white">Criar nova conta</h2>
          <p class="mt-2 text-sm text-slate-600 dark:text-slate-400">Preencha os dados abaixo para começar</p>
        </div>

        <!-- Error Message -->
        <div v-if="error" class="mb-6 p-4 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg">
          <div class="flex items-start">
            <svg class="w-5 h-5 text-red-600 dark:text-red-400 mt-0.5 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <p class="text-sm text-red-800 dark:text-red-300">{{ error }}</p>
          </div>
        </div>

        <!-- Success Message -->
        <div v-if="success" class="mb-6 p-4 bg-emerald-50 dark:bg-emerald-900/20 border border-emerald-200 dark:border-emerald-800 rounded-lg">
          <div class="flex items-start">
            <svg class="w-5 h-5 text-emerald-600 dark:text-emerald-400 mt-0.5 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <p class="text-sm text-emerald-800 dark:text-emerald-300">{{ success }}</p>
          </div>
        </div>

        <form @submit.prevent="submit" class="space-y-5">
          <!-- Name Field -->
          <div>
            <label for="name" class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
              Nome completo
            </label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
              </div>
              <input 
                v-model="name" 
                id="name" 
                type="text" 
                autocomplete="name" 
                required 
                :disabled="loading"
                placeholder="Seu nome"
                class="block w-full pl-10 pr-3 py-3 border border-slate-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-700 text-slate-900 dark:text-white placeholder-slate-400 dark:placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all disabled:opacity-50 disabled:cursor-not-allowed" 
              />
            </div>
          </div>

          <!-- Email Field -->
          <div>
            <label for="email" class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
              E-mail
            </label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                </svg>
              </div>
              <input 
                v-model="email" 
                id="email" 
                type="email" 
                autocomplete="email" 
                required 
                :disabled="loading"
                placeholder="seu@email.com"
                class="block w-full pl-10 pr-3 py-3 border border-slate-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-700 text-slate-900 dark:text-white placeholder-slate-400 dark:placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all disabled:opacity-50 disabled:cursor-not-allowed" 
              />
            </div>
          </div>

          <!-- Password Field -->
          <div>
            <label for="password" class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
              Senha
            </label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
              </div>
              <input 
                v-model="password" 
                :type="showPassword ? 'text' : 'password'"
                id="password" 
                autocomplete="new-password" 
                required 
                :disabled="loading"
                placeholder="Mínimo 6 caracteres"
                class="block w-full pl-10 pr-10 py-3 border border-slate-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-700 text-slate-900 dark:text-white placeholder-slate-400 dark:placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all disabled:opacity-50 disabled:cursor-not-allowed" 
              />
              <button
                type="button"
                @click="showPassword = !showPassword"
                class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-slate-600 dark:hover:text-slate-300"
              >
                <svg v-if="showPassword" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                </svg>
                <svg v-else class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
              </button>
            </div>
            <p class="mt-1.5 text-xs text-slate-500 dark:text-slate-400">A senha deve ter pelo menos 6 caracteres</p>
          </div>

          <!-- Submit Button -->
          <div class="pt-2">
            <button 
              type="submit" 
              :disabled="loading"
              class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-semibold text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 disabled:opacity-50 disabled:cursor-not-allowed transition-all duration-200 transform hover:scale-[1.02] active:scale-[0.98]"
            >
              <svg v-if="loading" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
              </svg>
              <span>{{ loading ? 'Criando conta...' : 'Criar conta' }}</span>
            </button>
          </div>
        </form>

        <!-- Divider -->
        <div class="mt-8 pt-6 border-t border-slate-200 dark:border-slate-700">
          <p class="text-center text-sm text-slate-600 dark:text-slate-400">
            Já tem uma conta?
            <router-link to="/login" class="font-semibold text-emerald-600 dark:text-emerald-400 hover:text-emerald-700 dark:hover:text-emerald-300 transition-colors">
              Fazer login
            </router-link>
          </p>
        </div>
      </div>

      <!-- Back to Home -->
      <div class="mt-6 text-center">
        <router-link to="/" class="text-sm text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white transition-colors inline-flex items-center">
          <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
          </svg>
          Voltar para a página inicial
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: '',
      email: '',
      password: '',
      showPassword: false,
      loading: false,
      error: '',
      success: ''
    }
  },
  async mounted() {
    // Verificar se já está autenticado
    const token = localStorage.getItem('api_token')
    if (token) {
      try {
        const res = await this.$axios.get('/api/user')
        if (res.data.user) {
          // Já está autenticado, redirecionar
          const redirect = this.$route.query.redirect || '/dashboard'
          this.$router.push(redirect)
        }
      } catch (e) {
        // Token inválido, limpar e continuar na tela de registro
        localStorage.removeItem('api_token')
        localStorage.removeItem('user')
      }
    }
  },
  methods: {
    async submit() {
      this.error = ''
      this.success = ''
      this.loading = true
      
      // Validação básica
      if (this.password.length < 6) {
        this.error = 'A senha deve ter pelo menos 6 caracteres.'
        this.loading = false
        return
      }
      
      try {
        const res = await this.$axios.post('/api/register', {
          name: this.name,
          email: this.email,
          password: this.password
        })
        
        localStorage.setItem('api_token', res.data.token)
        localStorage.setItem('user', JSON.stringify(res.data.user))
        
        // Disparar evento para atualizar NavBar
        window.dispatchEvent(new CustomEvent('auth-changed', { 
          detail: { user: res.data.user, action: 'register' } 
        }))
        
        this.success = 'Conta criada com sucesso! Redirecionando...'
        
        // Pequeno delay para mostrar mensagem de sucesso
        setTimeout(() => {
          const redirect = this.$route.query.redirect || '/dashboard'
          this.$router.push(redirect)
        }, 1000)
      } catch (e) {
        if (e.response?.status === 422) {
          const errors = e.response.data.errors
          if (errors?.email) {
            this.error = 'Este e-mail já está em uso. Tente fazer login ou use outro e-mail.'
          } else if (errors?.password) {
            this.error = errors.password[0]
          } else {
            this.error = 'Por favor, verifique os dados informados.'
          }
        } else if (e.response?.data?.message) {
          this.error = e.response.data.message
        } else {
          this.error = 'Ocorreu um erro ao criar sua conta. Por favor, tente novamente.'
        }
      } finally {
        this.loading = false
      }
    }
  }
}
</script>

<style scoped>
</style>
