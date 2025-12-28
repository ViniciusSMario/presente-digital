<template>
  <div class="min-h-screen flex items-center justify-center p-3 sm:p-6 bg-gradient-to-br from-purple-600 via-pink-500 to-rose-500 relative overflow-hidden">
    <!-- Floating particles -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
      <div class="particle" style="left: 10%; animation-delay: 0s">✨</div>
      <div class="particle" style="left: 20%; animation-delay: 2s">💝</div>
      <div class="particle" style="left: 30%; animation-delay: 4s">✨</div>
      <div class="particle" style="left: 50%; animation-delay: 1s">💖</div>
      <div class="particle" style="left: 70%; animation-delay: 3s">✨</div>
      <div class="particle" style="left: 85%; animation-delay: 5s">💝</div>
    </div>
    
    <main class="w-full max-w-4xl bg-white rounded-2xl md:rounded-3xl shadow-2xl overflow-hidden animate-gift-open relative">
      <!-- Ribbon decoration -->
      <div class="absolute top-0 left-1/2 -translate-x-1/2 w-16 h-full bg-gradient-to-b from-purple-400/30 to-transparent"></div>
      <div class="absolute top-1/2 left-0 -translate-y-1/2 w-full h-16 bg-gradient-to-r from-purple-400/30 via-pink-400/30 to-purple-400/30"></div>
      <!-- Header -->
      <!-- Luxury Card Header with Wax Seal -->
      <header class="relative overflow-hidden">
        <!-- Elegant pattern background -->
        <div class="bg-gradient-to-br from-purple-900 via-purple-800 to-pink-900 p-8 sm:p-12 md:p-16 relative">
          <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle, #fff 1px, transparent 1px); background-size: 20px 20px;"></div>
          
          <!-- Golden frame -->
          <div class="absolute inset-4 border-2 border-amber-400/50 rounded-lg"></div>
          <div class="absolute inset-6 border border-amber-300/30 rounded-lg"></div>
          
          <!-- Wax seal -->
          <div class="absolute -top-8 right-8 sm:right-16">
            <div class="wax-seal">
              <div class="text-5xl">💝</div>
            </div>
          </div>
          
          <div class="relative text-center">
            <div class="luxury-label">Um Presente Para Você</div>
            <h1 class="luxury-title">
              {{ gift.title }}
            </h1>
            <div class="luxury-divider">
              <span class="text-amber-400 text-xl">❖</span>
            </div>
          </div>
        </div>
        
        <!-- Envelope flap -->
        <div class="envelope-flap"></div>
      </header>

      <!-- Content -->
      <section class="p-6 sm:p-10 lg:p-16 space-y-10">
        <!-- Message -->
        <article class="message-card">
          <div class="quote-mark quote-left">❝</div>
          <p class="luxury-message">
            {{ gift.message }}
          </p>
          <div class="quote-mark quote-right">❞</div>
          <div class="message-signature">— Com carinho</div>
        </article>

        <!-- ================= CAROUSEL ================= -->
        <section v-if="visualMedia.length" class="relative">
          <div class="overflow-hidden rounded-2xl shadow-lg bg-black">
            <transition name="fade" mode="out-in">
              <!-- Image -->
              <img
                v-if="currentMedia.type === 'image'"
                :key="currentMedia.id"
                :src="mediaUrl(currentMedia.path)"
                :alt="gift.title"
                class="w-full max-h-[500px] object-contain"
                loading="lazy"
              />

              <!-- Video -->
              <video
                v-else-if="currentMedia.type === 'video'"
                :key="currentMedia.id"
                :src="mediaUrl(currentMedia.path)"
                controls
                class="w-full max-h-[500px] object-contain"
              />
            </transition>
          </div>

          <!-- Navigation -->
          <button
            @click="prev"
            class="absolute left-3 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white rounded-full p-2 shadow"
            aria-label="Anterior"
          >
            ◀
          </button>

          <button
            @click="next"
            class="absolute right-3 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white rounded-full p-2 shadow"
            aria-label="Próximo"
          >
            ▶
          </button>

          <!-- Dots -->
          <div class="flex justify-center gap-2 mt-4">
            <button
              v-for="(m, i) in visualMedia"
              :key="m.id"
              @click="index = i"
              class="w-3 h-3 rounded-full transition"
              :class="index === i ? 'bg-pink-500 scale-110' : 'bg-gray-300'"
              aria-label="Ir para mídia"
            />
          </div>
        </section>

        <!-- ================= AUDIOS ================= -->
        <section v-if="audioMedia.length" class="space-y-4">
          <div
            v-for="m in audioMedia"
            :key="m.id"
            class="bg-purple-50 rounded-2xl p-5 shadow"
          >
            <audio :src="mediaUrl(m.path)" controls class="w-full" />
          </div>
        </section>
      </section>

      <!-- Footer -->
      <footer
        class="bg-gray-50 p-6 text-center text-sm text-gray-500"
      >
        Feito com ❤️ no <span class="font-medium">Presente Digital</span>
      </footer>
    </main>
  </div>
</template>

<script>
export default {
  name: 'GiftShow',
  props: {
    gift: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      index: 0,
    }
  },
  computed: {
    visualMedia() {
      return this.gift.media?.filter(m =>
        ['image', 'video'].includes(m.type)
      ) || []
    },
    audioMedia() {
      return this.gift.media?.filter(m => m.type === 'audio') || []
    },
    currentMedia() {
      return this.visualMedia[this.index]
    },
  },
  methods: {
    next() {
      this.index = (this.index + 1) % this.visualMedia.length
    },
    prev() {
      this.index =
        (this.index - 1 + this.visualMedia.length) %
        this.visualMedia.length
    },
    mediaUrl(path) {
      return `/storage/${path}`
    },
  },
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&display=swap');

.luxury-label {
  font-family: 'Cormorant Garamond', serif;
  color: #fbbf24;
  font-size: 0.875rem;
  letter-spacing: 0.3em;
  margin-bottom: 1rem;
  text-transform: uppercase;
  font-weight: 600;
}

.luxury-title {
  font-family: 'Playfair Display', serif;
  font-size: clamp(2rem, 5vw, 4rem);
  font-weight: 700;
  color: white;
  line-height: 1.2;
  margin-bottom: 1.5rem;
  animation: fade-in-up 0.8s ease-out 0.3s backwards;
  text-shadow: 2px 2px 8px rgba(0,0,0,0.3);
}

.luxury-divider {
  width: 150px;
  height: 2px;
  background: linear-gradient(to right, transparent, #fbbf24, transparent);
  margin: 0 auto;
  display: flex;
  align-items: center;
  justify-content: center;
}

.message-card {
  background: linear-gradient(135deg, #faf5ff 0%, #fce7f3 100%);
  border-radius: 1rem;
  padding: 2.5rem;
  border-left: 4px solid #a855f7;
  box-shadow: inset 0 2px 20px rgba(168, 85, 247, 0.1), 0 4px 20px rgba(0,0,0,0.1);
  position: relative;
  margin: 2rem 1rem;
}

.luxury-message {
  font-family: 'Cormorant Garamond', serif;
  font-size: clamp(1.25rem, 2.5vw, 1.75rem);
  color: #374151;
  line-height: 1.8;
  white-space: pre-line;
  font-style: italic;
  text-align: center;
  margin: 1rem 0;
}

.quote-mark {
  position: absolute;
  font-size: 4rem;
  color: #e9d5ff;
  font-family: 'Playfair Display', serif;
  line-height: 1;
}

.quote-left { top: -0.5rem; left: 0.5rem; }
.quote-right { bottom: -0.5rem; right: 0.5rem; }

.message-signature {
  font-family: 'Playfair Display', serif;
  font-style: italic;
  color: #9333ea;
  text-align: right;
  margin-top: 1.5rem;
  font-size: 1.125rem;
}

.fade-enter-active, .fade-leave-active {
  transition: opacity 0.3s ease;
}
.fade-enter-from, .fade-leave-to {
  opacity: 0;
}

@keyframes gift-open {
  0% { transform: scale(0.8) rotateX(-10deg); opacity: 0; }
  50% { transform: scale(1.05); }
  100% { transform: scale(1) rotateX(0deg); opacity: 1; }
}

.animate-gift-open {
  animation: gift-open 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
}

@keyframes float {
  0%, 100% { transform: translateY(0) translateX(0); opacity: 1; }
  25% { transform: translateY(-100px) translateX(20px); }
  50% { transform: translateY(-200px) translateX(-20px); opacity: 0.5; }
  75% { transform: translateY(-300px) translateX(10px); opacity: 0.2; }
  100% { transform: translateY(-400px) translateX(0); opacity: 0; }
}

.particle {
  position: absolute;
  font-size: 2rem;
  animation: float 6s infinite;
  bottom: -50px;
}

@keyframes bounce-slow {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-15px); }
}

.animate-bounce-slow {
  animation: bounce-slow 3s ease-in-out infinite;
}

@keyframes fade-in-up {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}

.animate-fade-in-up {
  animation: fade-in-up 0.8s ease-out 0.3s backwards;
}

.wax-seal {
  width: 80px;
  height: 80px;
  background: radial-gradient(circle, #dc2626 0%, #991b1b 100%);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 4px 15px rgba(0,0,0,0.4), inset 0 2px 5px rgba(255,255,255,0.3);
  border: 3px solid #7f1d1d;
  animation: seal-stamp 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) 0.5s backwards;
}

@keyframes seal-stamp {
  0% { transform: scale(0) rotate(-180deg); }
  50% { transform: scale(1.2) rotate(10deg); }
  100% { transform: scale(1) rotate(0deg); }
}

.envelope-flap {
  height: 60px;
  background: linear-gradient(to bottom, rgba(147, 51, 234, 0.15) 0%, transparent 100%);
  clip-path: polygon(0 0, 50% 100%, 100% 0);
  transform: translateY(-1px);
}

.sparkle-container {
  position: absolute;
  inset: 0;
  pointer-events: none;
}

.sparkle {
  position: absolute;
  font-size: 1.5rem;
  animation: twinkle 2s ease-in-out infinite;
}

@keyframes twinkle {
  0%, 100% { opacity: 0.3; transform: scale(0.8); }
  50% { opacity: 1; transform: scale(1.2); }
}

.sparkle:nth-child(2) { animation-delay: 0.5s; }
.sparkle:nth-child(3) { animation-delay: 1s; }
.sparkle:nth-child(4) { animation-delay: 1.5s; }

audio::-webkit-media-controls-panel {
  background-color: white;
}
</style>
