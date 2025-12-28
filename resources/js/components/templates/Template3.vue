<template>
  <div class="min-h-screen bg-gradient-to-br from-blue-500 via-cyan-400 to-teal-400 flex items-center justify-center p-2 sm:p-4 md:p-6 relative overflow-hidden">
    <!-- Animated waves -->
    <div class="wave-container">
      <svg class="wave" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="wave-path"></path>
      </svg>
      <svg class="wave wave2" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="wave-path"></path>
      </svg>
    </div>
    
    <div class="max-w-6xl w-full relative z-10">
      <!-- Main card -->
      <div class="bg-white rounded-xl sm:rounded-2xl md:rounded-3xl shadow-2xl overflow-hidden">
        <!-- Hero section -->
        <div class="relative bg-gradient-to-r from-blue-600 via-cyan-600 to-blue-600 p-6 sm:p-8 md:p-12 text-center overflow-hidden">
          <!-- Light rays effect -->
          <div class="absolute inset-0 opacity-30">
            <div class="light-ray" style="left: 20%"></div>
            <div class="light-ray" style="left: 50%"></div>
            <div class="light-ray" style="left: 80%"></div>
          </div>
          <div class="hidden sm:block absolute top-4 left-4 text-2xl md:text-3xl">⭐</div>
          <div class="hidden sm:block absolute top-4 right-4 text-2xl md:text-3xl">⭐</div>
          <div class="hidden md:block absolute bottom-4 left-1/4 text-2xl">✨</div>
          <div class="hidden md:block absolute bottom-4 right-1/4 text-2xl">✨</div>
          
          <div class="text-5xl sm:text-6xl md:text-7xl mb-4 md:mb-6">🎁</div>
          <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-3 px-4">{{ gift.title }}</h1>
          <div class="w-24 h-1 bg-white mx-auto rounded-full"></div>
        </div>
        
        <!-- Message section -->
        <div class="p-4 sm:p-6 md:p-8 lg:p-12">
          <div class="max-w-3xl mx-auto">
            <div class="minimal-message-container">
              <div class="minimal-accent-line"></div>
              <p class="minimal-message">{{ gift.message }}</p>
            </div>
            
            <!-- Media section -->
            <div v-if="visualMedia.length || audioMedia.length" class="space-y-6">
              <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-4 md:mb-6 text-center">Momentos Especiais</h2>
              
              <!-- Carousel -->
              <div v-if="visualMedia.length" class="relative">
                <div class="overflow-hidden rounded-xl shadow-lg bg-gradient-to-br from-blue-100 to-cyan-100">
                  <transition name="fade" mode="out-in">
                    <img 
                      v-if="currentMedia.type === 'image'"
                      :key="currentMedia.id"
                      :src="`/storage/${currentMedia.path}`" 
                      class="w-full h-56 sm:h-64 md:h-80 object-cover"
                      :alt="gift.title"
                    />
                    <video 
                      v-else-if="currentMedia.type === 'video'"
                      :key="currentMedia.id"
                      :src="`/storage/${currentMedia.path}`" 
                      controls 
                      class="w-full h-56 sm:h-64 md:h-80 object-contain bg-black"
                    />
                  </transition>
                </div>
                
                <!-- Navigation -->
                <button
                  v-if="visualMedia.length > 1"
                  @click="prev"
                  class="absolute left-3 top-1/2 -translate-y-1/2 bg-white hover:bg-blue-50 rounded-full p-3 shadow-lg transition"
                >
                  ◀
                </button>
                <button
                  v-if="visualMedia.length > 1"
                  @click="next"
                  class="absolute right-3 top-1/2 -translate-y-1/2 bg-white hover:bg-blue-50 rounded-full p-3 shadow-lg transition"
                >
                  ▶
                </button>
                
                <!-- Dots -->
                <div v-if="visualMedia.length > 1" class="flex justify-center gap-2 mt-4">
                  <button
                    v-for="(m, i) in visualMedia"
                    :key="m.id"
                    @click="index = i"
                    class="w-3 h-3 rounded-full transition"
                    :class="index === i ? 'bg-blue-600 scale-110' : 'bg-blue-200'"
                  />
                </div>
              </div>
              
              <!-- Audio -->
              <div v-if="audioMedia.length" class="space-y-4">
                <div 
                  v-for="m in audioMedia" 
                  :key="m.id"
                  class="bg-gradient-to-r from-blue-100 to-cyan-100 rounded-xl p-6 shadow-md"
                >
                  <div class="flex items-center mb-3">
                    <div class="text-3xl mr-3">🎼</div>
                    <p class="text-lg font-medium text-gray-700">Mensagem de Áudio</p>
                  </div>
                  <audio :src="`/storage/${m.path}`" controls class="w-full"></audio>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Footer -->
        <div class="bg-gradient-to-r from-blue-50 to-cyan-50 p-6 text-center border-t border-blue-100">
          <p class="text-gray-600 font-medium">💙 Presente Digital 💙</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['gift'],
  data() {
    return { index: 0 }
  },
  computed: {
    visualMedia() {
      return this.gift.media?.filter(m => ['image', 'video'].includes(m.type)) || []
    },
    audioMedia() {
      return this.gift.media?.filter(m => m.type === 'audio') || []
    },
    currentMedia() {
      return this.visualMedia[this.index]
    }
  },
  methods: {
    next() {
      this.index = (this.index + 1) % this.visualMedia.length
    },
    prev() {
      this.index = (this.index - 1 + this.visualMedia.length) % this.visualMedia.length
    }
  }
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=Space+Grotesk:wght@400;600&display=swap');

.minimal-label {
  font-family: 'Space Grotesk', sans-serif;
  font-size: 0.75rem;
  letter-spacing: 0.5em;
  color: #67e8f9;
  font-weight: 600;
  text-transform: uppercase;
  margin-bottom: 1.5rem;
}

.minimal-title {
  font-family: 'Inter', sans-serif;
  font-size: clamp(2.5rem, 6vw, 5rem);
  font-weight: 300;
  color: white;
  letter-spacing: -0.02em;
  line-height: 1.1;
  margin-bottom: 2rem;
}

.minimal-ornament {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 1rem;
}

.ornament-line {
  width: 3rem;
  height: 1px;
  background: linear-gradient(to right, transparent, #22d3ee);
}

.ornament-line:last-child {
  background: linear-gradient(to left, transparent, #22d3ee);
}

.ornament-dot {
  width: 0.5rem;
  height: 0.5rem;
  background: #22d3ee;
  border-radius: 50%;
  box-shadow: 0 0 10px #22d3ee;
}

.minimal-message-container {
  background: linear-gradient(135deg, rgba(239, 246, 255, 0.95), rgba(224, 242, 254, 0.95));
  border-radius: 0;
  padding: 3rem 2rem;
  position: relative;
  margin: 2rem 0;
}

.minimal-accent-line {
  position: absolute;
  left: 0;
  top: 0;
  bottom: 0;
  width: 3px;
  background: linear-gradient(to bottom, #3b82f6, #06b6d4);
}

.minimal-message {
  font-family: 'Inter', sans-serif;
  font-size: clamp(1.125rem, 2vw, 1.375rem);
  color: #1e293b;
  line-height: 1.8;
  white-space: pre-line;
  font-weight: 400;
  letter-spacing: 0.01em;
}

.wave-container {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  overflow: hidden;
  line-height: 0;
  pointer-events: none;
}

.wave {
  position: relative;
  display: block;
  width: calc(100% + 1.3px);
  height: 150px;
}

.wave2 {
  position: absolute;
  bottom: 0;
  left: 0;
}

.wave-path {
  fill: rgba(255, 255, 255, 0.1);
  animation: wave-motion 8s cubic-bezier(0.36, 0.45, 0.63, 0.53) infinite;
}

@keyframes wave-motion {
  0% { transform: translateX(0); }
  50% { transform: translateX(-25%); }
  100% { transform: translateX(0); }
}

.light-ray {
  position: absolute;
  top: -50%;
  width: 2px;
  height: 200%;
  background: linear-gradient(to bottom, transparent, rgba(255,255,255,0.3), transparent);
  animation: light-shine 4s ease-in-out infinite;
}

@keyframes light-shine {
  0%, 100% { transform: translateY(-20%) scaleY(0.5); opacity: 0; }
  50% { transform: translateY(0) scaleY(1); opacity: 1; }
}

.light-ray:nth-child(2) { animation-delay: 1.3s; }
.light-ray:nth-child(3) { animation-delay: 2.6s; }

.fade-enter-active, .fade-leave-active {
  transition: opacity 0.3s ease;
}
.fade-enter-from, .fade-leave-to {
  opacity: 0;
}
</style>
