@extends('layouts.base')
@section('content')
    <div class="container py-5">
        <div class="">
            <div data-target="#prakata"
                class="button-accordion d-flex border-bottom border-3 py-2 pt-3 border-coklat align-items-center justify-content-between"
                style="cursor: pointer">
                <h2 class="fs-5 fw-bold tanur-coklat">Prakata</h2>
                <div class="tanur-green arrow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="2.2em" height="2.2em" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2S2 6.477 2 12s4.477 10 10 10" opacity="0.5" />
                        <path fill="currentColor"
                            d="M13.53 8.47a.75.75 0 1 0-1.06 1.06l1.72 1.72H8a.75.75 0 0 0 0 1.5h6.19l-1.72 1.72a.75.75 0 1 0 1.06 1.06l3-3a.75.75 0 0 0 0-1.06z" />
                    </svg>
                </div>
            </div>
            <div id="prakata" class="box-accordion py-4">
                <div class="row align-items-end">
                    <div class="col-md-2 position-relative" style="z-index: 1;margin-right:-6em">
                        <img src="{{Voyager::image(setting('about.prakata_image'))}}" alt="Image Prakata {{setting('about.prakata_name')}}" class="w-100 d-block"
                            style="max-height: 20em; object-fit:contain;">
                    </div>
                    <div class="col-md-10" style="margin-bottom: -0.9em">
                        <div class="bg-gradient-green rounded-bottom-0 rounded-5 p-5 text-white">
                            <div class="d-flex align-items-start gap-4 ps-md-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="4.42em" height="4.2em"
                                    viewBox="0 0 1664 1408">
                                    <path fill="currentColor"
                                        d="M768 832v384q0 80-56 136t-136 56H192q-80 0-136-56T0 1216V512q0-104 40.5-198.5T150 150T313.5 40.5T512 0h64q26 0 45 19t19 45v128q0 26-19 45t-45 19h-64q-106 0-181 75t-75 181v32q0 40 28 68t68 28h224q80 0 136 56t56 136m896 0v384q0 80-56 136t-136 56h-384q-80 0-136-56t-56-136V512q0-104 40.5-198.5T1046 150t163.5-109.5T1408 0h64q26 0 45 19t19 45v128q0 26-19 45t-45 19h-64q-106 0-181 75t-75 181v32q0 40 28 68t68 28h224q80 0 136 56t56 136" />
                                </svg>
                                <div>
                                    <div class="fs-3 mb-3">
                                        {{setting('about.prakata_review')}}
                                    </div>
                                    <div class="fw-bold fs-5">{{setting('about.prakata_name')}}</div>
                                    <div>{{setting('about.prakata_jabatan')}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-radial-coklat p-5 rounded-4 position-relative">
                    {!! setting('about.prakata_content') !!}
                </div>
            </div>
        </div>

        <div class="">
            <div data-target="#visi-misi"
                class="button-accordion d-flex border-bottom border-3 py-2 pt-3 border-coklat align-items-center justify-content-between"
                style="cursor: pointer">
                <h2 class="fs-5 fw-bold tanur-coklat">Visi Misi</h2>
                <div class="tanur-green arrow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="2.2em" height="2.2em" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2S2 6.477 2 12s4.477 10 10 10" opacity="0.5" />
                        <path fill="currentColor"
                            d="M13.53 8.47a.75.75 0 1 0-1.06 1.06l1.72 1.72H8a.75.75 0 0 0 0 1.5h6.19l-1.72 1.72a.75.75 0 1 0 1.06 1.06l3-3a.75.75 0 0 0 0-1.06z" />
                    </svg>
                </div>
            </div>
            <div id="visi-misi" class="box-accordion py-4">
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="d-flex gap-5 rounded-4 p-5 text-white align-items-start bg-gradient-green">
                            <h3>Visi</h3>
                            <div>
                                {!! setting('about.vm_visi') !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="d-flex gap-5 rounded-4 p-5 text-white align-items-start bg-radial-coklat-tua">
                            <h3>Misi</h3>
                            <div>
                                {!! setting('about.vm_misi') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="">
            <div data-target="#sejarah"
                class="button-accordion d-flex border-bottom border-3 py-2 pt-3 border-coklat align-items-center justify-content-between"
                style="cursor: pointer">
                <h2 class="fs-5 fw-bold tanur-coklat">Sejarah</h2>
                <div class="tanur-green arrow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="2.2em" height="2.2em" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2S2 6.477 2 12s4.477 10 10 10" opacity="0.5" />
                        <path fill="currentColor"
                            d="M13.53 8.47a.75.75 0 1 0-1.06 1.06l1.72 1.72H8a.75.75 0 0 0 0 1.5h6.19l-1.72 1.72a.75.75 0 1 0 1.06 1.06l3-3a.75.75 0 0 0 0-1.06z" />
                    </svg>
                </div>
            </div>
            <div id="sejarah" class="box-accordion py-4">
                <div class="row pt-5">
                    <div class="col-12 mb-3">
                        <div class="bg-radial-coklat rounded-4 px-5">
                            <div class="row align-items-center">
                                <div class="col-md-4 col-lg-2">
                                  <div class="text-dark" style="max-width: 10em; object-fit:contain; margin-top:-4em">
                                      <img src="{{Voyager::image(setting('about.sejarah_image'))}}" alt="Sejarah Image Icon" class="d-block w-100">
                                  </div>
                                </div>
                                <div class="col-md-8 col-lg-10">
                                    <div class="fs-5 py-5 py-md-0">
                                        {{setting('about.sejarah_excerpt')}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="bg-light p-5 rounded-4">
                            {!! setting('about.sejarah_content') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="">
            <div data-target="#kenapa-tanur"
                class="button-accordion d-flex border-bottom border-3 py-2 pt-3 border-coklat align-items-center justify-content-between"
                style="cursor: pointer">
                <h2 class="fs-5 fw-bold tanur-coklat">{{setting('title.why')}}</h2>
                <div class="tanur-green arrow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="2.2em" height="2.2em" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2S2 6.477 2 12s4.477 10 10 10" opacity="0.5" />
                        <path fill="currentColor"
                            d="M13.53 8.47a.75.75 0 1 0-1.06 1.06l1.72 1.72H8a.75.75 0 0 0 0 1.5h6.19l-1.72 1.72a.75.75 0 1 0 1.06 1.06l3-3a.75.75 0 0 0 0-1.06z" />
                    </svg>
                </div>
            </div>
            <div id="kenapa-tanur" class="box-accordion py-4">
                <div class="row pt-5 align-items-stretch">
                    @foreach ($values as $value)
                    <div class="col-md-6 col-lg-4 mb-3">
                        <div class="p-5 bg-light h-100 position-relative border border-success rounded-4">
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
        </div>

        <div class="">
            <div data-target="#legalitas"
                class="button-accordion d-flex border-bottom border-3 py-2 pt-3 border-coklat align-items-center justify-content-between"
                style="cursor: pointer">
                <h2 class="fs-5 fw-bold tanur-coklat">Legalitas</h2>
                <div class="tanur-green arrow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="2.2em" height="2.2em" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2S2 6.477 2 12s4.477 10 10 10" opacity="0.5" />
                        <path fill="currentColor"
                            d="M13.53 8.47a.75.75 0 1 0-1.06 1.06l1.72 1.72H8a.75.75 0 0 0 0 1.5h6.19l-1.72 1.72a.75.75 0 1 0 1.06 1.06l3-3a.75.75 0 0 0 0-1.06z" />
                    </svg>
                </div>
            </div>
            <div id="legalitas" class="box-accordion py-4">
                <div class="row">
                    @foreach ($legalitas as $legal)
                        <div class="col-md-6 mb-3">
                            <div class="d-flex text-center h-100 flex-column align-items-center gap-4 p-4 bg-light rounded-4 mb-2">
                                <img src="{{Voyager::image($legal->image)}}" alt="{{$legal->name}} Logo" class="d-block" style="height: 4em; object-fit:contain">
                                <div>
                                    <div class="">{{$legal->name}}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="">
            <div data-target="#tim"
                class="button-accordion d-flex border-bottom border-3 py-2 pt-3 border-coklat align-items-center justify-content-between"
                style="cursor: pointer">
                <h2 class="fs-5 fw-bold tanur-coklat">Tim Tanur</h2>
                <div class="tanur-green arrow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="2.2em" height="2.2em" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2S2 6.477 2 12s4.477 10 10 10" opacity="0.5" />
                        <path fill="currentColor"
                            d="M13.53 8.47a.75.75 0 1 0-1.06 1.06l1.72 1.72H8a.75.75 0 0 0 0 1.5h6.19l-1.72 1.72a.75.75 0 1 0 1.06 1.06l3-3a.75.75 0 0 0 0-1.06z" />
                    </svg>
                </div>
            </div>
            <div id="tim" class="box-accordion py-4">
                <div class="row">
                    @foreach ($teams as $team)
                        <div class="col-md-4 col-lg-3">
                            <div class="bg-light text-center rounded-4 overflow-hidden">
                                <div class="bg-gradient-green">
                                    <img src="{{Voyager::image($team->image)}}" alt="{{$team->name}} Team" style="aspect-ratio:3/4; object-fit:cover; object-position:top" class="d-block w-100">
                                </div>
                                <div class="p-4">
                                    <div class="fw-bold text-dark fs-4">{{$team->name}}</div>
                                    <div class="tanur-coklat">{{$team->jabatan}}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            // Semua accordion ditutup terlebih dahulu
            $('.box-accordion').hide();

            // Periksa apakah ada hash di URL
            let hash = window.location.hash;

            if (hash && $(hash).length) {
                // Jika hash ditemukan dan sesuai dengan elemen accordion, buka elemen tersebut
                $(hash).show();
                $(`.button-accordion[data-target="${hash}"] .arrow`).addClass('arrow-rotate');
            } else {
                // Jika tidak ada hash, buka accordion pertama secara default
                $('.box-accordion:first').show();
                $('.button-accordion:first .arrow').addClass('arrow-rotate');
            }

            // Tambahkan event listener untuk klik pada button accordion
            $(".button-accordion").click(function() {
                let target = $(this).data("target");

                // Tutup semua accordion
                $('.box-accordion').slideUp("slow");
                $('.arrow').removeClass('arrow-rotate');

                if ($(target).is(":hidden")) {
                    // Jika accordion yang diklik tertutup, buka dan tambahkan efek
                    $(target).slideDown("slow");
                    $(this).find('.arrow').addClass('arrow-rotate');
                }
            });
        });
    </script>
@endsection