<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ setting('content.imsak_title') }}</title>

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="{{ setting('content.imsak_title') }}">
    <meta property="og:description" content="{{ setting('content.imsak_caption') }}">
    <meta property="og:image" content="{{ $imageUrl }}">
    <meta property="og:url" content="{{ url(route('short-url')) }}">
    <meta property="og:type" content="website">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ setting('content.imsak_title') }}">
    <meta name="twitter:description" content="{{ setting('content.imsak_caption') }}">
    <meta name="twitter:image" content="{{ $imageUrl }}">
    <meta http-equiv="refresh" content="3;url={{ $imageUrl }}">

</head>
<body>
    <p>Anda akan dialihkan ke Jadwal Imsakiyah...</p>
</body>
</html>
