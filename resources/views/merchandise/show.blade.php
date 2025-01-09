@extends('layouts.base')
@section('content')
<section>
  <div class="container py-5">
    <div class="row">
      <div class="col-md-5 mb-3">
        <div>
          <img id="preview-image" src="{{Voyager::image($merch->image)}}" alt="Image Preview {{$merch->title}}" class="d-block w-100 rounded-3 border-success border mb-3">
          <div class="owl-carousel owl-theme merchandise-show-carousel">
            <div class="btn-image">
              <img src="{{Voyager::image($merch->image)}}" alt="Image Preview {{$merch->title}} Utama" class="d-block w-100 rounded-3 border-success border" style="aspect-ratio:1/1; object-fit:cover">
            </div>
            @php
               $merchImages = json_decode($merch->images);
            @endphp
            @foreach ($merchImages as $img)
            <div class="btn-image">
              <img src="{{Voyager::image($img)}}" alt="Image Preview {{$merch->title}} {{$loop->index}}" class="d-block w-100 rounded-3 border-success border" style="aspect-ratio:1/1; object-fit:cover">
            </div>
            @endforeach
          </div>
        </div>
      </div>
      <div class="col-md-7">
        <div class="bg-light mb-3 p-2 px-3 rounded-pill d-inline-flex align-items-center gap-2">
          <a href="{{route('merchandise.index')}}" class="text-decoration-none tanur-coklat">Merchandise</a>
          <span>/</span>
          <span>{{$merch->title}}</span>
        </div>
        <h1>{{$merch->title}}</h1>
        <h4 class="tanur-green fw-semibold mb-3">{{\App\Helpers\GeneralHelper::formatRupiah($merch->price)}}</h4>
        <h6>Beli Merchandise ini di</h6>
        <div class="d-flex align-items-center rounded-3 overflow-hidden justify-content-around w-100 mt-2">
          <a href="{{url($merch->tokopedia_link)}}" class="{{$merch->tokopedia_link ? '' : 'd-none'}} flex-grow-1 text-decoration-none d-flex gap-2 align-items-center btn btn-light rounded-0 justify-content-center" style="background:#27cd7d">
            <img src="{{env('APP_URL')}}/src/images/icon/tokopedia.png" alt="tokopedia" class="d-block" style="max-height: 1.5em"> Tokopedia
          </a>
          <a href="{{url($merch->shopee_link)}}" class="{{$merch->shopee_link ? '' : 'd-none'}} flex-grow-1 text-decoration-none d-flex gap-2 align-items-center btn btn-light rounded-0 justify-content-center" style="background:#ffbc65">
            <img src="{{env('APP_URL')}}/src/images/icon/shopee.png" alt="Shopee" class="d-block" style="max-height: 1.5em"> Shopee
          </a>
          <a href="{{url($merch->tiktok_link)}}" class="{{$merch->tiktok_link ? '' : 'd-none'}} flex-grow-1 text-decoration-none d-flex gap-2 align-items-center btn btn-light rounded-0 justify-content-center" style="">
            <svg xmlns="http://www.w3.org/2000/svg" width="1.4em" height="1.5em" viewBox="0 0 256 290">
              <path fill="#ff004f" d="M189.72 104.421c18.678 13.345 41.56 21.197 66.273 21.197v-47.53a67 67 0 0 1-13.918-1.456v37.413c-24.711 0-47.59-7.851-66.272-21.195v96.996c0 48.523-39.356 87.855-87.9 87.855c-18.113 0-34.949-5.473-48.934-14.86c15.962 16.313 38.222 26.432 62.848 26.432c48.548 0 87.905-39.332 87.905-87.857v-96.995zm17.17-47.952c-9.546-10.423-15.814-23.893-17.17-38.785v-6.113h-13.189c3.32 18.927 14.644 35.097 30.358 44.898M69.673 225.607a40 40 0 0 1-8.203-24.33c0-22.192 18.001-40.186 40.21-40.186a40.3 40.3 0 0 1 12.197 1.883v-48.593c-4.61-.631-9.262-.9-13.912-.801v37.822a40.3 40.3 0 0 0-12.203-1.882c-22.208 0-40.208 17.992-40.208 40.187c0 15.694 8.997 29.281 22.119 35.9" />
              <path d="M175.803 92.849c18.683 13.344 41.56 21.195 66.272 21.195V76.631c-13.794-2.937-26.005-10.141-35.186-20.162c-15.715-9.802-27.038-25.972-30.358-44.898h-34.643v189.843c-.079 22.132-18.049 40.052-40.21 40.052c-13.058 0-24.66-6.221-32.007-15.86c-13.12-6.618-22.118-20.206-22.118-35.898c0-22.193 18-40.187 40.208-40.187c4.255 0 8.356.662 12.203 1.882v-37.822c-47.692.985-86.047 39.933-86.047 87.834c0 23.912 9.551 45.589 25.053 61.428c13.985 9.385 30.82 14.86 48.934 14.86c48.545 0 87.9-39.335 87.9-87.857z" />
              <path fill="#00f2ea" d="M242.075 76.63V66.516a66.3 66.3 0 0 1-35.186-10.047a66.47 66.47 0 0 0 35.186 20.163M176.53 11.57a68 68 0 0 1-.728-5.457V0h-47.834v189.845c-.076 22.13-18.046 40.05-40.208 40.05a40.06 40.06 0 0 1-18.09-4.287c7.347 9.637 18.949 15.857 32.007 15.857c22.16 0 40.132-17.918 40.21-40.05V11.571zM99.966 113.58v-10.769a89 89 0 0 0-12.061-.818C39.355 101.993 0 141.327 0 189.845c0 30.419 15.467 57.227 38.971 72.996c-15.502-15.838-25.053-37.516-25.053-61.427c0-47.9 38.354-86.848 86.048-87.833" />
            </svg>
            Tiktok
          </a>
        </div>
        <a href="{{\App\Helpers\GeneralHelper::waLink('Hallo Admin, Saya ingin membeli merch '.$merch->title)}}" class="btn btn-outline-success w-100 mt-2">atau Beli langsung ke Admin</a>
        <div class="mt-3">
          {!! $merch->content !!}
        </div>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="container py-5">
    <h4>Rekomendasi Merchandise Untukmu</h4>
    <hr class="divider">
    <div class="owl-theme owl-carousel merchandise-reccomend-carousel">
      @foreach ($reccomend_merchs as $rmerch)
      <div>
        <a href="{{route('merchandise.show', $rmerch->slug)}}" class="d-block text-dark text-decoration-none">
          <img src="{{Voyager::image($rmerch->image)}}" alt="Image Product {{$rmerch->title}}" class="d-block mb-3 rounded-4 border w-100 border-2 border-success" style="aspect-ratio:1/1; object-fit:cover">
          <div>
            <h3 class="fs-6 line-clamp line-clamp-2">{{$rmerch->title}}</h3>
            <div class="fw-bold tanur-green">{{\App\Helpers\GeneralHelper::formatRupiah($rmerch->price)}}</div>
            <div class="d-flex align-items-center rounded-3 overflow-hidden justify-content-around w-100 mt-2">
              <a href="{{url($rmerch->tokopedia_link)}}" class="{{$rmerch->tokopedia_link ? : 'd-none'}} flex-grow-1 text-decoration-none d-flex align-items-center btn btn-light rounded-0 justify-content-center" style="">
                <img src="{{env('APP_URL')}}/src/images/icon/tokopedia.png" alt="tokopedia" class="d-block" style="max-height: 1.5em; object-fit:contain">
              </a>
              <a href="{{url($rmerch->shopee_link)}}" class="{{$rmerch->shopee_link ? : 'd-none'}} flex-grow-1 text-decoration-none d-flex align-items-center btn btn-light rounded-0 justify-content-center" style="">
                <img src="{{env('APP_URL')}}/src/images/icon/shopee.png" alt="Shopee" class="d-block" style="max-height: 1.5em; object-fit:contain">
              </a>
              <a href="{{url($rmerch->tiktok_link)}}" class="{{$rmerch->tiktok_link ? : 'd-none'}} flex-grow-1 text-decoration-none d-flex align-items-center btn btn-light rounded-0 justify-content-center" style="">
                <svg xmlns="http://www.w3.org/2000/svg" width="1.4em" height="1.5em" viewBox="0 0 256 290">
                  <path fill="#ff004f" d="M189.72 104.421c18.678 13.345 41.56 21.197 66.273 21.197v-47.53a67 67 0 0 1-13.918-1.456v37.413c-24.711 0-47.59-7.851-66.272-21.195v96.996c0 48.523-39.356 87.855-87.9 87.855c-18.113 0-34.949-5.473-48.934-14.86c15.962 16.313 38.222 26.432 62.848 26.432c48.548 0 87.905-39.332 87.905-87.857v-96.995zm17.17-47.952c-9.546-10.423-15.814-23.893-17.17-38.785v-6.113h-13.189c3.32 18.927 14.644 35.097 30.358 44.898M69.673 225.607a40 40 0 0 1-8.203-24.33c0-22.192 18.001-40.186 40.21-40.186a40.3 40.3 0 0 1 12.197 1.883v-48.593c-4.61-.631-9.262-.9-13.912-.801v37.822a40.3 40.3 0 0 0-12.203-1.882c-22.208 0-40.208 17.992-40.208 40.187c0 15.694 8.997 29.281 22.119 35.9" />
                  <path d="M175.803 92.849c18.683 13.344 41.56 21.195 66.272 21.195V76.631c-13.794-2.937-26.005-10.141-35.186-20.162c-15.715-9.802-27.038-25.972-30.358-44.898h-34.643v189.843c-.079 22.132-18.049 40.052-40.21 40.052c-13.058 0-24.66-6.221-32.007-15.86c-13.12-6.618-22.118-20.206-22.118-35.898c0-22.193 18-40.187 40.208-40.187c4.255 0 8.356.662 12.203 1.882v-37.822c-47.692.985-86.047 39.933-86.047 87.834c0 23.912 9.551 45.589 25.053 61.428c13.985 9.385 30.82 14.86 48.934 14.86c48.545 0 87.9-39.335 87.9-87.857z" />
                  <path fill="#00f2ea" d="M242.075 76.63V66.516a66.3 66.3 0 0 1-35.186-10.047a66.47 66.47 0 0 0 35.186 20.163M176.53 11.57a68 68 0 0 1-.728-5.457V0h-47.834v189.845c-.076 22.13-18.046 40.05-40.208 40.05a40.06 40.06 0 0 1-18.09-4.287c7.347 9.637 18.949 15.857 32.007 15.857c22.16 0 40.132-17.918 40.21-40.05V11.571zM99.966 113.58v-10.769a89 89 0 0 0-12.061-.818C39.355 101.993 0 141.327 0 189.845c0 30.419 15.467 57.227 38.971 72.996c-15.502-15.838-25.053-37.516-25.053-61.427c0-47.9 38.354-86.848 86.048-87.833" />
                </svg>
              </a>
            </div>
          </div>
        </a>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endsection
@section('scripts')
<script>
  $(document).ready(function(){
    const preview = $('#preview-image');
    const btnImage = $('.btn-image');

    btnImage.on('click', function(){
      const imgSrc = $(this).find('img').attr('src');
      preview.attr('src', imgSrc);
    });
  });
</script>
@endsection