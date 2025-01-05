<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('partials.seo', $seo ?? [])

    <link rel="shortcut icon" href="{{Voyager::image(setting('site.favicon'))}}" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">    
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="/src/css/style.css">
    @yield('css')
</head>
<body>
    <header class="py-1 bg-white position-relative" style="z-index: 9999999">
        <div class="container">
            <div class="menu-container">
              <div>
                <a href="{{route('home')}}" class="text-decoration-none d-block">
                  <img src="{{Voyager::image(setting('site.logo'))}}" alt="Logo {{setting('site.title')}}" class="d-block" style="max-height: 4em">
                </a>
              </div>
              <div class="d-flex d-md-none menu-open-button align-items-center justify-content-center p-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="1.6em" height="1.6em" viewBox="0 0 24 24">
                  <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12H9m12 6H7M21 6H3" />
                </svg>
              </div>
              <nav class="menu-box">
                <div class="d-flex d-md-none menu-close-button align-items-center bg-success text-white p-2 rounded-5 justify-content-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 16 16">
                    <path fill="currentColor" fill-rule="evenodd" d="M1.25 8A.75.75 0 0 1 2 7.25h10.19L9.47 4.53a.75.75 0 0 1 1.06-1.06l4 4a.75.75 0 0 1 0 1.06l-4 4a.75.75 0 1 1-1.06-1.06l2.72-2.72H2A.75.75 0 0 1 1.25 8" clip-rule="evenodd" />
                  </svg>
                </div>
                <a href="{{route('home')}}" class="menu-item text-decoration-none {{Route::is('home') ? 'active' : ''}}">Beranda</a>
                <div class="menu-item text-decoration-none has-dropdown {{Route::is('about') ? 'active' : ''}}">
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="me-3">
                      Tanur
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="0.7em" height="0.7em" viewBox="0 0 1024 1024">
                      <path fill="currentColor" d="M104.704 338.752a64 64 0 0 1 90.496 0l316.8 316.8l316.8-316.8a64 64 0 0 1 90.496 90.496L557.248 791.296a64 64 0 0 1-90.496 0L104.704 429.248a64 64 0 0 1 0-90.496" />
                    </svg>
                  </div>
                  <ul class="menu-dropdown-box mt-2 list-unstyled rounded-3 shadow">
                    <li class="menu-dropdown-item"><a href="{{route('about')}}" class="text-decoration-none d-block p-2 px-3">Tentang Kami</a></li>
                    <li class="menu-dropdown-item"><a href="{{url('/about').'#prakata'}}" class="text-decoration-none d-block p-2 px-3">Prakata</a></li>
                    <li class="menu-dropdown-item"><a href="{{url('/about').'#visi-misi'}}" class="text-decoration-none d-block p-2 px-3">Visi Misi</a></li>
                    <li class="menu-dropdown-item"><a href="{{url('/about').'#sejarah'}}" class="text-decoration-none d-block p-2 px-3">Sejarah</a></li>
                    <li class="menu-dropdown-item"><a href="{{url('/about').'#kenapa-tanur'}}" class="text-decoration-none d-block p-2 px-3">Mengapa Tanur</a></li>
                    <li class="menu-dropdown-item"><a href="{{url('/about').'#legalitas'}}" class="text-decoration-none d-block p-2 px-3">Legalitas</a></li>
                    <li class="menu-dropdown-item"><a href="{{url('/about').'#tim'}}" class="text-decoration-none d-block p-2 px-3">Tim</a></li>
                  </ul>
                </div>
                <a href="{{route('package.index')}}" class="menu-item text-decoration-none {{Route::is('package.*') ? 'active' : ''}}">Paket</a>
                <a href="{{route('news.index')}}" class="menu-item text-decoration-none {{Route::is('news.*') ? 'active' : ''}}">Berita</a>
                <a href="{{route('merchandise.index')}}" class="menu-item text-decoration-none {{Route::is('merchandise.*') ? 'active' : ''}}">Merchandise</a>
                <a href="{{route('contact')}}" class="menu-item text-decoration-none {{Route::is('contact') ? 'active' : ''}}">Kontak</a>
              </nav>
            </div>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
    <a href="{{\App\Helpers\GeneralHelper::waLink('Hallo Tanur Muthmainnah, Saya ingin bertanya seputar haji dan umroh')}}" style="display: inline-block; z-index: 9999" class="whatsapp-icon text-decoration-none position-fixed bottom-0 end-0">
      <img src="/src/images/wa-cta.png" alt="Whatsapp Chat Admin" style="width: 6em">
    </a>
    <footer style="background: radial-gradient(184.54% 77.95% at 111.54% 7.3%, #007473 0%, #132F57 100%);">
      <div class="container py-5">
        <div class="row">
          <div class="col-md-5">
            <ul class="list-unstyled d-flex flex-column gap-2">
              <li><h6 class="tanur-coklat">Kontak</h6></li>
              <li>
                <a href="" class="d-flex align-items-center gap-2 text-white text-decoration-none">
                  <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M21 16.42v3.536a1 1 0 0 1-.93.998Q19.415 21 19 21C10.163 21 3 13.837 3 5q0-.414.046-1.07A1 1 0 0 1 4.044 3H7.58a.5.5 0 0 1 .498.45q.034.344.064.552A13.9 13.9 0 0 0 9.35 8.003c.095.2.033.439-.147.567l-2.158 1.542a13.05 13.05 0 0 0 6.844 6.844l1.54-2.154a.46.46 0 0 1 .573-.149a13.9 13.9 0 0 0 4 1.205q.208.03.55.064a.5.5 0 0 1 .449.498" />
                  </svg>
                  {{setting('company.telp')}}
                </a>
              </li>
              <li>
                <a href="" class="d-flex align-items-center gap-2 text-white text-decoration-none">
                  <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M20 4H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2m0 4.236l-8 4.882l-8-4.882V6h16z" />
                  </svg>
                  {{setting('company.mail')}}
                </a>
              </li>
              <li>
                <a href="" class="d-flex align-items-start gap-2 text-white text-decoration-none">
                  <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                      <path fill="currentColor" d="M18 15h-2v2h2m0-6h-2v2h2m2 6h-8v-2h2v-2h-2v-2h2v-2h-2V9h8M10 7H8V5h2m0 6H8V9h2m0 6H8v-2h2m0 6H8v-2h2M6 7H4V5h2m0 6H4V9h2m0 6H4v-2h2m0 6H4v-2h2m6-10V3H2v18h20V7z" />
                    </svg>
                  </div>
                  {{setting('company.address')}}
                </a>
              </li>
            </ul>
            <div class="d-inline-flex bg-white align-items-center p-2 px-3 gap-3 rounded-5 my-4">
              <img src="/src/images/5umrah.png" alt="5 Umrah Logo" style="display: block; height: 2em; object-fit:contain">
              <img src="/src/images/himpuh.png" alt="5 Umrah Logo" style="display: block; height: 2em; object-fit:contain">
              <img src="/src/images/IATAlogo.svg" alt="5 Umrah Logo" style="display: block; height: 2em; object-fit:contain">
              <img src="/src/images/kan.png" alt="5 Umrah Logo" style="display: block; height: 2em; object-fit:contain">
              <img src="/src/images/kemenag.png" alt="5 Umrah Logo" style="display: block; height: 2em; object-fit:contain">
              <img src="/src/images/Sucofindo.png" alt="5 Umrah Logo" style="display: block; height: 2em; object-fit:contain">
            </div>
          </div>
          <div class="col-md-3">
            <ul class="list-unstyled d-flex flex-column gap-2">
              <li><h6 class="tanur-coklat">Menu</h6></li>
              <li>
                <a href="{{route('home')}}" class="text-white text-decoration-none">
                  Beranda
                </a>
              </li>
              <li>
                <a href="{{route('about')}}" class="text-white text-decoration-none">
                  Tanur
                </a>
              </li>
              <li>
                <a href="{{url('/about#legalitas')}}" class="text-white text-decoration-none">
                  Legalitas
                </a>
              </li>
              <li>
                <a href="{{route('news.index')}}" class="text-white text-decoration-none">
                  Berita
                </a>
              </li>
              <li>
                <a href="{{route('merchandise.index')}}" class="text-white text-decoration-none">
                  Merchandise
                </a>
              </li>
              <li>
                <a href="{{route('contact')}}" class="text-white text-decoration-none">
                  Kontak
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="list-unstyled d-flex flex-column gap-2">
              <li><h6 class="tanur-coklat">Paket</h6></li>
              @foreach (\App\Models\Package::all() as $package)
              <li>
                <a href="{{route('package.show', $package->slug)}}" class="text-white text-decoration-none">
                  {{$package->title}}
                </a>
              </li>
              @endforeach
            </ul>
          </div>
        </div>
        <div class="col-12">
          <div class="text-white mt-4">
            Copyright &copy; {{\Carbon\Carbon::parse(now())->format('Y')}} {{setting('site.footer_credit')}} 
          </div>
        </div>
      </div>
    </footer>

    <!-- jQuery (necessary for Owl Carousel) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Owl Carousel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <script src="/src/js/script.js"></script>
    <script src="/src/js/carousel.js"></script>
    @yield('scripts')    
</body>
</html>