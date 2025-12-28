<template>
  <div class="min-h-screen bg-gradient-to-br from-orange-50 to-red-50 flex items-center justify-center px-4 py-12">
    <div class="max-w-md w-full">
      <div class="bg-white rounded-2xl shadow-2xl p-8 text-center">
        <!-- Cancel Icon -->
        <div class="mb-6">
          <div class="mx-auto w-20 h-20 bg-orange-100 rounded-full flex items-center justify-center">
            <svg class="w-12 h-12 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </div>
        </div>

        <!-- Title -->
        <h1 class="text-3xl font-bold text-gray-900 mb-3">
          Pagamento Cancelado
        </h1>
        <p class="text-gray-600 mb-8">
          O pagamento foi cancelado. Seu presente digital foi salvo como rascunho e pode ser finalizado depois.
        </p>

        <!-- Info Box -->
        <div class="bg-orange-50 border-2 border-orange-200 rounded-xl p-6 mb-6 text-left">
          <div class="flex items-start">
            <svg class="w-6 h-6 text-orange-600 mr-3 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <div class="text-sm text-orange-800">
              <p class="font-semibold mb-1">O que aconteceu?</p>
              <p>O pagamento não foi processado. Seu presente foi salvo e você pode concluir o pagamento a qualquer momento através do dashboard.</p>
            </div>
          </div>
        </div>

        <!-- Actions -->
        <div class="space-y-3">
          <router-link 
            to="/create"
            class="block w-full bg-gradient-to-r from-purple-600 to-pink-600 text-white px-6 py-3 rounded-xl font-semibold hover:from-purple-500 hover:to-pink-500 transition-all"
          >
            Tentar Novamente
          </router-link>
          <router-link 
            to="/dashboard"
            class="block w-full bg-gray-100 text-gray-700 px-6 py-3 rounded-xl font-semibold hover:bg-gray-200 transition-all"
          >
            Ir para Dashboard
          </router-link>
          <router-link 
            to="/"
            class="block w-full text-gray-600 hover:text-gray-800 text-sm transition-all"
          >
            Voltar ao início
          </router-link>
        </div>

        <!-- Help Text -->
        <div class="mt-8 pt-6 border-t border-gray-200">
          <p class="text-sm text-gray-500">
            Precisa de ajuda? Entre em contato com nosso suporte.
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'PaymentCancel'
}
</script>
