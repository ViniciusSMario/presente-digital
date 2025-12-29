<template>
  <div class="min-h-screen bg-gradient-to-br from-green-400 via-emerald-500 to-teal-600 p-3 sm:p-4 md:p-6 lg:p-8 relative overflow-hidden">
    <!-- Floating leaves -->
    <div class="leaves-container">
      <div class="leaf" style="left: 5%; animation-delay: 0s">🍃</div>
      <div class="leaf" style="left: 25%; animation-delay: 2s">🌿</div>
      <div class="leaf" style="left: 45%; animation-delay: 4s">🍃</div>
      <div class="leaf" style="left: 65%; animation-delay: 1s">🌿</div>
      <div class="leaf" style="left: 85%; animation-delay: 3s">🍃</div>
    </div>
    
    <!-- Glowing orbs -->
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>
    <div class="max-w-5xl mx-auto">
      <!-- Header with animation -->
      <div class="text-center mb-8 md:mb-12 animate-fade-in">
        <div class="flex justify-center space-x-2 sm:space-x-3 text-3xl sm:text-4xl md:text-5xl mb-4 md:mb-6">
          <span class="animate-pulse">🌟</span>
          <span class="animate-pulse" style="animation-delay: 0.2s">💚</span>
          <span class="animate-pulse" style="animation-delay: 0.4s">🌟</span>
        </div>
        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-bold text-white mb-4 drop-shadow-2xl px-4">{{ gift.title }}</h1>
        <div class="flex justify-center space-x-2">
          <div class="w-3 h-3 bg-white rounded-full"></div>
          <div class="w-3 h-3 bg-white rounded-full"></div>
          <div class="w-3 h-3 bg-white rounded-full"></div>
        </div>
      </div>
      
      <!-- Content container -->
      <div class="space-y-6 md:space-y-8">
        <!-- Message box -->
        <div class="botanical-message-card">
          <div class="botanical-message-header">
            <span class="botanical-icon">🌿</span>
            <h2 class="botanical-message-title">Mensagem Especial</h2>
            <span class="botanical-icon">🌿</span>
          </div>
          <p class="botanical-message-text">{{ gift.message }}</p>
          <div class="botanical-flourish">✿ ✿ ✿</div>
        </div>
        
        <!-- Media section -->
        <div v-if="imageMedia.length || videoMedia.length || audioMedia.length">
          <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white text-center mb-6 md:mb-8 drop-shadow-lg px-4">📸 Galeria de Memórias</h2>
          
          <!-- Images Carousel -->
          <div v-if="imageMedia.length" class="mb-6 md:mb-8">
            <div class="relative bg-white rounded-2xl overflow-hidden shadow-2xl">
              <transition name="fade" mode="out-in">
                <img 
                  :key="currentImage.id"
                  :src="`/storage/${currentImage.path}`" 
                  class="w-full h-64 sm:h-80 md:h-96 object-cover"
                  :alt="gift.title"
                />
              </transition>
              
              <!-- Navigation -->
              <button
                v-if="imageMedia.length > 1"
                @click="prevImage"
                class="absolute left-3 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white rounded-full p-3 shadow-lg transition z-10"
              >
                ◀
              </button>
              <button
                v-if="imageMedia.length > 1"
                @click="nextImage"
                class="absolute right-3 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white rounded-full p-3 shadow-lg transition z-10"
              >
                ▶
              </button>
            </div>
            
            <!-- Dots -->
            <div v-if="imageMedia.length > 1" class="flex justify-center gap-2 mt-4">
              <button
                v-for="(m, i) in imageMedia"
                :key="m.id"
                @click="imageIndex = i"
                class="w-3 h-3 rounded-full transition"
                :class="imageIndex === i ? 'bg-emerald-500 scale-110' : 'bg-white/60'"
              />
            </div>
          </div>
          
          <!-- Video Players -->
          <div v-if="videoMedia.length" class="space-y-6 mb-6 md:mb-8">
            <div 
              v-for="video in videoMedia" 
              :key="video.id"
              class="bg-white rounded-2xl overflow-hidden shadow-2xl"
            >
              <video
                :src="`/storage/${video.path}`"
                controls
                class="w-full max-h-[600px] object-contain bg-black"
                preload="metadata"
              >
                Seu navegador não suporta vídeo.
              </video>
            </div>
          </div>
          
          <!-- Audio Players -->
          <div v-if="audioMedia.length" class="space-y-4">
            <AudioPlayer
              v-for="audio in audioMedia"
              :key="audio.id"
              :src="`/storage/${audio.path}`"
            />
          </div>
        </div>
      </div>
      
      <!-- Footer -->
      <div class="text-center mt-16">
        <div class="inline-block bg-white/20 backdrop-blur-md rounded-full px-8 py-4">
          <p class="text-white text-lg font-semibold">✨ Feito com carinho ✨</p>
        </div>
      </div>
    </div>
    
    <!-- Floating Audio Button -->
    <FloatingAudioButton v-if="audioMedia.length" />
  </div>
</template>

<script>
import AudioPlayer from '../AudioPlayer.vue'
import FloatingAudioButton from '../FloatingAudioButton.vue'

export default {
  components: {
    AudioPlayer,
    FloatingAudioButton
  },
  props: ['gift'],
  data() {
    return { imageIndex: 0 }
  },
  computed: {
    imageMedia() {
      return this.gift.media?.filter(m => m.type === 'image') || []
    },
    videoMedia() {
      return this.gift.media?.filter(m => m.type === 'video') || []
    },
    audioMedia() {
      return this.gift.media?.filter(m => m.type === 'audio') || []
    },
    currentImage() {
      return this.imageMedia[this.imageIndex] || {}
    }
  },
  methods: {
    nextImage() {
      this.imageIndex = (this.imageIndex + 1) % this.imageMedia.length
    },
    prevImage() {
      this.imageIndex = (this.imageIndex - 1 + this.imageMedia.length) % this.imageMedia.length
    }
  }
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,600;1,400&family=Raleway:wght@300;400;600&display=swap');

.botanical-card {
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(12px);
  border-radius: 1.5rem;
  padding: 3rem 2rem;
  border: 1px solid rgba(255, 255, 255, 0.2);
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
}

.botanical-label {
  font-family: 'Raleway', sans-serif;
  font-size: 0.875rem;
  letter-spacing: 0.3em;
  color: #a7f3d0;
  font-weight: 600;
  text-transform: uppercase;
  margin-bottom: 1rem;
}

.botanical-title {
  font-family: 'Lora', serif;
  font-size: clamp(2rem, 5vw, 4rem);
  font-weight: 600;
  color: white;
  line-height: 1.3;
  margin-bottom: 2rem;
  text-shadow: 2px 4px 12px rgba(0, 0, 0, 0.3);
  /* prevent long, unbroken text from overflowing */
  white-space: normal;
  overflow-wrap: break-word;
  word-break: break-all;
  hyphens: auto;
}

.botanical-message-card {
  background: linear-gradient(135deg, #ffffff 0%, #f0fdf4 100%);
  border-radius: 1.5rem;
  box-shadow: 0 10px 40px rgba(16, 185, 129, 0.2);
  padding: 2.5rem 2rem;
  border: 2px solid #d1fae5;
  transform: rotate(-0.5deg);
  transition: all 0.3s ease;
}

.botanical-message-card:hover {
  transform: rotate(0deg) scale(1.02);
  box-shadow: 0 15px 50px rgba(16, 185, 129, 0.3);
}

.botanical-message-header {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 1rem;
  margin-bottom: 1.5rem;
}

.botanical-icon {
  font-size: 1.75rem;
}

.botanical-message-title {
  font-family: 'Lora', serif;
  font-size: 1.5rem;
  font-weight: 600;
  color: #065f46;
}

.botanical-message-text {
  font-family: 'Raleway', sans-serif;
  font-size: clamp(1.125rem, 2vw, 1.375rem);
  color: #064e3b;
  line-height: 1.8;
  white-space: pre-line;
  text-align: center;
  margin: 1.5rem 0;
  /* ensure long messages wrap inside the card */
  overflow-wrap: anywhere;
  word-break: break-word;
}

.botanical-flourish {
  text-align: center;
  color: #10b981;
  font-size: 1.25rem;
  letter-spacing: 0.5rem;
  margin-top: 1.5rem;
}

@keyframes fade-in {
  from { opacity: 0; transform: translateY(-20px); }
  to { opacity: 1; transform: translateY(0); }
}
.animate-fade-in {
  animation: fade-in 1s ease-out;
}
@keyframes pulse {
  0%, 100% { opacity: 1; }
  50% { opacity: 0.5; }
}
.animate-pulse {
  animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}

.leaves-container {
  position: absolute;
  inset: 0;
  pointer-events: none;
  overflow: hidden;
}

.leaf {
  position: absolute;
  font-size: 2.5rem;
  opacity: 0.6;
  animation: leaf-fall 8s linear infinite;
  top: -50px;
}

@keyframes leaf-fall {
  0% { transform: translateY(0) rotate(0deg); }
  100% { transform: translateY(100vh) rotate(360deg); }
}

.orb {
  position: absolute;
  border-radius: 50%;
  filter: blur(60px);
  opacity: 0.3;
  animation: orb-float 6s ease-in-out infinite;
}

.orb-1 {
  width: 300px;
  height: 300px;
  background: radial-gradient(circle, rgba(34, 197, 94, 0.4), transparent);
  top: 10%;
  left: 5%;
}

.orb-2 {
  width: 250px;
  height: 250px;
  background: radial-gradient(circle, rgba(16, 185, 129, 0.4), transparent);
  top: 60%;
  right: 10%;
  animation-delay: 2s;
}

.orb-3 {
  width: 200px;
  height: 200px;
  background: radial-gradient(circle, rgba(20, 184, 166, 0.4), transparent);
  bottom: 20%;
  left: 50%;
  animation-delay: 4s;
}

@keyframes orb-float {
  0%, 100% { transform: translateY(0) scale(1); }
  50% { transform: translateY(-30px) scale(1.1); }
}

.fade-enter-active, .fade-leave-active {
  transition: opacity 0.3s ease;
}
.fade-enter-from, .fade-leave-to {
  opacity: 0;
}
</style>
