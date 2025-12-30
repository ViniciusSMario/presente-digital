<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <url>
    <loc>{{ secure_url('/') }}</loc>
    <changefreq>daily</changefreq>
    <priority>1.0</priority>
  </url>
  <url>
    <loc>{{ secure_url('/create') }}</loc>
    <changefreq>weekly</changefreq>
    <priority>0.8</priority>
  </url>
  @foreach($gifts as $gift)
  <url>
    <loc>{{ secure_url('/gifts/'.$gift->slug) }}</loc>
    <lastmod>{{ $gift->updated_at->tz('UTC')->toAtomString() }}</lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.6</priority>
  </url>
  @endforeach
</urlset>
