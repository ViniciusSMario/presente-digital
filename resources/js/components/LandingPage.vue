<template>
  <div class="min-h-screen bg-white dark:bg-slate-950">
    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 dark:from-slate-950 dark:via-purple-950 dark:to-slate-950 text-white">
      <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSI+PHBhdGggZD0iTTM2IDEzNGg0djRoLTR6Ii8+PC9nPjwvZz48L3N2Zz4=')] opacity-40"></div>
      
      <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 sm:py-24 md:py-32">
        <div class="max-w-4xl mx-auto text-center">
          <div class="inline-flex items-center gap-2 px-4 py-2 bg-purple-500/20 backdrop-blur-sm border border-purple-400/30 rounded-full text-sm text-purple-200 mb-8">
            <span class="w-2 h-2 bg-purple-400 rounded-full animate-pulse"></span>
            Plataforma de presentes digitais premium
          </div>
          
          <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold mb-6 sm:mb-8 leading-tight">
            Transforme memórias em
            <span class="block text-transparent bg-clip-text bg-gradient-to-r from-purple-400 via-pink-400 to-rose-400">
              experiências inesquecíveis
            </span>
          </h1>
          
          <p class="text-lg sm:text-xl md:text-2xl mb-12 text-gray-300 max-w-3xl mx-auto leading-relaxed">
            Crie presentes digitais sofisticados com fotos, vídeos e mensagens personalizadas. 
            Perfeito para aniversários, casamentos, aniversários de namoro e datas especiais.
          </p>
          
          <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <router-link 
              to="/create" 
              class="group relative inline-flex items-center gap-2 bg-gradient-to-r from-purple-600 to-pink-600 text-white px-8 py-4 rounded-xl font-semibold text-lg hover:shadow-2xl hover:shadow-purple-500/50 transition-all duration-300"
            >
              <span>Começar agora</span>
              <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
              </svg>
            </router-link>
            <a 
              href="#templates" 
              class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm text-white px-8 py-4 rounded-xl font-semibold text-lg hover:bg-white/20 transition-all duration-300 border border-white/20"
            >
              Ver templates
            </a>
          </div>
          
          <div class="mt-16 pt-16 border-t border-white/10">
            <div class="grid grid-cols-3 gap-8 max-w-2xl mx-auto">
              <div>
                <div class="text-3xl sm:text-4xl font-bold text-white mb-2">500+</div>
                <div class="text-sm text-gray-400">Presentes criados</div>
              </div>
              <div>
                <div class="text-3xl sm:text-4xl font-bold text-white mb-2">98%</div>
                <div class="text-sm text-gray-400">Satisfação</div>
              </div>
              <div>
                <div class="text-3xl sm:text-4xl font-bold text-white mb-2">4.9</div>
                <div class="text-sm text-gray-400">Avaliação média</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Gradient overlay -->
      <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-white dark:from-slate-950 to-transparent"></div>
    </section>

    <!-- Features Section -->
    <section class="py-20 sm:py-24 md:py-32 px-4 bg-white dark:bg-slate-950 transition-colors">
      <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
          <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-4 text-gray-900 dark:text-white">
            Tudo que você precisa para criar o presente perfeito
          </h2>
          <p class="text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
            Ferramentas profissionais para criar experiências digitais memoráveis
          </p>
        </div>
        
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
          <!-- Feature 1 -->
          <div class="group relative p-8 bg-gradient-to-br from-purple-50 to-pink-50 dark:from-slate-900 dark:to-purple-900/20 rounded-2xl border border-purple-100 dark:border-purple-900/30 hover:shadow-xl transition-all duration-300">
            <div class="w-12 h-12 bg-gradient-to-br from-purple-600 to-pink-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
              <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
              </svg>
            </div>
            <h3 class="text-xl font-bold mb-3 text-gray-900 dark:text-white">Galeria de mídia ilimitada</h3>
            <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
              Adicione quantas fotos e vídeos quiser. Armazenamento seguro em nuvem com qualidade preservada.
            </p>
          </div>

          <!-- Feature 2 -->
          <div class="group relative p-8 bg-gradient-to-br from-blue-50 to-cyan-50 dark:from-slate-900 dark:to-blue-900/20 rounded-2xl border border-blue-100 dark:border-blue-900/30 hover:shadow-xl transition-all duration-300">
            <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-cyan-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
              <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>
              </svg>
            </div>
            <h3 class="text-xl font-bold mb-3 text-gray-900 dark:text-white">Design personalizado</h3>
            <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
              Templates exclusivos criados por designers profissionais. Personalize cores, fontes e layouts.
            </p>
          </div>

          <!-- Feature 3 -->
          <div class="group relative p-8 bg-gradient-to-br from-emerald-50 to-teal-50 dark:from-slate-900 dark:to-emerald-900/20 rounded-2xl border border-emerald-100 dark:border-emerald-900/30 hover:shadow-xl transition-all duration-300">
            <div class="w-12 h-12 bg-gradient-to-br from-emerald-600 to-teal-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
              <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
              </svg>
            </div>
            <h3 class="text-xl font-bold mb-3 text-gray-900 dark:text-white">Privacidade garantida</h3>
            <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
              Seus presentes são criptografados e protegidos. Compartilhe apenas com quem você escolher.
            </p>
          </div>

          <!-- Feature 4 -->
          <div class="group relative p-8 bg-gradient-to-br from-rose-50 to-orange-50 dark:from-slate-900 dark:to-rose-900/20 rounded-2xl border border-rose-100 dark:border-rose-900/30 hover:shadow-xl transition-all duration-300">
            <div class="w-12 h-12 bg-gradient-to-br from-rose-600 to-orange-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
              <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
              </svg>
            </div>
            <h3 class="text-xl font-bold mb-3 text-gray-900 dark:text-white">Entrega instantânea</h3>
            <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
              Compartilhe via link em segundos. Funciona em qualquer dispositivo, sem necessidade de apps.
            </p>
          </div>

          <!-- Feature 5 -->
          <div class="group relative p-8 bg-gradient-to-br from-amber-50 to-yellow-50 dark:from-slate-900 dark:to-amber-900/20 rounded-2xl border border-amber-100 dark:border-amber-900/30 hover:shadow-xl transition-all duration-300">
            <div class="w-12 h-12 bg-gradient-to-br from-amber-600 to-yellow-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
              <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>
              </svg>
            </div>
            <h3 class="text-xl font-bold mb-3 text-gray-900 dark:text-white">Trilha sonora personalizada</h3>
            <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
              Adicione músicas especiais que tenham significado para vocês. Crie a atmosfera perfeita.
            </p>
          </div>

          <!-- Feature 6 -->
          <div class="group relative p-8 bg-gradient-to-br from-violet-50 to-purple-50 dark:from-slate-900 dark:to-violet-900/20 rounded-2xl border border-violet-100 dark:border-violet-900/30 hover:shadow-xl transition-all duration-300">
            <div class="w-12 h-12 bg-gradient-to-br from-violet-600 to-purple-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
              <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
              </svg>
            </div>
            <h3 class="text-xl font-bold mb-3 text-gray-900 dark:text-white">Validade permanente</h3>
            <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
              Seus presentes ficam salvos para sempre. Reviva memórias especiais quando quiser.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Templates Section -->
    <section id="templates" class="py-20 sm:py-24 md:py-32 px-4 bg-gray-50 dark:bg-slate-900">
      <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
          <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-4 text-gray-900 dark:text-white">
            Templates premium para cada ocasião
          </h2>
          <p class="text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
            Designs exclusivos criados por profissionais. Escolha o estilo perfeito para sua mensagem.
          </p>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6">
          <div 
            v-for="template in templates" 
            :key="template.id"
            class="group relative overflow-hidden rounded-2xl border-2 border-gray-200 dark:border-slate-700 hover:border-purple-500 dark:hover:border-purple-400 transition-all cursor-pointer hover:shadow-2xl"
          >
            <div class="aspect-[3/4] bg-gradient-to-br relative overflow-hidden" :style="{ backgroundImage: template.gradient }">
              <!-- Template Image if available -->
              <img 
                v-if="template.image" 
                :src="template.image" 
                :alt="template.name"
                class="absolute inset-0 w-full h-full object-cover"
              />
              <!-- Fallback with icon and gradient -->
              <div v-else class="absolute inset-0 flex items-center justify-center p-6 text-white">
                <div class="text-center">
                  <div class="text-5xl mb-4 opacity-80">{{ template.icon }}</div>
                  <div class="text-sm font-semibold">{{ template.name }}</div>
                </div>
              </div>
              
              <!-- Hover overlay -->
              <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex flex-col items-center justify-end p-6 text-white">
                <h3 class="text-lg font-bold mb-2">{{ template.name }}</h3>
                <p class="text-sm text-center mb-4 text-gray-200">{{ template.description }}</p>
                <div class="flex flex-col gap-2 w-full">
                  <button
                    v-if="template.image"
                    @click.stop="openPreview(template)"
                    class="w-full bg-white/20 backdrop-blur-sm text-white px-4 py-2.5 rounded-lg text-sm font-semibold hover:bg-white/30 transition-all border border-white/30"
                  >
                    Ver prévia completa
                  </button>
                  <router-link 
                    :to="`/create?template=${template.id}`"
                    class="w-full bg-gradient-to-r from-purple-600 to-pink-600 text-white px-4 py-2.5 rounded-lg text-sm font-semibold hover:shadow-lg hover:shadow-purple-500/50 transition-all text-center"
                  >
                    Usar este template
                  </router-link>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="mt-12 text-center">
          <p class="text-gray-600 dark:text-gray-400">
            Mais templates sendo adicionados regularmente
          </p>
        </div>
      </div>
    </section>

    <!-- How it Works Section -->
    <section id="como-funciona" class="py-20 sm:py-24 md:py-32 px-4 bg-white dark:bg-slate-950 transition-colors">
      <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
          <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-4 text-gray-900 dark:text-white">
            Simples, rápido e profissional
          </h2>
          <p class="text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
            Crie seu presente em minutos seguindo estes passos
          </p>
        </div>
        
        <div class="relative">
          <!-- Connection line -->
          <div class="hidden lg:block absolute top-16 left-0 right-0 h-0.5 bg-gradient-to-r from-purple-200 via-pink-200 to-purple-200 dark:from-purple-900 dark:via-pink-900 dark:to-purple-900" style="top: 4rem;"></div>
          
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-4 relative">
            <!-- Step 1 -->
            <div class="relative">
              <div class="flex flex-col items-center text-center">
                <div class="relative z-10 w-16 h-16 bg-gradient-to-br from-purple-600 to-pink-600 text-white rounded-2xl flex items-center justify-center text-2xl font-bold mb-6 shadow-xl">
                  1
                </div>
                <div class="w-12 h-12 bg-gradient-to-br from-purple-100 to-pink-100 dark:from-purple-900/30 dark:to-pink-900/30 rounded-xl flex items-center justify-center mb-4">
                  <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                  </svg>
                </div>
                <h3 class="text-lg font-bold mb-2 text-gray-900 dark:text-white">Escolha o template</h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">
                  Selecione entre designs premium criados por profissionais
                </p>
              </div>
            </div>

            <!-- Step 2 -->
            <div class="relative">
              <div class="flex flex-col items-center text-center">
                <div class="relative z-10 w-16 h-16 bg-gradient-to-br from-blue-600 to-cyan-600 text-white rounded-2xl flex items-center justify-center text-2xl font-bold mb-6 shadow-xl">
                  2
                </div>
                <div class="w-12 h-12 bg-gradient-to-br from-blue-100 to-cyan-100 dark:from-blue-900/30 dark:to-cyan-900/30 rounded-xl flex items-center justify-center mb-4">
                  <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                  </svg>
                </div>
                <h3 class="text-lg font-bold mb-2 text-gray-900 dark:text-white">Personalize o conteúdo</h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">
                  Adicione fotos, vídeos, mensagens e músicas especiais
                </p>
              </div>
            </div>

            <!-- Step 3 -->
            <div class="relative">
              <div class="flex flex-col items-center text-center">
                <div class="relative z-10 w-16 h-16 bg-gradient-to-br from-emerald-600 to-teal-600 text-white rounded-2xl flex items-center justify-center text-2xl font-bold mb-6 shadow-xl">
                  3
                </div>
                <div class="w-12 h-12 bg-gradient-to-br from-emerald-100 to-teal-100 dark:from-emerald-900/30 dark:to-teal-900/30 rounded-xl flex items-center justify-center mb-4">
                  <svg class="w-6 h-6 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                  </svg>
                </div>
                <h3 class="text-lg font-bold mb-2 text-gray-900 dark:text-white">Compartilhe</h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">
                  Gere um link único e compartilhe por WhatsApp, e-mail ou redes sociais
                </p>
              </div>
            </div>

            <!-- Step 4 -->
            <div class="relative">
              <div class="flex flex-col items-center text-center">
                <div class="relative z-10 w-16 h-16 bg-gradient-to-br from-rose-600 to-orange-600 text-white rounded-2xl flex items-center justify-center text-2xl font-bold mb-6 shadow-xl">
                  4
                </div>
                <div class="w-12 h-12 bg-gradient-to-br from-rose-100 to-orange-100 dark:from-rose-900/30 dark:to-orange-900/30 rounded-xl flex items-center justify-center mb-4">
                  <svg class="w-6 h-6 text-rose-600 dark:text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                  </svg>
                </div>
                <h3 class="text-lg font-bold mb-2 text-gray-900 dark:text-white">Emocione</h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">
                  A pessoa especial receberá uma experiência digital inesquecível
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section class="relative py-20 sm:py-24 md:py-32 px-4 bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 dark:from-slate-950 dark:via-purple-950 dark:to-slate-950 text-white overflow-hidden">
      <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSI+PHBhdGggZD0iTTM2IDEzNGg0djRoLTR6Ii8+PC9nPjwvZz48L3N2Zz4=')] opacity-40"></div>
      
      <div class="relative max-w-4xl mx-auto text-center">
        <div class="inline-flex items-center gap-2 px-4 py-2 bg-purple-500/20 backdrop-blur-sm border border-purple-400/30 rounded-full text-sm text-purple-200 mb-8">
          <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"/>
          </svg>
          Comece em menos de 5 minutos
        </div>
        
        <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
          Crie memórias que duram para sempre
        </h2>
        
        <p class="text-lg sm:text-xl text-gray-300 mb-10 max-w-2xl mx-auto leading-relaxed">
          Junte-se a centenas de pessoas que já surpreenderam seus entes queridos com presentes digitais únicos
        </p>
        
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-12">
          <router-link 
            to="/create" 
            class="group relative inline-flex items-center gap-2 bg-white text-purple-900 px-10 py-4 rounded-xl font-semibold text-lg hover:shadow-2xl hover:shadow-white/30 transition-all duration-300"
          >
            <span>Criar presente agora</span>
            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
            </svg>
          </router-link>
          <router-link 
            to="/login" 
            class="inline-flex items-center gap-2 text-white hover:text-purple-300 transition-colors"
          >
            <span>Já tem uma conta? Fazer login</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
          </router-link>
        </div>
        
        <!-- Trust indicators -->
        <div class="flex flex-wrap justify-center items-center gap-8 pt-8 border-t border-white/10">
          <div class="flex items-center gap-2 text-gray-400">
            <svg class="w-5 h-5 text-emerald-400" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            <span class="text-sm">Pagamento seguro</span>
          </div>
          <div class="flex items-center gap-2 text-gray-400">
            <svg class="w-5 h-5 text-emerald-400" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            <span class="text-sm">Dados criptografados</span>
          </div>
          <div class="flex items-center gap-2 text-gray-400">
            <svg class="w-5 h-5 text-emerald-400" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            <span class="text-sm">Suporte dedicado</span>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-950 text-gray-400 py-12 px-4 border-t border-slate-800">
      <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
          <div>
            <h3 class="text-white font-bold text-lg mb-4">PresenteiAI</h3>
            <p class="text-sm leading-relaxed">
              Crie experiências digitais memoráveis para quem você ama.
            </p>
          </div>
          <div>
            <h4 class="text-white font-semibold mb-4">Produto</h4>
            <ul class="space-y-2 text-sm">
              <li><a href="#templates" class="hover:text-white transition-colors">Templates</a></li>
              <li><a href="#como-funciona" class="hover:text-white transition-colors">Como funciona</a></li>
              <li><router-link to="/create" class="hover:text-white transition-colors">Criar presente</router-link></li>
            </ul>
          </div>
          <div>
            <h4 class="text-white font-semibold mb-4">Empresa</h4>
            <ul class="space-y-2 text-sm">
              <li><a href="#" class="hover:text-white transition-colors">Sobre nós</a></li>
              <li><a href="#" class="hover:text-white transition-colors">Contato</a></li>
              <li><a href="#" class="hover:text-white transition-colors">Blog</a></li>
            </ul>
          </div>
          <div>
            <h4 class="text-white font-semibold mb-4">Legal</h4>
            <ul class="space-y-2 text-sm">
              <li><a href="#" class="hover:text-white transition-colors">Privacidade</a></li>
              <li><a href="#" class="hover:text-white transition-colors">Termos de uso</a></li>
              <li><a href="#" class="hover:text-white transition-colors">Cookies</a></li>
            </ul>
          </div>
        </div>
        <div class="pt-8 border-t border-slate-800 text-center text-sm">
          <p>© 2025 PresenteiAI. Todos os direitos reservados.</p>
        </div>
      </div>
    </footer>

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
            <router-link 
              :to="`/create?template=${previewTemplate.id}`"
              class="px-6 py-2 bg-purple-600 text-white rounded-lg text-sm font-semibold hover:bg-purple-500"
            >
              Usar Este Template
            </router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const previewTemplate = ref(null)

const templates = ref([
  {
    id: 1,
    name: 'Luxo Premium',
    icon: '✨',
    gradient: 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)',
    description: 'Design sofisticado com elegância atemporal',
    image: '/img/template1.png'
  },
  {
    id: 2,
    name: 'Scrapbook Criativo',
    icon: '📸',
    gradient: 'linear-gradient(135deg, #f093fb 0%, #f5576c 100%)',
    description: 'Estilo vintage com toque artesanal',
    image: '/img/template2.png'
  },
  {
    id: 3,
    name: 'Minimalista Moderno',
    icon: '⬡',
    gradient: 'linear-gradient(135deg, #4facfe 0%, #00f2fe 100%)',
    description: 'Design clean e contemporâneo',
    image: '/img/template3.png'
  },
  {
    id: 4,
    name: 'Natureza Botânica',
    icon: '🌿',
    gradient: 'linear-gradient(135deg, #43e97b 0%, #38f9d7 100%)',
    description: 'Inspirado na beleza natural',
    image: '/img/template4.png'
  },
  {
    id: 5,
    name: 'Romance Vintage',
    icon: '💌',
    gradient: 'linear-gradient(135deg, #fa709a 0%, #fee140 100%)',
    description: 'Charme clássico e romântico',
    image: '/img/template5.png'
  }
])

const openPreview = (template) => {
  previewTemplate.value = template
}

const closePreview = () => {
  previewTemplate.value = null
}
</script>

<style scoped>
/* Smooth animations */
@keyframes fade-in {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.animate-fade-in {
  animation: fade-in 0.6s ease-out;
}
</style>
