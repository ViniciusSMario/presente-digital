<template>
  <div class="min-h-screen bg-gradient-to-br from-green-50 to-emerald-50 flex items-center justify-center px-4 py-12">
    <div class="max-w-md w-full">
      <div class="bg-white rounded-2xl shadow-2xl p-8 text-center">
        <!-- Success Icon -->
        <div class="mb-6">
          <div class="mx-auto w-20 h-20 bg-green-100 rounded-full flex items-center justify-center">
            <svg class="w-12 h-12 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
          </div>
        </div>

        <!-- Title -->
        <h1 class="text-3xl font-bold text-gray-900 mb-3">
          Pagamento Confirmado!
        </h1>
        <p class="text-gray-600 mb-8">
          Seu presente digital foi criado com sucesso e está pronto para ser compartilhado.
        </p>

        <!-- Gift Info -->
        <div class="bg-gradient-to-br from-purple-100 to-pink-100 rounded-xl p-6 mb-6 text-left">
          <h3 class="font-bold text-gray-900 mb-3 flex items-center">
            <span class="text-2xl mr-2">🎁</span>
            Seu Presente
          </h3>
          <div v-if="loading" class="text-center py-4">
            <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-purple-600 mx-auto"></div>
          </div>
          <div v-else-if="gift">
            <p class="text-sm text-gray-700 mb-2">
              <span class="font-semibold">Título:</span> {{ gift.title }}
            </p>
            <p class="text-sm text-gray-700 mb-4">
              <span class="font-semibold">Link:</span>
            </p>
            <div class="flex items-center gap-2 bg-white rounded-lg p-3">
              <input 
                ref="linkInput"
                :value="giftUrl" 
                readonly 
                class="flex-1 text-sm text-gray-800 outline-none"
              />
              <button 
                @click="copyLink"
                class="bg-purple-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-purple-500 transition-all flex-shrink-0"
              >
                {{ copied ? '✓ Copiado!' : 'Copiar' }}
              </button>
            </div>
          </div>
        </div>

        <!-- Actions -->
        <div class="space-y-3">
          <router-link 
            v-if="gift"
            :to="`/gifts/${gift.slug}`"
            class="block w-full bg-gradient-to-r from-purple-600 to-pink-600 text-white px-6 py-3 rounded-xl font-semibold hover:from-purple-500 hover:to-pink-500 transition-all"
          >
            Visualizar Presente
          </router-link>
          <router-link 
            to="/dashboard"
            class="block w-full bg-gray-100 text-gray-700 px-6 py-3 rounded-xl font-semibold hover:bg-gray-200 transition-all"
          >
            Ir para Dashboard
          </router-link>
          <router-link 
            to="/"
            class="block w-full text-gray-600 hover:text-gray-800 text-sm transition-all"
          >
            Voltar ao início
          </router-link>
        </div>

        <!-- Help Text -->
        <div class="mt-8 pt-6 border-t border-gray-200">
          <p class="text-sm text-gray-500">
            💡 Dica: Salve este link em um local seguro. Você também pode acessá-lo pelo seu dashboard.
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      gift: null,
      loading: true,
      copied: false
    }
  },
  computed: {
    giftUrl() {
      if (!this.gift) return ''
      return `${window.location.origin}/gifts/${this.gift.slug}`
    }
  },
  async mounted() {
    const slug = this.$route.params.slug
    if (slug) {
      try {
        const res = await this.$axios.get(`/api/gifts/${slug}`)
        this.gift = res.data.gift
      } catch (error) {
        console.error('Error loading gift:', error)
      }
    }
    this.loading = false
  },
  methods: {
    async copyLink() {
      try {
        await navigator.clipboard.writeText(this.giftUrl)
        this.copied = true
        setTimeout(() => {
          this.copied = false
        }, 2000)
      } catch (err) {
        // Fallback for older browsers
        this.$refs.linkInput.select()
        document.execCommand('copy')
        this.copied = true
        setTimeout(() => {
          this.copied = false
        }, 2000)
      }
    }
  }
}
</script>
