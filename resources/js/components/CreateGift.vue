<template>
  <div class="min-h-screen bg-gradient-to-br from-purple-50 via-pink-50 to-rose-50 dark:from-slate-900 dark:via-slate-800 dark:to-slate-900 py-12 px-4 transition-colors">
    <div class="mx-auto max-w-4xl">
      <!-- Header -->
      <div class="text-center mb-6 sm:mb-8 px-2">
        <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-2">Criar Presente Digital</h1>
        <p class="text-base sm:text-lg text-gray-600 dark:text-gray-300">Crie uma experiência única e inesquecível</p>
      </div>

      <!-- Progress Steps -->
      <div class="mb-6 sm:mb-8 overflow-x-auto px-2">
        <div class="flex items-center justify-center min-w-max mx-auto">
          <div v-for="(step, index) in steps" :key="index" class="flex items-center">
            <div class="flex flex-col items-center">
              <div 
                class="w-8 h-8 sm:w-10 sm:h-10 rounded-full flex items-center justify-center font-bold transition-all text-sm sm:text-base"
                :class="currentStep > index ? 'bg-green-500 text-white' : currentStep === index ? 'bg-purple-600 text-white' : 'bg-gray-300 text-gray-600'"
              >
                <span v-if="currentStep > index">✓</span>
                <span v-else>{{ index + 1 }}</span>
              </div>
              <span class="text-[10px] sm:text-xs mt-1 sm:mt-2 font-medium whitespace-nowrap" :class="currentStep >= index ? 'text-purple-600' : 'text-gray-500'">
                {{ step }}
              </span>
            </div>
            <div v-if="index < steps.length - 1" class="w-8 sm:w-16 h-1 mx-1 sm:mx-2 mb-4 sm:mb-6" :class="currentStep > index ? 'bg-green-500' : 'bg-gray-300'"></div>
          </div>
        </div>
      </div>

      <!-- Main Card -->
      <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-xl overflow-hidden transition-colors">
        <!-- Step 1: Template Selection -->
        <div v-show="currentStep === 0" class="p-4 sm:p-6 md:p-8">
          <h2 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white mb-4 sm:mb-6">Escolha o Template</h2>
          <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-3 sm:gap-4">
            <div 
              v-for="template in templates" 
              :key="template.value"
              class="cursor-pointer group"
            >
              <div 
                class="aspect-[3/4] rounded-xl overflow-hidden relative border-4 transition-all"
                :class="form.template === template.value ? 'border-purple-600 shadow-lg scale-105' : 'border-gray-200 hover:border-purple-400'"
              >
                <!-- Background gradient -->
                <div class="absolute inset-0 bg-gradient-to-br" :style="{ backgroundImage: template.gradient }"></div>
                
                <!-- Template image if available -->
                <img 
                  v-if="template.image" 
                  :src="template.image" 
                  :alt="template.name"
                  class="absolute inset-0 w-full h-full object-cover"
                />
                
                <!-- Fallback with icon and gradient -->
                <div v-else class="absolute inset-0 flex items-center justify-center text-white">
                  <div class="text-center">
                    <div class="text-4xl mb-2">{{ template.icon }}</div>
                    <div class="text-sm font-semibold">{{ template.name }}</div>
                  </div>
                </div>
                
                <!-- Hover overlay with buttons -->
                <div 
                  class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-60 transition-all flex items-center justify-center"
                  @click="form.template = template.value"
                >
                  <button
                    v-if="template.image"
                    @click.stop="openPreview(template)"
                    class="opacity-0 group-hover:opacity-100 transition-opacity bg-white text-purple-600 px-3 py-1.5 rounded-full text-xs font-bold hover:bg-gray-100"
                  >
                    Ver Prévia
                  </button>
                </div>
                
                <!-- Selected checkmark -->
                <div v-if="form.template === template.value" class="absolute top-2 right-2 bg-purple-600 text-white rounded-full w-6 h-6 flex items-center justify-center z-10">
                  ✓
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Step 2: Content -->
        <div v-show="currentStep === 1" class="p-4 sm:p-6 md:p-8">
          <h2 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white mb-4 sm:mb-6">Personalize o Conteúdo</h2>
          <div class="space-y-6">
            <div>
              <label for="title" class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">
                Título do Presente <span class="text-red-500">*</span>
              </label>
              <input 
                v-model="form.title" 
                id="title" 
                type="text" 
                placeholder="Ex: Feliz Aniversário, Meu Amor!"
                class="block w-full rounded-lg border-2 border-gray-300 dark:border-gray-600 bg-white dark:bg-slate-700 px-4 py-3 text-gray-900 dark:text-white placeholder:text-gray-400 dark:placeholder:text-gray-500 focus:border-purple-600 dark:focus:border-purple-500 focus:ring-2 focus:ring-purple-600 dark:focus:ring-purple-500 focus:ring-opacity-50 transition-colors"
                required
              />
            </div>

            <div>
              <label for="message" class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">
                Mensagem Especial <span class="text-red-500">*</span>
              </label>
              <textarea 
                v-model="form.message" 
                id="message" 
                rows="6" 
                placeholder="Escreva uma mensagem carinhosa..."
                class="block w-full rounded-lg border-2 border-gray-300 dark:border-gray-600 bg-white dark:bg-slate-700 px-4 py-3 text-gray-900 dark:text-white placeholder:text-gray-400 dark:placeholder:text-gray-500 focus:border-purple-600 dark:focus:border-purple-500 focus:ring-2 focus:ring-purple-600 dark:focus:ring-purple-500 focus:ring-opacity-50 transition-colors"
                required
              ></textarea>
            </div>
          </div>
        </div>

        <!-- Step 3: Media Upload -->
        <div v-show="currentStep === 2" class="p-4 sm:p-6 md:p-8">
          <h2 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white mb-4 sm:mb-6">Adicione Mídias</h2>
          
          <div class="mb-6">
            <div class="flex justify-center rounded-xl border-2 border-dashed border-purple-300 dark:border-purple-700 bg-purple-50 dark:bg-slate-800 px-6 py-12 hover:border-purple-400 dark:hover:border-purple-600 transition-all">
              <div class="text-center">
                <svg class="mx-auto h-16 w-16 text-purple-400 dark:text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                </svg>
                <div class="mt-4">
                  <label for="file-upload" class="cursor-pointer rounded-lg bg-purple-600 px-6 py-3 text-sm font-semibold text-white hover:bg-purple-500 inline-block">
                    Escolher Arquivos
                    <input id="file-upload" type="file" multiple accept="image/*,audio/*,video/*" @change="handleFiles" class="sr-only" />
                  </label>
                </div>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">PNG, JPG, MP3, MP4 até 10MB cada</p>
              </div>
            </div>
          </div>

          <!-- Preview uploaded files -->
          <div v-if="files.length > 0" class="space-y-3">
            <h3 class="font-semibold text-gray-900 dark:text-white">Arquivos Selecionados:</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
              <div 
                v-for="(file, index) in files" 
                :key="index"
                class="relative group rounded-lg border-2 border-gray-200 dark:border-gray-700 bg-white dark:bg-slate-700 p-3 hover:border-purple-400 dark:hover:border-purple-500 transition-all"
              >
                <div class="aspect-square bg-gray-100 dark:bg-slate-600 rounded-lg flex items-center justify-center mb-2 overflow-hidden">
                  <img v-if="file.type.startsWith('image/')" :src="getFilePreview(file)" class="w-full h-full object-cover" />
                  <div v-else class="text-4xl">
                    {{ file.type.startsWith('audio/') ? '🎵' : '🎥' }}
                  </div>
                </div>
                <p class="text-xs text-gray-600 dark:text-gray-400 truncate">{{ file.name }}</p>
                <button 
                  @click="removeFile(index)"
                  class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity"
                >
                  ×
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Step 4: Payment -->
        <div v-show="currentStep === 3" class="p-4 sm:p-6 md:p-8">
          <h2 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white mb-4 sm:mb-6">Finalizar e Pagar</h2>
          
          <div class="bg-gradient-to-br from-purple-100 to-pink-100 dark:from-purple-900/30 dark:to-pink-900/30 rounded-xl p-6 mb-6">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Resumo do Pedido</h3>
            <div class="space-y-2 text-gray-700 dark:text-gray-300">
              <div class="flex justify-between">
                <span>Template:</span>
                <span class="font-semibold">{{ selectedTemplate?.name }}</span>
              </div>
              <div class="flex justify-between">
                <span>Título:</span>
                <span class="font-semibold">{{ form.title || '(não preenchido)' }}</span>
              </div>
              <div class="flex justify-between">
                <span>Mídias:</span>
                <span class="font-semibold">{{ files.length }} arquivo(s)</span>
              </div>
              <div class="border-t-2 border-purple-300 pt-3 mt-3 flex justify-between text-lg">
                <span class="font-bold">Total:</span>
                <span class="font-bold text-purple-600">R$ 9,90</span>
              </div>
            </div>
          </div>

          <div class="bg-blue-50 border-2 border-blue-200 rounded-xl p-4 mb-6">
            <div class="flex items-start">
              <svg class="w-6 h-6 text-blue-600 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <div class="text-sm text-blue-800">
                <p class="font-semibold mb-1">Pagamento Seguro com Stripe</p>
                <p>Você será redirecionado para uma página segura de pagamento. Após a confirmação, receberá o link do seu presente.</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Navigation Buttons -->
        <div class="border-t border-gray-200 bg-gray-50 px-4 sm:px-6 md:px-8 py-4 sm:py-6">
          <div class="flex justify-between gap-2">
            <button 
              v-if="currentStep > 0"
              @click="previousStep"
              class="rounded-lg bg-white border-2 border-gray-300 px-4 sm:px-6 py-2.5 sm:py-3 text-xs sm:text-sm font-semibold text-gray-700 hover:bg-gray-50 transition-all"
            >
              ← Voltar
            </button>
            <div v-else></div>

            <button 
              v-if="currentStep < steps.length - 1"
              @click="nextStep"
              :disabled="!canProceed"
              class="rounded-lg px-4 sm:px-6 py-2.5 sm:py-3 text-xs sm:text-sm font-semibold text-white transition-all disabled:opacity-50 disabled:cursor-not-allowed whitespace-nowrap"
              :class="canProceed ? 'bg-purple-600 hover:bg-purple-500' : 'bg-gray-400'"
            >
              Continuar →
            </button>
            <button 
              v-else
              @click="submit"
              :disabled="loading"
              class="rounded-lg bg-gradient-to-r from-purple-600 to-pink-600 px-4 sm:px-8 py-2.5 sm:py-3 text-xs sm:text-sm font-semibold text-white hover:from-purple-500 hover:to-pink-500 transition-all disabled:opacity-50 disabled:cursor-not-allowed shadow-lg whitespace-nowrap"
            >
              <span v-if="!loading">Ir para Pagamento 💳</span>
              <span v-else>Processando...</span>
            </button>
          </div>
        </div>
      </div>

      <!-- Success Message -->
      <div v-if="created" class="mt-6 bg-green-50 border-2 border-green-500 rounded-xl p-6 text-center">
        <div class="text-green-600 text-5xl mb-3">✓</div>
        <h3 class="text-xl font-bold text-gray-900 mb-2">Presente Criado com Sucesso!</h3>
        <p class="text-gray-700 mb-4">Você será redirecionado para o pagamento...</p>
      </div>
    </div>

    <!-- Preview Modal -->
    <div v-if="previewTemplate" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-75" @click="closePreview">
      <div class="relative max-w-4xl max-h-[90vh] bg-white dark:bg-slate-800 rounded-2xl shadow-2xl overflow-hidden" @click.stop>
        <button 
          @click="closePreview"
          class="absolute top-4 right-4 z-10 bg-black bg-opacity-50 hover:bg-opacity-70 text-white rounded-full w-10 h-10 flex items-center justify-center transition-all"
        >
          ✕
        </button>
        <div class="p-4 sm:p-6">
          <h3 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white mb-4">{{ previewTemplate.name }}</h3>
          <div class="relative bg-gray-100 dark:bg-slate-700 rounded-lg overflow-auto max-h-[70vh]">
            <img 
              :src="previewTemplate.image" 
              :alt="previewTemplate.name"
              class="w-full h-auto"
            />
          </div>
          <div class="mt-4 flex gap-3 justify-end">
            <button
              @click="closePreview"
              class="px-4 py-2 text-sm font-semibold text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white"
            >
              Fechar
            </button>
            <button
              @click="selectTemplateFromPreview"
              class="px-6 py-2 bg-purple-600 text-white rounded-lg text-sm font-semibold hover:bg-purple-500"
            >
              Usar Este Template
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      currentStep: 0,
      steps: ['Template', 'Conteúdo', 'Mídias', 'Pagamento'],
      form: { 
        title: '', 
        message: '', 
        template: 'template1',
        price_cents: 990 // R$ 9,90
      },
      templates: [
        { id: 1, value: 'template1', name: 'Template 1', icon: '💝', gradient: 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)', image: '/img/template1.png' },
        { id: 2, value: 'template2', name: 'Template 2', icon: '🎨', gradient: 'linear-gradient(135deg, #f093fb 0%, #f5576c 100%)', image: '/img/template2.png' },
        { id: 3, value: 'template3', name: 'Template 3', icon: '✨', gradient: 'linear-gradient(135deg, #4facfe 0%, #00f2fe 100%)', image: '/img/template3.png' },
        { id: 4, value: 'template4', name: 'Template 4', icon: '🌟', gradient: 'linear-gradient(135deg, #43e97b 0%, #38f9d7 100%)', image: '/img/template4.png' },
        { id: 5, value: 'template5', name: 'Template 5', icon: '🎁', gradient: 'linear-gradient(135deg, #fa709a 0%, #fee140 100%)', image: '/img/template5.png' }
      ],
      files: [],
      filePreviewUrls: {},
      created: null,
      loading: false,
      previewTemplate: null
    }
  },
  computed: {
    selectedTemplate() {
      return this.templates.find(t => t.value === this.form.template)
    },
    canProceed() {
      if (this.currentStep === 0) return true // template selection
      if (this.currentStep === 1) return this.form.title && this.form.message
      if (this.currentStep === 2) return true // media is optional
      return true
    }
  },
  methods: {
    nextStep() {
      if (this.canProceed && this.currentStep < this.steps.length - 1) {
        // Check if user is logged in before going to payment step
        if (this.currentStep === 2) {
          const token = localStorage.getItem('api_token')
          if (!token) {
            // Save form data to localStorage
            localStorage.setItem('draft_gift', JSON.stringify({
              title: this.form.title,
              message: this.form.message,
              template: this.form.template
            }))
            // Redirect to login
            this.$router.push('/login?redirect=/create')
            return
          }
        }
        this.currentStep++
      }
    },
    previousStep() {
      if (this.currentStep > 0) {
        this.currentStep--
      }
    },
    handleFiles(e) {
      const newFiles = Array.from(e.target.files)
      this.files = [...this.files, ...newFiles]
      
      // Create preview URLs for images
      newFiles.forEach(file => {
        if (file.type.startsWith('image/')) {
          this.filePreviewUrls[file.name] = URL.createObjectURL(file)
        }
      })
    },
    removeFile(index) {
      const file = this.files[index]
      if (this.filePreviewUrls[file.name]) {
        URL.revokeObjectURL(this.filePreviewUrls[file.name])
        delete this.filePreviewUrls[file.name]
      }
      this.files.splice(index, 1)
    },
    getFilePreview(file) {
      return this.filePreviewUrls[file.name]
    },
    openPreview(template) {
      this.previewTemplate = template
    },
    closePreview() {
      this.previewTemplate = null
    },
    selectTemplateFromPreview() {
      if (this.previewTemplate) {
        this.form.template = this.previewTemplate.value
        this.closePreview()
      }
    },
    async submit() {
      this.loading = true
      try {
        const fd = new FormData()
        fd.append('title', this.form.title)
        fd.append('message', this.form.message)
        fd.append('template', this.form.template)
        fd.append('price_cents', this.form.price_cents)
        this.files.forEach(f => fd.append('media[]', f))

        // Create the gift (token será adicionado automaticamente pelo interceptor)
        const res = await this.$axios.post('/api/gifts', fd)
        this.created = res.data.gift

        // Create Stripe checkout session
        const checkoutRes = await this.$axios.post(`/api/gifts/${this.created.slug}/checkout`, {})
        
        // Redirect to Stripe Checkout
        if (checkoutRes.data.url) {
          window.location.href = checkoutRes.data.url
        }
      } catch (error) {
        console.error('Error:', error)
        // O interceptor do axios já trata erros 401
        if (error.response?.status !== 401) {
          alert('Erro ao criar presente. Tente novamente.')
        }
        this.loading = false
      }
    }
  },
  mounted() {
    // Check for template in query params
    const templateId = this.$route.query.template
    if (templateId) {
      const template = this.templates.find(t => t.id == templateId)
      if (template) {
        this.form.template = template.value
      }
    }
    
    // Restore draft if exists
    const draft = localStorage.getItem('draft_gift')
    if (draft) {
      try {
        const data = JSON.parse(draft)
        this.form.title = data.title || ''
        this.form.message = data.message || ''
        // Only restore template from draft if not specified in query params
        if (!templateId) {
          this.form.template = data.template || 'template1'
        }
        localStorage.removeItem('draft_gift')
      } catch (e) {
        console.error('Error restoring draft:', e)
      }
    }
  },
  beforeUnmount() {
    // Clean up preview URLs
    Object.values(this.filePreviewUrls).forEach(url => URL.revokeObjectURL(url))
  }
}
</script>

<style scoped>
.sr-only {
  position: absolute;
  width: 1px;
  height: 1px;
  padding: 0;
  margin: -1px;
  overflow: hidden;
  clip: rect(0, 0, 0, 0);
  white-space: nowrap;
  border-width: 0;
}
</style>
