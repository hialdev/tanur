@extends('layouts.base')
@section('css')
@endsection

@section('content')
    <section>
        <div class="">
            <div class="position-relative">
                <div class="owl-carousel owl-theme hero-carousel">
                    @foreach ($jumbotrons as $jumbotron)
                        @if($jumbotron->is_just_background)
                        <a href="{{url($jumbotron->link)}}"
                            class="d-flex align-items-center justify-content-center text-decoration-none"
                            >
                            <img src="{{Voyager::image($jumbotron->background_image)}}" alt="Jumbotron {{$jumbotron->title}}" class="d-block w-100" style="max-height: 85vh; object-fit:cover; aspect-ratio:16/9;">
                        </a>
                        @else
                        <a href="{{url($jumbotron->link)}}"
                            class="d-flex align-items-center justify-content-center p-3 text-decoration-none text-dark bg-gradient-green w-100 text-white"
                            style="height:100%; max-height: 85vh; object-fit:cover; aspect-ratio:16/9;">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <img src="{{Voyager::image($jumbotron->image)}}" alt="Image {{$jumbotron->title}}" class="d-block w-100">
                                    </div>
                                    <div class="col-6">
                                        <h2 class="d-md-none fs-5">{{$jumbotron->title}}</h2>
                                        <h2 class="d-none d-md-block d-lg-none fs-2 fs-2 fs-lg-1">{{$jumbotron->title}}</h2>
                                        <h2 class="d-none d-lg-block fs-1">{{$jumbotron->title}}</h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endif
                    @endforeach
                </div>
                <div class="position-absolute p-4 bottom-0 start-0" style="z-index: 9">
                    <div class="container">
                        <div id="hero-dots" class="custom-dots"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-tanur-green">
        <div class="container-fluid">
            <div class="bg-tanur-green p-2">
                <marquee>Umrah dan Haji terbaik adalah yang apabila dikerjakan hanya dengan niat menggapai ridho Allah •
                    Atas
                    izin Alah Tanur Muthmainnah menjadi Travel terbaik untuk ibadah anda</marquee>
            </div>
        </div>
    </section>

    <section>
        <div class="container py-4">
            <div class="row">
                <div class="col-lg-7 mb-3">
                    <h2>{{setting('title.weather')}}</h2>
                    <hr class="divider">
                    <div class="weather-box">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <a class="rounded-4 weatherwidget-io" href="https://forecast7.com/en/21d3939d86/mecca/" data-label_1="Makkah Al Mukarramah" data-label_2="Weather" data-font="Helvetica" data-icons="Climacons Animated" data-days="5" data-theme="weather_one" >Makkah Al Mukarramah Cuaca</a>
                                <script>
                                !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
                                </script>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <a class="rounded-4 weatherwidget-io" href="https://forecast7.com/en/24d5239d57/medina/" data-label_1="Madinah Al Munawarah" data-label_2="Cuaca" data-font="Helvetica" data-icons="Climacons Animated" data-days="5" data-theme="weather_one" >Madinah Al Munawarah Cuaca</a>
                                <script>
                                !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 mb-3">
                    <h2>{{setting('title.currency')}}</h2>
                    <hr class="divider">
                    <div class="currency-box bg-gradient-green text-white p-3 pb-4 rounded-4">
                        <div class="row">
                            <div class="col-12 text-center">
                                <div class="bg-radial-coklat-tua mb-2 text-white px-3 fw-semibold d-inline-flex mx-auto text-dark p-2 rounded-3">
                                    {{\Carbon\Carbon::parse(now())->format('d M Y')}}
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="./src/images/saudi.png" alt="" class="d-block shadow-sm rounded-2"
                                        style="height:3em;object-fit:contain">
                                    <div class="fs-5 tanur-coklat fw-bold">SAR</div>
                                    <div class="fs-3">1 SAR</div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="h-100 d-flex align-items-center justify-content-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="m21.71 9.29l-4-4a1 1 0 0 0-1.42 1.42L18.59 9H7a1 1 0 0 0 0 2h14a1 1 0 0 0 .92-.62a1 1 0 0 0-.21-1.09M17 13H3a1 1 0 0 0-.92.62a1 1 0 0 0 .21 1.09l4 4a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.42L5.41 15H17a1 1 0 0 0 0-2" />
                                    </svg>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="./src/images/indonesia.svg" alt="" class="d-block shadow-sm rounded-2"
                                        style="height:3em;object-fit:contain">
                                    <div class="fs-5 tanur-coklat fw-bold">IDR</div>
                                    <div class="fs-3">{{$kurs}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container py-4">
            <div class="row">
                <div class="col-12 mb-5">
                    <h2>{{setting('title.why')}}</h2>
                    <hr class="divider">
                </div>
                @foreach ($values as $value)
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="p-5 h-100 bg-light position-relative border border-success rounded-4">

                        <div class="position-absolute top-0 start-0 end-0 d-flex align-items-center justify-content-center"
                            style="margin-top:-3em">
                            <div
                                class="d-inline-flex align-items-center justify-content-center p-3 bg-white border border-success rounded-circle">
                                <img src="{{Voyager::image($value->image)}}" alt="Image Icon {{$loop->index}}" class="rounded-circle"
                                    style="width: 4em; height:4em; object-fit:contain;">
                            </div>
                        </div>
                        <p class="pt-3">
                            {{$value->description}}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section>

    <section>
        <div class="container py-4">
            <div class="row">
                <div class="col-12 mb-5">
                    <h2>{{setting('title.package')}}</h2>
                    <hr class="divider">
                </div>

                <div class="owl-carousel owl-theme paket-carousel">
                    @if(setting('site.home_show_type'))
                        @foreach ($type_packages as $package)
                        <div class="">
                            <div class="position-relative rounded-4 overflow-hidden">
                                <img src="{{Voyager::image($package->image)}}" alt="{{$package->title}}" style="aspect-ratio:3/4.8; object-fit:cover"  class="d-block w-100 object-fit-cover">
                                <div
                                    class="d-flex flex-column p-5 p-md-4 text-center align-items-center h-100 position-absolute top-0 end-0 start-0 bottom-0">
                                    <h3 class="fs-2 fs-md-5 fs-lg-2 fw-bold text-white">{{$package->title}}</h3>
                                    <p class="text-white">{{$package->excerpt}}</p>
                                    <a href="{{route('package.index', ['jenis' => $package->id])}}" class="btn btn-light rounded-5 px-3 mt-auto">Lihat Paket Untuk Jenis Ini</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        @foreach ($packages as $package)
                        <div class="">
                            <div class="position-relative rounded-4 overflow-hidden">
                                <img src="{{Voyager::image($package->image)}}" alt="{{$package->title}}" style="aspect-ratio:3/4.8; object-fit:contain"  class="d-block w-100 object-fit-cover">
                                <div
                                    class="d-flex flex-column p-5 p-md-4 text-center align-items-center h-100 position-absolute top-0 end-0 start-0 bottom-0">
                                    <a href="{{route('package.show', $package->slug)}}" class="btn btn-light rounded-5 px-3 mt-auto">Lihat Detail Paket</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container py-4 pb-3">
            <h2>{{setting('title.facility')}}</h2>
            <hr class="divider">
        </div>
        <div style="background-color: #132F57">
            <div class="container py-5">
                <div class="row">
                    @foreach ($facilities as $facility)
                        <div class="col-6 col-md-3 mb-3">
                            <div style="aspect-ratio:1/1"
                                class="p-3 text-white border border-success rounded-4 d-flex align-items-center justify-content-center flex-column text-center">
                                <div class="d-flex mb-3 align-items-center justify-content-center">
                                    <span class="iconify tanur-coklat" style="font-size: 65px" data-icon="{{$facility->id_icon}}" data-inline="false"></span>
                                </div>
                                {{$facility->name}}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light">
        <div class="container py-4 pb-0 mt-2 pb-0">
            <h2>{{setting('title.testi')}}</h2>
            <hr class="divider">
        </div>
        <div class="p-4 pb-0">
            <div class="owl-carousel owl-theme testimonial-carousel">
                @foreach ($featured_reviews as $freview)
                <div class="d-none d-md-block" style="padding: 5em 3em">
                    <div class="d-flex align-items-center gap-3 rounded-4 bg-gradient-green text-white">
                        <img src="{{Voyager::image($freview->image)}}" alt="Testimonial {{$freview->name}}" class="d-block position-relative"
                            style="max-width: 10em; margin-left:-4em; margin-top:-5em; margin-bottom:-0.5em">
                        <div class="pe-5">
                            <p class="fs-6">
                                {{$freview->review}}
                            </p>
                            <div class="fw-semibold fs-5">{{$freview->name}}</div>
                            <div class="fw-semibold fs-6 tanur-coklat">{{$freview->position}}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="owl-carousel owl-theme testimonial-carousel">
                @foreach ($featured_reviews as $freview)
                <div class="d-md-none mb-4">
                    <div class="d-flex align-items-center flex-column gap-3 p-5 bg-white rounded-4">
                        <div>
                            <img src="{{Voyager::image($freview->image)}}" alt="Featured Review {{$freview->name}}" class="d-block w-100 bg-gradient-green rounded-circle" style="width: 9em; height:9em; object-fit:cover; aspect-ratio:1/1; object-position:top">
                        </div>
                        <div class="text-center">
                            <p class="fs-6 text-muted">
                                {{$freview->review}}
                            </p>
                            <div class="fw-semibold fs-5 tanur-green">{{$freview->name}}</div>
                            <div class="fw-semibold fs-6 tanur-coklat">{{$freview->position}}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="border-bottom" style="border-color: #c3932d !important">
        <div class="container py-5">
            <div class="owl-carousel owl-theme testimonial-general-carousel">
                @foreach ($reviews as $review)
                <div class="">
                    <div class="d-flex align-items-start gap-3">
                        <img src="{{Voyager::image($review->image)}}" alt="Image {{$review->name}} Testimoni" class="d-block rounded-circle"
                            style="width: 4em; height:4em; object-fit:cover;">
                        <div>
                            <p style="font-size: 13px">
                                {{$review->review}}
                            </p>
                            <div class="fw-bold tanur-green fs-6">{{$review->name}}</div>
                            <div class="tanur-coklat d-flex align-items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                    viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                        d="M108 80a20 20 0 1 1 20 20a20 20 0 0 1-20-20m-48 0a68 68 0 0 1 136 0c0 62.25-59.51 97-62.05 98.42a12 12 0 0 1-11.9 0C119.51 177 60 142.25 60 80m24 0c0 38.2 30.71 64.2 44 73.64c13.21-9.49 44-35.64 44-73.64a44 44 0 0 0-88 0m124.57 65.6a12 12 0 1 0-9.14 22.19C213.56 173.61 220 180.27 220 184c0 4-7.13 11.07-22.77 17.08c-18.3 7-42.89 10.92-69.23 10.92s-50.93-3.88-69.23-10.92C43.12 195.07 36 188 36 184c0-3.73 6.44-10.39 20.57-16.21a12 12 0 1 0-9.14-22.19C31.27 152.25 12 164.31 12 184c0 34.14 58.36 52 116 52c29.22 0 56.86-4.44 77.85-12.52C220.1 218 244 205.59 244 184c0-19.69-19.27-31.75-35.43-38.4" />
                                </svg>
                                {{$review->location}}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section>
        <div class="container py-4">
            <div class="row">
                <div class="col-12">
                    <h2>{{setting('title.news_home')}}</h2>
                    <hr class="divider">
                </div>
                @foreach ($news as $new)
                <div class="col-sm-6 col-md-4 mb-2 col-lg-3">
                    <div class="bg-light rounded-4 overflow-hidden">
                        <img src="{{Voyager::image($new->image)}}" alt="Image {{$new->title}} News" class="d-block w-100 object-fit-cover" style="aspect-ratio:16/9;">
                        <a href="{{route('news.show', $new->slug)}}" class="p-4 d-block text-decoration-none text-dark">
                            <div class="tanur-green mb-1" style="font-size:13px">{{\Carbon\Carbon::parse($new->created_at)->format('d M Y')}}</div>
                            <h6 class="line-clamp line-clamp-2">{{$new->title}}</h6>
                            <p class="mb-0 line-clamp line-clamp-3">
                                {{$new->excerpt}}
                            </p>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="border-top" style="border-color: #c3932d !important; background-color:#f2f2f2">
        <div class="container py-5">
            <h2>{{setting('title.socmed')}}</h2>
            <hr class="divider">
            <div class="row">
                @foreach ($socmeds as $socmed)
                <div class="col-md-3 mb-2">
                    <a href="{{url($socmed->link)}}"
                        class="text-decoration-none d-flex text-dark align-items-center gap-3 bg-white p-3 rounded-3 ">
                        <div>
                            <span class="iconify fs-5" data-icon="{{$socmed->id_icon}}" data-inline="false"></span>
                        </div>
                        {{$socmed->username}}
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section>
        <div class="container py-5">
            <h2>{{setting('title.partner')}}</h2>
            <hr class="divider">
            <div>
                <img src="{{Voyager::image(setting('content.partner_image'))}}" alt="Partner Logo" class="d-block w-100">
            </div>
        </div>
    </section>


    <section style="background-color: #f2f2f2">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-md-6 mb-3">
                    <img src="{{Voyager::image(setting('content.app_image'))}}" alt="MockUp App" class="d-block w-100">
                </div>
                <div class="col-md-6 mb-3">
                    <h3 class="fs-1 tanur-dark">
                        {{setting('content.app_title')}}
                    </h3>
                    <div class="fs-2 tanur-green">
                        {{setting('content.app_subtitle')}}
                    </div>
                    <hr class="divider">
                    <div class="d-flex align-items-center gap-3">
                        <a href="{{url(setting('content.app_gplay'))}}"><img src="./src/images/googleplay.png" alt="GP" class="d-block w-100"
                                style="height:3em;"></a>
                        <a href="{{url(setting('content.app_appstore'))}}"><img src="./src/images/appstore.png" alt="App Store" class="d-block w-100"
                                style="height:3em;"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        // $(document).ready(function() {
        //     const weatherApiKey = 'bf14d430002e6b686c80cc74f4895979'; // Ganti dengan API key Anda
        //     const exchangeApiKey = '8c734af4a2574a02a4ea11b8'; // Ganti dengan API key Anda

        //     // OpenWeatherMap API URL
        //     const weatherApiUrl =
        //         `https://api.openweathermap.org/data/2.5/weather?q=Mecca&units=metric&appid=${weatherApiKey}`;

        //     // ExchangeRate API URL
        //     const exchangeApiUrl = `https://v6.exchangerate-api.com/v6/${exchangeApiKey}/latest/IDR`;

        //     // Ambil data cuaca terkini di Mekkah
        //     $.get(weatherApiUrl, function(data) {
        //         const temp = Math.round(data.main.temp); // Suhu dalam Celsius
        //         const iconCode = data.weather[0].icon; // Kode ikon cuaca
        //         const iconUrl = `https://openweathermap.org/img/wn/${iconCode}@2x.png`;

        //         // Update HTML untuk cuaca
        //         $('.weather-box img').attr('src', iconUrl); // Update ikon cuaca
        //         $('.weather-box .fs-1').text(`${temp}°C`); // Update suhu
        //         $('.weather-box .fs-1').next().text('Cuaca Terkini di Mekkah'); // Update deskripsi
        //     }).fail(function() {
        //         console.error('Gagal mendapatkan data cuaca.');
        //         $('.weather-box .fs-1').text('N/A'); // Jika gagal, tampilkan "N/A"
        //         $('.weather-box img').attr('src', 'https://placehold.co/400'); // Gunakan placeholder
        //     });

        //     // Ambil data kurs IDR ke SAR
        //     $.get(exchangeApiUrl, function(data) {
        //         const rate = data.conversion_rates.SAR; // Kurs IDR ke SAR
        //         const convertedValue = (1000 * rate).toFixed(2); // Hasil konversi 1000 IDR ke SAR

        //         // Update HTML untuk currency
        //         $('.currency-box .col-6:nth-child(3) .fs-2').text(
        //         `${convertedValue} SAR`); // Tampilkan nilai SAR
        //     }).fail(function() {
        //         console.error('Gagal mendapatkan data kurs.');
        //         $('.currency-box .col-6:nth-child(3) .fs-2').text('N/A'); // Jika gagal, tampilkan "N/A"
        //     });
        // });
    </script>
@endsection
