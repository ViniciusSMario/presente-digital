<template>
  <div class="audio-player-container bg-gradient-to-br from-purple-100 to-pink-100 dark:from-purple-900/30 dark:to-pink-900/30 rounded-xl p-4 sm:p-6 shadow-lg">
    <div class="flex items-center gap-4">
      <!-- Play/Pause Button -->
      <button
        @click="togglePlay"
        class="flex-shrink-0 w-12 h-12 sm:w-14 sm:h-14 rounded-full bg-purple-600 hover:bg-purple-700 text-white flex items-center justify-center shadow-lg transition-all transform hover:scale-110 active:scale-95"
        :disabled="loading"
        :title="isPlaying ? 'Pausar' : 'Tocar'"
      >
        <svg v-if="loading" class="w-6 h-6 animate-spin" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
        </svg>
        <svg v-else-if="isPlaying" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <svg v-else class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
      </button>

      <!-- Audio Info and Controls -->
      <div class="flex-1 min-w-0">
        <div class="flex items-center gap-2 mb-2">
          <svg class="w-5 h-5 text-purple-600 dark:text-purple-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
          </svg>
          <span class="text-sm font-semibold text-gray-700 dark:text-gray-300 truncate">Áudio</span>
        </div>
        
        <!-- Progress Bar -->
        <div class="relative h-2 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden mb-2">
          <div 
            class="absolute left-0 top-0 h-full bg-gradient-to-r from-purple-500 to-pink-500 transition-all duration-300"
            :style="{ width: progressPercent + '%' }"
          ></div>
        </div>
        
        <!-- Time Display -->
        <div class="flex justify-between text-xs text-gray-600 dark:text-gray-400">
          <span>{{ formatTime(currentTime) }}</span>
          <span>{{ formatTime(duration) }}</span>
        </div>
      </div>

      <!-- Volume Control (optional) -->
      <div class="hidden sm:flex items-center gap-2">
        <button
          @click="toggleMute"
          class="p-2 text-gray-600 dark:text-gray-400 hover:text-purple-600 dark:hover:text-purple-400 transition-colors"
        >
          <svg v-if="isMuted || volume === 0" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2" />
          </svg>
          <svg v-else class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 14.142M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" />
          </svg>
        </button>
      </div>
    </div>

    <!-- Hidden audio element -->
    <audio
      ref="audioElement"
      :src="src"
      @loadedmetadata="onLoadedMetadata"
      @timeupdate="onTimeUpdate"
      @ended="onEnded"
      @error="onError"
      preload="metadata"
    />
  </div>
</template>

<script>
export default {
  name: 'AudioPlayer',
  props: {
    src: {
      type: String,
      required: true
    }
  },
  data() {
    return {
      isPlaying: false,
      currentTime: 0,
      duration: 0,
      volume: 1,
      isMuted: false,
      loading: true
    }
  },
  computed: {
    progressPercent() {
      if (this.duration === 0) return 0
      return (this.currentTime / this.duration) * 100
    }
  },
  async mounted() {
    // Auto-play quando o componente é montado
    await this.$nextTick()
    
    if (this.$refs.audioElement) {
      // Aguardar metadata carregar antes de tentar tocar
      const audio = this.$refs.audioElement
      
      const tryPlay = () => {
        audio.play().then(() => {
          this.isPlaying = true
          this.loading = false
        }).catch((error) => {
          // Alguns navegadores bloqueiam autoplay, então apenas marca como não tocando
          // O usuário precisará clicar no botão para tocar
          console.log('Autoplay bloqueado pelo navegador. Clique no botão para tocar.')
          this.loading = false
        })
      }
      
      if (audio.readyState >= 1) {
        // Metadata já carregou
        tryPlay()
      } else {
        // Aguardar metadata carregar
        audio.addEventListener('loadedmetadata', tryPlay, { once: true })
      }
    }
  },
  methods: {
    togglePlay() {
      if (this.loading) return
      
      if (this.isPlaying) {
        this.$refs.audioElement.pause()
        this.isPlaying = false
      } else {
        this.$refs.audioElement.play().then(() => {
          this.isPlaying = true
        }).catch((error) => {
          console.error('Erro ao tocar áudio:', error)
        })
      }
    },
    toggleMute() {
      this.isMuted = !this.isMuted
      this.$refs.audioElement.muted = this.isMuted
    },
    onLoadedMetadata() {
      this.duration = this.$refs.audioElement.duration
      this.loading = false
    },
    onTimeUpdate() {
      this.currentTime = this.$refs.audioElement.currentTime
    },
    onEnded() {
      this.isPlaying = false
      this.currentTime = 0
    },
    onError() {
      this.loading = false
      console.error('Error loading audio')
    },
    formatTime(seconds) {
      if (!isFinite(seconds) || isNaN(seconds)) return '0:00'
      const mins = Math.floor(seconds / 60)
      const secs = Math.floor(seconds % 60)
      return `${mins}:${secs.toString().padStart(2, '0')}`
    }
  },
  beforeUnmount() {
    if (this.$refs.audioElement) {
      this.$refs.audioElement.pause()
      this.$refs.audioElement.src = ''
    }
  }
}
</script>

<style scoped>
.audio-player-container {
  transition: all 0.3s ease;
}

.audio-player-container:hover {
  transform: translateY(-2px);
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
}
</style>

