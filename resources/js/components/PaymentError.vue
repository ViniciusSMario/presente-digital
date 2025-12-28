<template>
  <div class="min-h-screen bg-gradient-to-br from-red-50 to-rose-50 flex items-center justify-center px-4 py-12">
    <div class="max-w-md w-full">
      <div class="bg-white rounded-2xl shadow-2xl p-8 text-center">
        <!-- Error Icon -->
        <div class="mb-6">
          <div class="mx-auto w-20 h-20 bg-red-100 rounded-full flex items-center justify-center">
            <svg class="w-12 h-12 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
        </div>

        <!-- Title -->
        <h1 class="text-3xl font-bold text-gray-900 mb-3">
          Erro no Pagamento
        </h1>
        <p class="text-gray-600 mb-8">
          Ocorreu um erro ao processar seu pagamento. Por favor, tente novamente.
        </p>

        <!-- Error Box -->
        <div class="bg-red-50 border-2 border-red-200 rounded-xl p-6 mb-6 text-left">
          <div class="flex items-start">
            <svg class="w-6 h-6 text-red-600 mr-3 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
            <div class="text-sm text-red-800">
              <p class="font-semibold mb-1">O que fazer?</p>
              <ul class="list-disc list-inside space-y-1">
                <li>Verifique os dados do seu cartão</li>
                <li>Certifique-se de ter saldo disponível</li>
                <li>Tente usar outro método de pagamento</li>
              </ul>
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
            Se o problema persistir, entre em contato com nosso suporte.
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'PaymentError'
}
</script>
