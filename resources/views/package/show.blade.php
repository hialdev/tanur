@extends('layouts.base')
@section('content')
<section>
  <div class="container py-5">
    <div class="bg-light mb-3 p-2 px-3 rounded-pill d-inline-flex align-items-center gap-2">
      <a href="{{route('package.index')}}" class="text-decoration-none tanur-coklat">Paket</a>
      <span>/</span>
      <span>{{$package->title}}</span>
    </div>
    <a href="{{route('package.index')}}" class="d-block text-decoration-none fs-5 tanur-green fw-bold pb-3 mb-3 border-bottom border-coklat">Paket</a>
    <div class="row">
      <div class="col-md-7">
        <h1 class="mb-2">{{$package->title}}</h1>
        <div class="fs-4 mb-3 fw-bold text-danger">
          {{\App\Helpers\GeneralHelper::formatRupiah($package->price)}}
        </div>
        <img src="{{Voyager::image($package->image)}}" alt="Paket {{$package->title}} Image" class="mb-3 d-block w-100 border border-coklat rounded-3">
      </div>
      <div class="col-md-5">
        <div class="bg-light p-4 rounded-4 border border-success">
          <div class="d-flex align-items-start gap-3 mb-2">
            <div class="d-flex align-items-center justify-content-center p-2 rounded-circle bg-tanur-green">
              <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                <path fill="currentColor" d="M6.94 2c.416 0 .753.324.753.724v1.46c.668-.012 1.417-.012 2.26-.012h4.015c.842 0 1.591 0 2.259.013v-1.46c0-.4.337-.725.753-.725s.753.324.753.724V4.25c1.445.111 2.394.384 3.09 1.055c.698.67.982 1.582 1.097 2.972L22 9H2v-.724c.116-1.39.4-2.302 1.097-2.972s1.645-.944 3.09-1.055V2.724c0-.4.337-.724.753-.724" />
                <path fill="currentColor" d="M22 14v-2c0-.839-.004-2.335-.017-3H2.01c-.013.665-.01 2.161-.01 3v2c0 3.771 0 5.657 1.172 6.828S6.228 22 10 22h4c3.77 0 5.656 0 6.828-1.172S22 17.772 22 14" opacity="0.5" />
                <path fill="currentColor" d="M18 17a1 1 0 1 1-2 0a1 1 0 0 1 2 0m0-4a1 1 0 1 1-2 0a1 1 0 0 1 2 0m-5 4a1 1 0 1 1-2 0a1 1 0 0 1 2 0m0-4a1 1 0 1 1-2 0a1 1 0 0 1 2 0m-5 4a1 1 0 1 1-2 0a1 1 0 0 1 2 0m0-4a1 1 0 1 1-2 0a1 1 0 0 1 2 0" />
              </svg>
            </div>
            <div>
              <div class="tanur-green" style="font-size: 13px">Tanggal Keberangkatan</div>
              <div class="">{{\Carbon\Carbon::parse($package->tgl_berangkat)->format('d M Y')}}</div>
            </div>
          </div>
          <div class="d-flex align-items-start gap-3 mb-2">
            <div class="d-flex align-items-center justify-content-center p-2 rounded-circle bg-tanur-green">
              <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 32 32">
                <path fill="currentColor" d="M16 2C8.4 2 2 8.4 2 16s6.4 14 14 14s14-6.4 14-14S23.6 2 16 2m4.587 20L15 16.41V7h2v8.582l5 5.004z" />
                <path fill="none" d="M20.587 22L15 16.41V7h2v8.582l5 5.005z" />
              </svg>
            </div>
            <div>
              <div class="tanur-green" style="font-size: 13px">Lama Hari</div>
              <div class="">{{$package->total_days}} hari</div>
            </div>
          </div>
          <div class="d-flex align-items-start gap-3 mb-2">
            <div class="d-flex align-items-center justify-content-center p-2 rounded-circle bg-tanur-green">
              <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                <path fill="currentColor" d="M17 19h2v-8h-6v8h2v-6h2zM3 19V4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v5h2v10h1v2H2v-2zm4-8v2h2v-2zm0 4v2h2v-2zm0-8v2h2V7z" />
              </svg>
            </div>
            <div>
              <div class="tanur-green" style="font-size: 13px">Hotel / Penginapan</div>
              <div class="">
                {{$package->hotel}}
              </div>
              <div style="font-size: 14px" class="d-flex align-items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="tanur-coklat" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                  <path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m8.587 8.236l2.598-5.232a.911.911 0 0 1 1.63 0l2.598 5.232l5.808.844a.902.902 0 0 1 .503 1.542l-4.202 4.07l.992 5.75c.127.738-.653 1.3-1.32.952L12 18.678l-5.195 2.716c-.666.349-1.446-.214-1.319-.953l.992-5.75l-4.202-4.07a.902.902 0 0 1 .503-1.54z" />
                </svg>
                {{$package->hotel_star}}
              </div>
            </div>
          </div>
          <div class="d-flex align-items-start gap-3 mb-2">
            <div class="d-flex align-items-center justify-content-center p-2 rounded-circle bg-tanur-green">
              <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                <path fill="currentColor" d="m2.55 19.225l9.85-14.35q.275-.425.713-.65T14.05 4h5.55q.95 0 1.538.725t.412 1.65l-2.4 12.8q-.075.35-.35.588t-.625.237H2.95q-.3 0-.438-.262t.038-.513M14.5 14q1.05 0 1.775-.725T17 11.5t-.725-1.775T14.5 9t-1.775.725T12 11.5t.725 1.775T14.5 14" />
              </svg>
            </div>
            <div>
              <div class="tanur-green" style="font-size: 13px">Maskapai</div>
              <div class="">{{$package->maskapai}}</div>
            </div>
          </div>
          <div class="d-flex align-items-start gap-3 mb-2">
            <div class="d-flex align-items-center justify-content-center p-2 rounded-circle bg-tanur-green">
              <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20">
                <path fill="currentColor" d="M11.676 5.16a7 7 0 0 0-.377.327a2.1 2.1 0 0 1-.735.465L4.759 7.887l-.593-1.224a1.2 1.2 0 0 0-.245-.341c-.619-.596-1.745-.276-1.902.621A1.3 1.3 0 0 0 2 7.16v2.986A1.75 1.75 0 0 0 4.321 11.8l3.018-1.043l-.293 1.465c-.311 1.555 1.687 2.466 2.657 1.212l3.098-4.006l4.179-1.351c.838-.272 1.332-1.28.737-2.091c-.516-.706-1.425-1.689-2.663-1.93a3 3 0 0 0-.886-.04c-1.018.1-1.909.67-2.492 1.143m-2.562.22l-3.73 1.244l-.04-.05C4.532 5.523 5.28 4 6.605 4c.323 0 .637.097.903.28zM2.5 17a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1z" />
              </svg>
            </div>
            <div>
              <div class="tanur-green" style="font-size: 13px">Bandara</div>
              <div class="">{{$package->bandara}}</div>
            </div>
          </div>
          <div class="d-flex align-items-start gap-3 mb-2">
            <div class="d-flex align-items-center justify-content-center p-2 rounded-circle bg-tanur-green">
              <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20">
                <path fill="currentColor" d="M11.676 5.16a7 7 0 0 0-.377.327a2.1 2.1 0 0 1-.735.465L4.759 7.887l-.593-1.224a1.2 1.2 0 0 0-.245-.341c-.619-.596-1.745-.276-1.902.621A1.3 1.3 0 0 0 2 7.16v2.986A1.75 1.75 0 0 0 4.321 11.8l3.018-1.043l-.293 1.465c-.311 1.555 1.687 2.466 2.657 1.212l3.098-4.006l4.179-1.351c.838-.272 1.332-1.28.737-2.091c-.516-.706-1.425-1.689-2.663-1.93a3 3 0 0 0-.886-.04c-1.018.1-1.909.67-2.492 1.143m-2.562.22l-3.73 1.244l-.04-.05C4.532 5.523 5.28 4 6.605 4c.323 0 .637.097.903.28zM2.5 17a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1z" />
              </svg>
            </div>
            <div>
              <div class="tanur-green" style="font-size: 13px">Jenis Paket</div>
              <div class="">{{$package->type->title}}</div>
            </div>
          </div>
        </div>
        <div class="py-3 position-sticky top-0 bg-white">
          <a href="{{\App\Helpers\GeneralHelper::waLink('Assalamualaikum, saya ingin memesan Paket '.$package->title)}}" class="mb-2 btn btn-success w-100 rounded-4 bg-tanur-green">Pesan Paket Ini</a>
          <a href="{{\App\Helpers\GeneralHelper::waLink('Assalamualaikum, saya ingin konsultasi Paket '.$package->title)}}" class="btn btn-outline-success mb-2 w-100 rounded-4">Konsultasi Dahulu</a>
        </div>
        <div class="rounded-4 mb-3 border border-coklat p-4">
          <div class="fw-bold mb-3">Deskripsi</div>
          <div>
            <p>{{$package->description}}</p>
          </div>
        </div>
        
        <div class="">
            <div data-target="#fasilitas"
                class="button-accordion d-flex border-bottom border-3 py-2 pt-3 border-coklat align-items-center justify-content-between"
                style="cursor: pointer">
                <h2 class="fs-5 fw-bold tanur-coklat">Fasilitas</h2>
                <div class="tanur-green arrow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="2.2em" height="2.2em" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2S2 6.477 2 12s4.477 10 10 10" opacity="0.5" />
                        <path fill="currentColor"
                            d="M13.53 8.47a.75.75 0 1 0-1.06 1.06l1.72 1.72H8a.75.75 0 0 0 0 1.5h6.19l-1.72 1.72a.75.75 0 1 0 1.06 1.06l3-3a.75.75 0 0 0 0-1.06z" />
                    </svg>
                </div>
            </div>
            <div id="fasilitas" class="box-accordion py-4">
                <div class="">
                    {!! $package->fasilitas !!}
                </div>
            </div>
        </div>

        <div class="">
            <div data-target="#itinerary"
                class="button-accordion d-flex border-bottom border-3 py-2 pt-3 border-coklat align-items-center justify-content-between"
                style="cursor: pointer">
                <h2 class="fs-5 fw-bold tanur-coklat">Itinerary</h2>
                <div class="tanur-green arrow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="2.2em" height="2.2em" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2S2 6.477 2 12s4.477 10 10 10" opacity="0.5" />
                        <path fill="currentColor"
                            d="M13.53 8.47a.75.75 0 1 0-1.06 1.06l1.72 1.72H8a.75.75 0 0 0 0 1.5h6.19l-1.72 1.72a.75.75 0 1 0 1.06 1.06l3-3a.75.75 0 0 0 0-1.06z" />
                    </svg>
                </div>
            </div>
            <div id="itinerary" class="box-accordion py-4">
                <div class="">
                    {!! $package->itinerary !!}
                </div>
            </div>
        </div>

        <div class="">
            <div data-target="#persyaratan-peserta"
                class="button-accordion d-flex border-bottom border-3 py-2 pt-3 border-coklat align-items-center justify-content-between"
                style="cursor: pointer">
                <h2 class="fs-5 fw-bold tanur-coklat">Persyaratan Peserta</h2>
                <div class="tanur-green arrow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="2.2em" height="2.2em" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2S2 6.477 2 12s4.477 10 10 10" opacity="0.5" />
                        <path fill="currentColor"
                            d="M13.53 8.47a.75.75 0 1 0-1.06 1.06l1.72 1.72H8a.75.75 0 0 0 0 1.5h6.19l-1.72 1.72a.75.75 0 1 0 1.06 1.06l3-3a.75.75 0 0 0 0-1.06z" />
                    </svg>
                </div>
            </div>
            <div id="persyaratan-peserta" class="box-accordion py-4">
                <div class="">
                    {!! $package->persyaratan !!}
                </div>
            </div>
        </div>

        <div class="">
            <div data-target="#sk"
                class="button-accordion d-flex border-bottom border-3 py-2 pt-3 border-coklat align-items-center justify-content-between"
                style="cursor: pointer">
                <h2 class="fs-5 fw-bold tanur-coklat">Syarat & Ketentuan</h2>
                <div class="tanur-green arrow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="2.2em" height="2.2em" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2S2 6.477 2 12s4.477 10 10 10" opacity="0.5" />
                        <path fill="currentColor"
                            d="M13.53 8.47a.75.75 0 1 0-1.06 1.06l1.72 1.72H8a.75.75 0 0 0 0 1.5h6.19l-1.72 1.72a.75.75 0 1 0 1.06 1.06l3-3a.75.75 0 0 0 0-1.06z" />
                    </svg>
                </div>
            </div>
            <div id="sk" class="box-accordion py-4">
                <div class="">
                    {!! $package->sk !!}
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
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