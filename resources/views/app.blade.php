<!doctype html>
<html lang="pt-BR" class="h-full">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="robots" content="index,follow">
    <meta name="language" content="pt-BR">
    <meta name="description" content="PresenteiAI — Crie e envie presentes digitais personalizados com fotos, áudio e vídeo. Templates profissionais, envio por link e pagamento seguro.">
    <meta name="keywords" content="presente digital, presente virtual, gift digital, templates, presente personalizado, enviar presente online">
    <link rel="canonical" href="{{ secure_url(Request::getRequestUri()) }}" />
    <link rel="alternate" href="{{ secure_url('/') }}" hreflang="pt-BR" />
    <title>PresenteiAI - Crie presentes digitais personalizados</title>

    <!-- Open Graph / Facebook -->
    <meta property="og:site_name" content="PresenteiAI">
    <meta property="og:title" content="PresenteiAI - Crie presentes digitais personalizados">
    <meta property="og:description" content="Crie presentes digitais com fotos, áudio e vídeo. Templates profissionais e pagamento seguro.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ secure_url(Request::getRequestUri()) }}">
    <meta property="og:image" content="{{ secure_url('/img/og-default.png') }}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="PresenteiAI - Crie presentes digitais personalizados">
    <meta name="twitter:description" content="Crie presentes digitais com fotos, áudio e vídeo. Templates profissionais e pagamento seguro.">
    <meta name="twitter:image" content="{{ secure_url('/img/og-default.png') }}">

    <!-- Favicons -->
    <link rel="icon" href="{{ secure_url('/img/presenteiai.png') }}" sizes="any">
    <link rel="icon" type="image/png" href="{{ secure_url('/img/presenteiai.png') }}">
    <link rel="shortcut icon" href="{{ secure_url('/img/presenteiai.png') }}">
    <link rel="apple-touch-icon" href="{{ secure_url('/img/presenteiai.png') }}">
    <meta name="msapplication-TileImage" content="{{ secure_url('/img/presenteiai.png') }}">

    <!-- Structured Data -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "WebSite",
      "name": "PresenteiAI",
      "url": "{{ secure_url('/') }}",
      "description": "Crie e envie presentes digitais personalizados com fotos, áudio e vídeo.",
      "potentialAction": {
        "@@type": "SearchAction",
        "target": "{{ secure_url('/?s={search_term_string}') }}",
        "query-input": "required name=search_term_string"
      }
    }
    </script>

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
