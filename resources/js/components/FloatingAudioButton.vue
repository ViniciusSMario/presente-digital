<template>
  <div v-if="hasAudio" class="fixed bottom-6 right-6 z-50">
    <button
      @click="toggleAllAudio"
      class="w-14 h-14 sm:w-16 sm:h-16 rounded-full bg-gradient-to-br from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white flex items-center justify-center shadow-2xl transition-all transform hover:scale-110 active:scale-95 animate-pulse"
      :class="{ 'animate-none': isPlaying }"
      :title="isPlaying ? 'Pausar áudio' : 'Tocar áudio'"
    >
      <svg v-if="isPlaying" class="w-6 h-6 sm:w-7 sm:h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
      <svg v-else class="w-6 h-6 sm:w-7 sm:h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
        <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
    </button>
  </div>
</template>

<script>
export default {
  name: 'FloatingAudioButton',
  data() {
    return {
      audioElements: [],
      isPlaying: false,
      hasAudio: false
    }
  },
  mounted() {
    this.findAudioElements()
    this.setupListeners()
    
    // Verificar periodicamente por novos elementos de áudio (caso sejam carregados dinamicamente)
    this.checkInterval = setInterval(() => {
      this.findAudioElements()
    }, 1000)
  },
  beforeUnmount() {
    if (this.checkInterval) {
      clearInterval(this.checkInterval)
    }
    this.removeListeners()
  },
  methods: {
    findAudioElements() {
      // Encontrar todos os elementos de áudio na página
      const audios = document.querySelectorAll('audio')
      this.audioElements = Array.from(audios)
      this.hasAudio = this.audioElements.length > 0
      
      // Verificar estado inicial
      this.updatePlayingState()
    },
    setupListeners() {
      // Adicionar listeners para mudanças de estado
      this.audioElements.forEach(audio => {
        audio.addEventListener('play', this.updatePlayingState)
        audio.addEventListener('pause', this.updatePlayingState)
        audio.addEventListener('ended', this.updatePlayingState)
      })
    },
    removeListeners() {
      this.audioElements.forEach(audio => {
        audio.removeEventListener('play', this.updatePlayingState)
        audio.removeEventListener('pause', this.updatePlayingState)
        audio.removeEventListener('ended', this.updatePlayingState)
      })
    },
    updatePlayingState() {
      // Verificar se pelo menos um áudio está tocando
      this.isPlaying = this.audioElements.some(audio => !audio.paused && !audio.ended)
    },
    toggleAllAudio() {
      if (this.audioElements.length === 0) return
      
      // Se algum está tocando, pausar todos
      if (this.isPlaying) {
        this.audioElements.forEach(audio => {
          audio.pause()
        })
        this.isPlaying = false
      } else {
        // Tocar todos os áudios (ou apenas o primeiro, dependendo do comportamento desejado)
        // Vou tocar apenas o primeiro para evitar múltiplos áudios simultâneos
        const firstAudio = this.audioElements[0]
        if (firstAudio) {
          firstAudio.play().then(() => {
            this.isPlaying = true
          }).catch((error) => {
            console.log('Erro ao tocar áudio:', error)
          })
        }
      }
    }
  }
}
</script>

<style scoped>
@keyframes pulse {
  0%, 100% {
    opacity: 1;
    transform: scale(1);
  }
  50% {
    opacity: 0.8;
    transform: scale(1.05);
  }
}

.animate-pulse {
  animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}
</style>

