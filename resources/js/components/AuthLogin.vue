<template>
  <div class="flex min-h-full flex-col justify-center px-4 sm:px-6 py-8 sm:py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <h2 class="mt-6 sm:mt-10 text-center text-xl sm:text-2xl font-bold leading-9 tracking-tight text-slate-900 dark:text-white">Entre na sua conta</h2>
    </div>

    <div class="mt-6 sm:mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <form @submit.prevent="submit" class="space-y-6">
        <div>
          <label for="email" class="block text-sm font-medium leading-6 text-slate-900">E-mail</label>
          <div class="mt-2">
            <input v-model="email" id="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 px-3 py-2 text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6" />
          </div>
        </div>

        <div>
          <label for="password" class="block text-sm font-medium leading-6 text-slate-900">Senha</label>
          <div class="mt-2">
            <input v-model="password" id="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 px-3 py-2 text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6" />
          </div>
        </div>

        <div>
          <button type="submit" class="flex w-full justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Entrar</button>
        </div>
      </form>

      <p class="mt-10 text-center text-sm text-slate-500">
        Não tem conta?
        <router-link to="/register" class="font-semibold leading-6 text-blue-600 hover:text-blue-500">Criar conta</router-link>
      </p>
    </div>
  </div>
</template>

<script>
export default {
  data(){return {email:'',password:''}},
  methods:{
    async submit(){
      try{
        const res = await this.$axios.post('/api/login',{email:this.email,password:this.password});
        localStorage.setItem('api_token',res.data.token);
        localStorage.setItem('user', JSON.stringify(res.data.user));
        
        // Check for redirect parameter
        const redirect = this.$route.query.redirect || '/dashboard';
        this.$router.push(redirect);
      }catch(e){alert('Falha no login')}
    }
  }
}
</script>

<style scoped>
</style>
