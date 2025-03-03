<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ setting('content.imsak_title') }}</title>

    @include('partials.seo', [
      'title' => setting('content.imsak_title'),
      'image' => Voyager::image(setting('content.imasakiyah'));
    ])

    <!-- Redirect Script -->
    <script>
        setTimeout(function() {
            window.location.href = "{{ $imageUrl }}";
        }, 3000); // Redirect setelah 3 detik
    </script>
</head>
<body>
    <p>Anda akan dialihkan ke Jadwal Imsakiyah...</p>
</body>
</html>
