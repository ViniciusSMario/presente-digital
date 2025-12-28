<template>
  <div v-if="gift">
    <component :is="templateComponent" :gift="gift" />
  </div>
  <div v-else class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="text-center">
      <div class="text-6xl mb-4">🎁</div>
      <p class="text-xl text-gray-600">Carregando seu presente...</p>
    </div>
  </div>
</template>

<script>
import Template1 from './templates/Template1.vue'
import Template2 from './templates/Template2.vue'
import Template3 from './templates/Template3.vue'
import Template4 from './templates/Template4.vue'
import Template5 from './templates/Template5.vue'

export default {
  props: ['slug'],
  components: { Template1, Template2, Template3, Template4, Template5 },
  data() {
    return { gift: null }
  },
  computed: {
    templateComponent() {
      return this.gift ? (this.gift.template || 'Template1') : 'Template1'
    }
  },
  async mounted() {
    const path = `/api/gifts/${this.$route.params.slug || this.slug}`
    const res = await this.$axios.get(path)
    this.gift = res.data.gift
  }
}
</script>


