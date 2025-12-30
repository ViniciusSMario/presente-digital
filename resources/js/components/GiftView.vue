<template>
  <div v-if="gift">
    <div v-if="!paid" class="min-h-screen flex items-center justify-center bg-gray-100">
      <div class="text-center p-6 bg-white shadow rounded">
        <div class="text-6xl mb-4">🔒</div>
        <p class="text-xl font-semibold">Presente não pago</p>
        <p class="text-gray-600">Este presente ainda não foi pago. Peça ao remetente para completar o pagamento para visualizar o conteúdo.</p>
      </div>
    </div>
    <div v-else>
      <component :is="templateComponent" :gift="gift" />
    </div>
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
    return { gift: null, paid: true }
  },
  computed: {
    templateComponent() {
      return this.gift ? (this.gift.template || 'Template1') : 'Template1'
    }
  },
  async mounted() {
    const path = `/api/gifts/${this.$route.params.slug || this.slug}`
    const res = await this.$route && this.$route.params && this.$route.params.slug ? await this.$axios.get(path) : await this.$axios.get(path)
    this.gift = res.data.gift
    this.paid = typeof res.data.paid !== 'undefined' ? res.data.paid : (this.gift?.is_paid ?? true)
  }
}
</script>


