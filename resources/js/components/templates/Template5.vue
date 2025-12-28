<template>
  <div class="min-h-screen bg-gradient-to-br from-amber-400 via-orange-400 to-rose-500 flex items-center justify-center p-2 sm:p-4 md:p-6 relative overflow-hidden">
    <!-- Falling petals -->
    <div class="petals-container">
      <div class="petal" style="left: 8%; animation-delay: 0s">🌸</div>
      <div class="petal" style="left: 18%; animation-delay: 1.5s">🌺</div>
      <div class="petal" style="left: 28%; animation-delay: 3s">🌸</div>
      <div class="petal" style="left: 38%; animation-delay: 0.5s">🌺</div>
      <div class="petal" style="left: 48%; animation-delay: 2s">🌸</div>
      <div class="petal" style="left: 58%; animation-delay: 3.5s">🌺</div>
      <div class="petal" style="left: 68%; animation-delay: 1s">🌸</div>
      <div class="petal" style="left: 78%; animation-delay: 2.5s">🌺</div>
      <div class="petal" style="left: 88%; animation-delay: 4s">🌸</div>
    </div>
    
    <!-- Romantic glow -->
    <div class="romantic-glow romantic-glow-1"></div>
    <div class="romantic-glow romantic-glow-2"></div>
    <div class="max-w-6xl w-full">
      <!-- Main card with warm design -->
      <div class="bg-white rounded-xl sm:rounded-2xl md:rounded-3xl shadow-2xl overflow-hidden border-4 border-orange-200/40 animate-scale-in">
        <!-- Gold accent lines -->
        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-amber-400 to-transparent"></div>
        <div class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-rose-400 to-transparent"></div>
        <!-- Decorative header -->
        <div class="relative bg-gradient-to-r from-orange-500 to-rose-500 p-8 sm:p-12 md:p-16 overflow-hidden">
          <div class="absolute top-0 left-0 w-full h-full opacity-20">
            <div class="hidden sm:block absolute top-4 left-8 text-4xl md:text-6xl">🌹</div>
            <div class="hidden sm:block absolute top-12 right-12 text-3xl md:text-5xl">💖</div>
            <div class="hidden md:block absolute bottom-8 left-16 text-4xl">✨</div>
            <div class="hidden md:block absolute bottom-12 right-20 text-5xl">🌹</div>
          </div>
          
          <div class="relative text-center">
            <div class="text-5xl sm:text-6xl md:text-7xl mb-4 md:mb-6">💝</div>
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-bold text-white mb-4 drop-shadow-lg font-serif px-4">{{ gift.title }}</h1>
            <div class="flex justify-center space-x-2 mt-6">
              <div class="w-16 h-1 bg-white/50 rounded-full"></div>
              <div class="w-4 h-1 bg-white rounded-full"></div>
              <div class="w-16 h-1 bg-white/50 rounded-full"></div>
            </div>
          </div>
        </div>
        
        <!-- Content area -->
        <div class="p-4 sm:p-6 md:p-8 lg:p-16">
          <!-- Message -->
          <div class="max-w-4xl mx-auto mb-8 md:mb-12">
            <div class="vintage-letter">
              <div class="letter-decoration letter-top">✾</div>
              <p class="vintage-message">{{ gift.message }}</p>
              <div class="letter-closing">
                <p class="letter-signature">Eternamente,</p>
                <div class="letter-heart">♥</div>
              </div>
              <div class="letter-decoration letter-bottom">✾</div>
            </div>
          </div>
          
          <!-- Media showcase -->
          <div v-if="imageMedia.length || videoMedia.length || audioMedia.length" class="space-y-6 md:space-y-8">
            <div class="text-center mb-6 md:mb-8">
              <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-orange-600 to-rose-600 font-serif">Nossos Momentos</h2>
              <div class="w-24 h-1 bg-gradient-to-r from-orange-400 to-rose-400 mx-auto mt-4 rounded-full"></div>
            </div>
            
            <!-- Images Carousel -->
            <div v-if="imageMedia.length" class="mb-6 md:mb-8">
              <div class="relative rounded-2xl overflow-hidden shadow-xl">
                <transition name="fade" mode="out-in">
                  <img 
                    :key="currentImage.id"
                    :src="`/storage/${currentImage.path}`" 
                    class="w-full h-64 sm:h-80 md:h-96 lg:h-[500px] object-cover"
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
                  :class="imageIndex === i ? 'bg-rose-500 scale-110' : 'bg-orange-200'"
                />
              </div>
            </div>
            
            <!-- Video Players -->
            <div v-if="videoMedia.length" class="space-y-6 mb-6 md:mb-8">
              <div 
                v-for="video in videoMedia" 
                :key="video.id"
                class="bg-gradient-to-br from-orange-100 to-rose-100 rounded-2xl overflow-hidden shadow-xl"
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
        
        <!-- Footer with love -->
        <div class="bg-gradient-to-r from-orange-50 via-rose-50 to-orange-50 p-8 text-center border-t border-orange-100">
          <div class="flex justify-center items-center space-x-3 text-2xl mb-2">
            <span>💕</span>
            <span>✨</span>
            <span>💕</span>
          </div>
          <p class="text-gray-600 font-serif text-lg">Feito com amor no PresenteiAI</p>
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
@import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&family=Merriweather:ital,wght@0,400;0,700;1,400&family=Great+Vibes&display=swap');

.vintage-label {
  font-family: 'Merriweather', serif;
  color: #be123c;
  font-size: 0.875rem;
  letter-spacing: 0.3em;
  text-transform: uppercase;
  font-weight: 400;
}

.vintage-title {
  font-family: 'Great Vibes', cursive;
  font-size: clamp(2.5rem, 6vw, 5.5rem);
  font-weight: 400;
  background: linear-gradient(135deg, #be123c 0%, #db2777 50%, #ea580c 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  line-height: 1.3;
  margin-bottom: 2rem;
  padding: 0 1rem;
  filter: drop-shadow(2px 2px 4px rgba(190, 18, 60, 0.2));
}

.vintage-letter {
  position: relative;
  background: linear-gradient(135deg, #fef3c7 0%, #fde68a 50%, #fed7aa 100%);
  padding: 3rem 2rem;
  border-radius: 0.5rem;
  box-shadow: 
    0 1px 3px rgba(0,0,0,0.1),
    inset 0 0 60px rgba(0,0,0,0.05);
  border: 1px solid #d97706;
}

.vintage-letter::before {
  content: '';
  position: absolute;
  inset: 8px;
  border: 1px solid rgba(217, 119, 6, 0.3);
  border-radius: 0.25rem;
  pointer-events: none;
}

.letter-decoration {
  text-align: center;
  color: #c2410c;
  font-size: 2rem;
  margin: 1rem 0;
}

.vintage-message {
  font-family: 'Merriweather', serif;
  font-size: clamp(1.125rem, 2.5vw, 1.5rem);
  color: #431407;
  line-height: 2;
  white-space: pre-line;
  font-style: italic;
  text-align: center;
  margin: 2rem 0;
  letter-spacing: 0.02em;
}

.letter-closing {
  margin-top: 2rem;
  text-align: right;
  padding-right: 2rem;
}

.letter-signature {
  font-family: 'Dancing Script', cursive;
  font-size: 1.5rem;
  color: #9f1239;
  margin-bottom: 0.5rem;
}

.letter-heart {
  font-size: 1.5rem;
  color: #be123c;
  animation: heartbeat 1.5s ease-in-out infinite;
}

@keyframes heartbeat {
  0%, 100% { transform: scale(1); }
  50% { transform: scale(1.1); }
}

.petals-container {
  position: absolute;
  inset: 0;
  pointer-events: none;
  overflow: hidden;
}

.petal {
  position: absolute;
  font-size: 2rem;
  opacity: 0.7;
  animation: petal-fall 10s linear infinite;
  top: -50px;
}

@keyframes petal-fall {
  0% { transform: translateY(0) translateX(0) rotate(0deg); }
  25% { transform: translateY(25vh) translateX(20px) rotate(90deg); }
  50% { transform: translateY(50vh) translateX(-20px) rotate(180deg); }
  75% { transform: translateY(75vh) translateX(15px) rotate(270deg); }
  100% { transform: translateY(100vh) translateX(0) rotate(360deg); opacity: 0; }
}

.romantic-glow {
  position: absolute;
  border-radius: 50%;
  filter: blur(80px);
  opacity: 0.25;
  animation: glow-pulse 5s ease-in-out infinite;
}

.romantic-glow-1 {
  width: 400px;
  height: 400px;
  background: radial-gradient(circle, rgba(251, 146, 60, 0.5), transparent);
  top: 5%;
  right: 5%;
}

.romantic-glow-2 {
  width: 350px;
  height: 350px;
  background: radial-gradient(circle, rgba(244, 63, 94, 0.5), transparent);
  bottom: 10%;
  left: 5%;
  animation-delay: 2.5s;
}

@keyframes glow-pulse {
  0%, 100% { transform: scale(1); opacity: 0.25; }
  50% { transform: scale(1.15); opacity: 0.35; }
}

@keyframes scale-in {
  from { transform: scale(0.95); opacity: 0; }
  to { transform: scale(1); opacity: 1; }
}

.animate-scale-in {
  animation: scale-in 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.fade-enter-active, .fade-leave-active {
  transition: opacity 0.3s ease;
}
.fade-enter-from, .fade-leave-to {
  opacity: 0;
}
</style>
