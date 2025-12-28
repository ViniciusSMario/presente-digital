<!doctype html>
<html lang="pt-BR" class="h-full">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Presente Digital - Crie presentes digitais personalizados</title>
    <script src="https://js.stripe.com/v3/"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body class="h-full bg-gradient-to-br from-slate-50 to-slate-100 dark:from-slate-900 dark:to-slate-800 transition-colors">
    <div id="app" class="h-full flex flex-col">
      <nav-bar></nav-bar>
      <main class="flex-1">
        <router-view></router-view>
      </main>
    </div>
  </body>
</html>
