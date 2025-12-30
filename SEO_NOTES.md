SEO Recommendations for PresenteiAI

1) Create social preview image(s)
- Add a default open-graph image at `public/img/og-default.png` (1200x630) and smaller `public/img/og-default-small.png` for Twitter.
- Generate dynamic social images per gift if desired (Open Graph image per gift page).

2) Meta tags added
- Title, description, keywords, canonical, hreflang, robots, Open Graph, Twitter Card and JSON-LD (WebSite) have been added to `resources/views/app.blade.php`.

3) Sitemap & robots
- `public/robots.txt` updated to reference `/sitemap.xml`.
- `/sitemap.xml` route added to `routes/web.php` and `resources/views/sitemap.blade.php` created to list paid gifts.

4) Server
- Ensure `APP_URL` in `.env` is set correctly (used in structured data and links).

5) Backend
- Add meta tags per gift for server-rendered SEO (optional): when rendering gift pages for crawlers, return HTML with gift-specific title/description/og:image. Currently the Vue SPA serves the same HTML for all routes.

6) Testing
- Use Google Search Console and the URL Inspection tool to request indexing for key pages.
- Use the Rich Results Test to validate JSON-LD.

7) Extras (future)
- Generate dynamic sitemap xml file (cron) and cache it.
- Implement server-side rendering (Nuxt or Laravel prerender) for improved indexing of SPA content.
