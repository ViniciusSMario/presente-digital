<template>
  <div class="min-h-screen bg-gradient-to-br from-pink-400 via-rose-300 to-orange-300 p-3 sm:p-4 md:p-6 lg:p-8 relative overflow-hidden">
    <!-- Confetti effect -->
    <div class="confetti-container">
      <div class="confetti" style="left: 5%; animation-delay: 0s; background: linear-gradient(45deg, #ff6b9d, #ffa0c3)"></div>
      <div class="confetti" style="left: 15%; animation-delay: 0.3s; background: linear-gradient(45deg, #ff8fab, #ffb3d1)"></div>
      <div class="confetti" style="left: 25%; animation-delay: 0.6s; background: linear-gradient(45deg, #ffa8c0, #ffd0e3)"></div>
      <div class="confetti" style="left: 35%; animation-delay: 0.9s; background: linear-gradient(45deg, #ff6b9d, #ffa0c3)"></div>
      <div class="confetti" style="left: 45%; animation-delay: 1.2s; background: linear-gradient(45deg, #ff8fab, #ffb3d1)"></div>
      <div class="confetti" style="left: 55%; animation-delay: 1.5s; background: linear-gradient(45deg, #ffa8c0, #ffd0e3)"></div>
      <div class="confetti" style="left: 65%; animation-delay: 1.8s; background: linear-gradient(45deg, #ff6b9d, #ffa0c3)"></div>
      <div class="confetti" style="left: 75%; animation-delay: 2.1s; background: linear-gradient(45deg, #ff8fab, #ffb3d1)"></div>
      <div class="confetti" style="left: 85%; animation-delay: 2.4s; background: linear-gradient(45deg, #ffa8c0, #ffd0e3)"></div>
      <div class="confetti" style="left: 95%; animation-delay: 2.7s; background: linear-gradient(45deg, #ff6b9d, #ffa0c3)"></div>
    </div>
    <div class="max-w-5xl mx-auto">
      <!-- Scrapbook Title -->
      <div class="text-center mb-8 md:mb-12">
        <!-- Washi tape effect -->
        <div class="inline-block relative">
          <div class="absolute -top-6 -left-8 w-[calc(100%+4rem)] h-12 bg-pink-400/40 transform -rotate-2"></div>
          <div class="absolute -top-6 -left-8 w-[calc(100%+4rem)] h-12 bg-white/20 transform -rotate-2" style="background-image: repeating-linear-gradient(90deg, transparent, transparent 10px, rgba(255,255,255,0.3) 10px, rgba(255,255,255,0.3) 20px);"></div>
          
          <h1 class="scrapbook-title">
            {{ gift.title }}
          </h1>
          
          <!-- Decorative stickers -->
          <div class="absolute -top-4 -right-6 text-4xl transform rotate-12 animate-bounce">💕</div>
          <div class="absolute -bottom-2 -left-4 text-3xl transform -rotate-12 animate-bounce" style="animation-delay: 0.5s">🌸</div>
        </div>
      </div>
      
      <!-- Sticky Note Style Message -->
      <div class="max-w-2xl mx-auto mb-8 md:mb-12">
        <div class="bg-gradient-to-br from-yellow-100 to-yellow-50 rounded-sm shadow-2xl p-8 sm:p-10 md:p-12 transform rotate-1 hover:rotate-0 transition-transform relative">
          <!-- Tape effect -->
          <div class="absolute -top-3 left-8 w-20 h-6 bg-white/60 transform -rotate-12 shadow"></div>
          <div class="absolute -top-3 right-8 w-20 h-6 bg-white/60 transform rotate-12 shadow"></div>
          
          <!-- Lined paper effect -->
          <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: repeating-linear-gradient(transparent, transparent 31px, #e5e7eb 31px, #e5e7eb 32px);"></div>
        <div class="relative z-10">
          <div class="text-center text-4xl mb-4">💌</div>
          <p class="sticky-note-text">{{ gift.message }}</p>
          <div class="sticky-note-footer">xoxo 💕</div>
        </div>
      </div>
      </div>
      
      <!-- Polaroid Gallery (Images only) -->
      <div v-if="imageMedia.length" class="mb-8 md:mb-12">
        <div class="max-w-3xl mx-auto relative">
          <div class="polaroid-frame">
            <div class="polaroid-photo">
              <transition name="fade" mode="out-in">
                <img 
                  :key="currentImage.id"
                  :src="`/storage/${currentImage.path}`" 
                  class="w-full h-72 sm:h-96 object-cover"
                  :alt="gift.title"
                />
              </transition>
            </div>
            <div class="polaroid-caption">
              <p class="text-gray-600 text-lg" style="font-family: 'Comic Sans MS', cursive;">Memória {{ imageIndex + 1 }} de {{ imageMedia.length }}</p>
            </div>
          </div>
          
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
            :class="imageIndex === i ? 'bg-rose-500 scale-110' : 'bg-white/60'"
          />
        </div>
      </div>
      
      <!-- Video Players -->
      <div v-if="videoMedia.length" class="space-y-6 mb-8 md:mb-12">
        <div 
          v-for="video in videoMedia" 
          :key="video.id"
          class="bg-white/90 backdrop-blur-sm rounded-2xl overflow-hidden shadow-xl"
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
      <div v-if="audioMedia.length" class="space-y-4 mb-6 md:mb-8">
        <AudioPlayer
          v-for="audio in audioMedia"
          :key="audio.id"
          :src="`/storage/${audio.path}`"
        />
      </div>
      
      <!-- Footer decoration -->
      <div class="text-center mt-12">
        <p class="text-white text-lg font-medium drop-shadow">✨ Um presente especial para você ✨</p>
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
@import url('https://fonts.googleapis.com/css2?family=Caveat:wght@400;700&family=Patrick+Hand&family=Indie+Flower&display=swap');

.scrapbook-title {
  font-family: 'Caveat', cursive;
  font-size: clamp(2.5rem, 6vw, 5rem);
  font-weight: 700;
  color: white;
  text-shadow: 4px 4px 8px rgba(0,0,0,0.4), -1px -1px 0 rgba(255,255,255,0.3);
  position: relative;
  z-index: 10;
  padding: 0.75rem 1.5rem;
  line-height: 1.2;
  transform: rotate(-1deg);
  /* Robust wrapping rules to prevent overflow on narrow screens */
  white-space: normal;
  overflow-wrap: break-word;
  word-break: break-all;
  hyphens: auto;
}

.sticky-note-text {
  font-family: 'Patrick Hand', cursive;
  font-size: clamp(1.125rem, 2vw, 1.5rem);
  color: #1f2937;
  line-height: 2;
  white-space: pre-line;
  text-align: left;
  padding: 0 1rem;
  /* ensure long messages wrap correctly */
  overflow-wrap: anywhere;
  word-break: break-word;
}

.sticky-note-footer {
  font-family: 'Indie Flower', cursive;
  font-size: 1.25rem;
  color: #ec4899;
  text-align: right;
  margin-top: 1.5rem;
  padding-right: 1rem;
}

@keyframes bounce {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-10px); }
}
.animate-bounce {
  animation: bounce 2s infinite;
}

.confetti-container {
  position: absolute;
  inset: 0;
  pointer-events: none;
  overflow: hidden;
}

.confetti {
  position: absolute;
  width: 10px;
  height: 16px;
  top: -20px;
  animation: confetti-fall 4s linear infinite;
  opacity: 0.8;
}

@keyframes confetti-fall {
  0% { transform: translateY(0) rotate(0deg); opacity: 1; }
  100% { transform: translateY(100vh) rotate(360deg); opacity: 0; }
}

.polaroid-frame {
  background: white;
  padding: 16px 16px 60px 16px;
  box-shadow: 0 10px 40px rgba(0,0,0,0.3), 0 0 0 1px rgba(0,0,0,0.1);
  transform: rotate(-2deg);
  transition: all 0.3s ease;
}

.polaroid-frame:hover {
  transform: rotate(0deg) scale(1.02);
  box-shadow: 0 15px 50px rgba(0,0,0,0.4);
}

.polaroid-photo {
  background: #f8f8f8;
  overflow: hidden;
}

.polaroid-caption {
  padding: 12px;
  text-align: center;
}

@keyframes fade-in-scale {
  from { opacity: 0; transform: scale(0.9); }
  to { opacity: 1; transform: scale(1); }
}

.animate-fade-in-scale {
  animation: fade-in-scale 0.6s ease-out;
}

.fade-enter-active, .fade-leave-active {
  transition: opacity 0.3s ease;
}
.fade-enter-from, .fade-leave-to {
  opacity: 0;
}
</style>
