<title>{{ $title ?? setting('seo.title') }}</title>

<!-- Meta Tags -->
<meta name="description" content="{{ $description ?? setting('seo.description') }}">
<meta name="keywords" content="{{ $keywords ?? setting('seo.keywords') }}">
<meta name="author" content="{{ $author ?? 'Tanur Muthmainnah' }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="{{ $robots ?? 'index, follow' }}">
<meta http-equiv="content-language" content="{{ $language ?? 'id' }}">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="{{ 'website' }}">
<meta property="og:title" content="{{ $title ?? setting('seo.title') }}">
<meta property="og:description" content="{{ $description ?? setting('seo.description') }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image" content="{{ $image ?? Voyager::image(setting('seo.image')) }}">
<meta property="og:site_name" content="{{ 'Tanur Muthmainnah Official Site' }}">

<!-- Twitter -->
<meta name="twitter:card" content="{{ 'summary_large_image' }}">
<meta name="twitter:title" content="{{ $title ?? setting('seo.title') }}">
<meta name="twitter:description" content="{{ $description ?? setting('seo.description') }}">
<meta name="twitter:image" content="{{ $image ?? Voyager::image(setting('seo.image')) }}">

<!-- Canonical -->
<link rel="canonical" href="{{ url()->current() }}">

<!-- Favicon -->
<link rel="apple-touch-icon" href="{{ setting('site.favicon') }}">

<!-- Schema.org -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "{{ $title ?? setting('seo.title') }}",
  "description": "{{ $description ?? setting('seo.description') }}",
  "url": "{{ url()->current() }}",
  "image": "{{ $image ?? Voyager::image(setting('seo.image')) }}",
  "author": {
    "@type": "Organization",
    "name": "{{ $author ?? 'Tanur Muthmainnah' }}"
  }
}
</script>
