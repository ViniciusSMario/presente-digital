<template>
  <div class="min-h-screen bg-gray-50 dark:bg-slate-900 transition-colors">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:py-8 sm:px-6 lg:px-8">
      <div class="mb-6 sm:mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
      <div>
        <h1 class="text-2xl sm:text-3xl font-bold tracking-tight text-slate-900 dark:text-white">Meus Presentes</h1>
        <p class="mt-1 sm:mt-2 text-sm text-slate-600 dark:text-slate-400">Crie e compartilhe presentes digitais personalizados.</p>
      </div>
      <router-link to="/create" class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 whitespace-nowrap">
        <svg class="-ml-0.5 mr-1.5 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        Novo Presente
      </router-link>
    </div>

    <div v-if="loading" class="flex justify-center py-12">
      <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600"></div>
    </div>

    <div v-else-if="!gifts.length" class="rounded-lg border-2 border-dashed border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 p-12 text-center">
      <svg class="mx-auto h-12 w-12 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
      </svg>
      <h3 class="mt-2 text-sm font-semibold text-slate-900 dark:text-white">Nenhum presente</h3>
      <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Comece criando seu primeiro presente digital.</p>
      <div class="mt-6">
        <router-link to="/create" class="inline-flex items-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500">Criar agora</router-link>
      </div>
    </div>

    <div v-else class="grid gap-4 sm:gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
      <div v-for="g in gifts" :key="g.id" class="overflow-hidden rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 shadow-sm transition hover:shadow-md">
        <div class="p-4 sm:p-6">
          <div class="flex items-start justify-between mb-3 gap-2">
            <h3 class="text-base sm:text-lg font-semibold text-slate-900 dark:text-white break-words">{{ g.title || 'Sem título' }}</h3>
            <span v-if="g.paid" class="inline-flex items-center rounded-full bg-green-100 dark:bg-green-900/30 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:text-green-300">
              Pago
            </span>
            <span v-else class="inline-flex items-center rounded-full bg-yellow-100 dark:bg-yellow-900/30 px-2.5 py-0.5 text-xs font-medium text-yellow-800 dark:text-yellow-300">
              Pendente
            </span>
          </div>
          <p class="mt-2 line-clamp-3 text-sm text-slate-600 dark:text-slate-400">{{ g.message?.slice(0,120) }}</p>
          <div class="mt-4 flex items-center text-xs text-slate-500 dark:text-slate-500">
            <svg class="mr-1.5 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            {{ formatDate(g.created_at) }}
          </div>
        </div>
        <div v-if="g.paid" class="border-t border-slate-100 dark:border-slate-700 bg-slate-50 dark:bg-slate-900/50 px-6 py-4 flex justify-between items-center">
            <router-link :to="`/gifts/${g.slug}`" class="text-sm font-medium text-blue-600 dark:text-blue-400 hover:text-blue-500">Ver presente →</router-link>
            <button 
              @click="copyLink(g.slug)" 
              class="text-sm text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white"
              :title="copiedId === g.id ? 'Copiado!' : 'Copiar link'"
              >
              <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
              </svg>
            </button>
        </div>
      </div>
    </div>
  </div>
  </div>
</template>

<script>
export default {
  data(){
    return {
      gifts:[],
      loading: true,
      copiedId: null
    }
  },
  async mounted(){
    const token = localStorage.getItem('api_token')
    if (!token) {
      this.$router.push('/login')
      return
    }
    
    try{
      const res = await this.$axios.get('/api/user/gifts', { 
        headers: { Authorization: `Bearer ${token}` } 
      })
      this.gifts = res.data.gifts || []
    }catch(e){
      console.error('Error loading gifts:', e)
      if (e.response?.status === 401) {
        this.$router.push('/login')
      }
    } finally {
      this.loading = false
    }
  },
  methods: {
    formatDate(dateString) {
      const date = new Date(dateString)
      return date.toLocaleDateString('pt-BR', { 
        day: '2-digit', 
        month: 'short', 
        year: 'numeric' 
      })
    },
    async copyLink(slug) {
      const url = `${window.location.origin}/gifts/${slug}`
      try {
        await navigator.clipboard.writeText(url)
        const gift = this.gifts.find(g => g.slug === slug)
        this.copiedId = gift.id
        setTimeout(() => {
          this.copiedId = null
        }, 2000)
      } catch (err) {
        console.error('Failed to copy:', err)
      }
    }
  }
}
</script>

<style scoped>
.line-clamp-3 {
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
</style>
