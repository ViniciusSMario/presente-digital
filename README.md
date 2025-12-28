# PresenteiAI

PresenteiAI é uma plataforma para criar presentes digitais personalizados (fotos, vídeos, mensagens e músicas) com templates profissionais.

Este repositório contém o backend Laravel e a interface frontend em Vue 3 com Tailwind CSS e Vite.

---

## Visão geral

- Laravel 12 (API, autenticação com Sanctum, jobs, migrations)
- Frontend: Vue 3 + Vue Router + Tailwind CSS + Vite
- Templates de presente em `/public/img/`
- Arquitetura pensada para deploy simples em serviços como DigitalOcean, Render ou servidores com PHP + nginx

---

## Pré-requisitos

- PHP 8.1+
- Composer
- Node.js 16+ (ou versão compatível com Vite)
- npm / pnpm / yarn
- SQLite (padrão para testes) ou MySQL/Postgres para produção

---

## Configuração local (rápido)

1. Clone o repositório

```bash
git clone <repo-url> presente-digital
cd presente-digital
```

2. Instale dependências PHP e JS

```bash
composer install
npm install
```

3. Copie o arquivo de ambiente e gere a chave

```bash
cp .env.example .env
php artisan key:generate
```

4. Configure o `.env` (exemplo mínimo)

```
APP_NAME=PresenteiAI
APP_URL=http://localhost:8000
DB_CONNECTION=sqlite
DB_DATABASE=/full/path/to/database.sqlite  # ou use MySQL/Postgres config
MAIL_MAILER=smtp
MAIL_HOST=smtp.example.com
MAIL_PORT=587
MAIL_USERNAME=your_user
MAIL_PASSWORD=your_pass
MAIL_ENCRYPTION=tls
STRIPE_KEY=pk_test_xxx
STRIPE_SECRET=sk_test_xxx
```

Se usar SQLite, crie o arquivo:

```bash
touch database/database.sqlite
```

5. Execute migrations e seeders

```bash
php artisan migrate --seed
```

6. Crie o link de storage (se necessário)

```bash
php artisan storage:link
```

7. Rode a build do frontend em modo dev

```bash
npm run dev
```

8. Rode o servidor Laravel

```bash
php artisan serve
```

Abra `http://localhost:8000` (ou a rota do frontend se você usar SPA host) e teste.

---

## Comandos úteis

- Instalar dependências: `composer install`, `npm install`
- Migrations: `php artisan migrate`
- Seed: `php artisan db:seed`
- Tests: `vendor/bin/phpunit` ou `php artisan test`
- Build produção frontend: `npm run build`
- Limpar cache: `php artisan optimize:clear`

---

## Estrutura relevante

- `app/` — lógica do Laravel (Models, Controllers, Providers)
- `routes/` — rotas `web.php` e `api.php`
- `resources/js/components/` — componentes Vue (ex: `LandingPage.vue`, `CreateGift.vue`, `NavBar.vue`)
- `public/img/` — imagens de templates (ex.: `template2.png`, `template5.png`)

Você pode referenciar imagens nos templates em `public/img/` diretamente nas views.

Exemplo de imagens incluídas (referência):

![Template 2](public/img/template2.png)
![Template 5](public/img/template5.png)

> Observação: as imagens referenciadas estarão disponíveis se o servidor servir a pasta `public/` corretamente.

---

## Variáveis de ambiente importantes

- `APP_URL` — URL base da aplicação
- `DB_CONNECTION`, `DB_*` — configuração do banco
- `MAIL_*` — configurações de e-mail (envio de notificações)
- `STRIPE_KEY`, `STRIPE_SECRET` — credenciais Stripe para pagamentos

Adicione outras variáveis conforme integrações (ex: serviços de storage, Sentry, etc.).

---

## Deploy

1. Configure variáveis de ambiente no servidor/serviço de deploy.
2. Instale dependências (`composer install --no-dev`, `npm ci --production`).
3. Execute `php artisan migrate --force` e `php artisan config:cache`.
4. Configure webserver (nginx/apache) apontando para `public/`.

---

## Testes

Rode os testes com:

```bash
php artisan test
```

ou

```bash
vendor/bin/phpunit
```

---

## Contribuição

1. Abra uma issue descrevendo o problema ou feature.
2. Faça um fork e um branch com nome descritivo.
3. Abra um Pull Request com mudanças claras e testes quando aplicável.

---

## Contato

Para dúvidas ou suporte rápido, adicione um issue ou entre em contato com o responsável pelo projeto.

---

## Licença

Projeto licenciado sob MIT.
