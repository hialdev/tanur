@extends('layouts.base')
@section('content')
<section>
    <div class="">
        <div class="position-relative">
            <div class="owl-carousel owl-theme hero-carousel">
                @foreach ($merchJumbotrons as $merch)
                <a href="{{url($merch->link)}}"
                    class="d-flex align-items-center justify-content-center text-decoration-none"
                    >
                    <img src="{{Voyager::image($merch->image)}}" alt="Merch Hero {{$merch->title}}" class="d-block w-100" style="max-height: 85vh; object-fit:cover">
                </a>
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

<section>
  <div class="container py-5">
    <h1 class="fs-4">Merchandise Kami</h1>
    <hr class="divider">
    <form action="" class="d-flex flex-wrap align-items-end gap-2 mb-3">
        <div class="flex-grow-1 mb-2">
          <div class="d-flex align-items-center gap-3 mb-2">
            <div class="d-flex align-items-center justify-content-center p-2 rounded-circle bg-tanur-green">
              <svg xmlns="http://www.w3.org/2000/svg" width="1.4em" height="1.4em" viewBox="0 0 256 256">
                <g fill="currentColor">
                  <path d="M232 164c0 15.46-14.33 28-32 28s-32-12.54-32-28s14.33-28 32-28s32 12.54 32 28M34.82 152h90.36L80 56Z" opacity="0.2" />
                  <path d="M87.24 52.59a8 8 0 0 0-14.48 0l-64 136a8 8 0 1 0 14.48 6.81L39.9 160h80.2l16.66 35.4a8 8 0 1 0 14.48-6.81ZM47.43 144L80 74.79L112.57 144ZM200 96c-12.76 0-22.73 3.47-29.63 10.32a8 8 0 0 0 11.26 11.36c3.8-3.77 10-5.68 18.37-5.68c13.23 0 24 9 24 20v3.22a42.76 42.76 0 0 0-24-7.22c-22.06 0-40 16.15-40 36s17.94 36 40 36a42.73 42.73 0 0 0 24-7.25a8 8 0 0 0 16-.75v-60c0-19.85-17.94-36-40-36m0 88c-13.23 0-24-9-24-20s10.77-20 24-20s24 9 24 20s-10.77 20-24 20" />
                </g>
              </svg>
            </div>
            <div class="fw-bold">Judul / Deskripsi Merchandise</div>
          </div>
          <input type="text" name="q" class="form-control border-coklat" placeholder="Cari Judul / Deskripsi Berita" value="{{$filter->q}}">
        </div>
        
        <div class="flex-grow-1 mb-2">
          <div class="d-flex align-items-center gap-3 mb-2">
            <div class="d-flex align-items-center justify-content-center p-2 rounded-circle bg-tanur-green">
              <svg xmlns="http://www.w3.org/2000/svg" width="1.4em" height="1.4em" viewBox="0 0 24 24">
                <path fill="currentColor" d="M6.94 2c.416 0 .753.324.753.724v1.46c.668-.012 1.417-.012 2.26-.012h4.015c.842 0 1.591 0 2.259.013v-1.46c0-.4.337-.725.753-.725s.753.324.753.724V4.25c1.445.111 2.394.384 3.09 1.055c.698.67.982 1.582 1.097 2.972L22 9H2v-.724c.116-1.39.4-2.302 1.097-2.972s1.645-.944 3.09-1.055V2.724c0-.4.337-.724.753-.724" />
                <path fill="currentColor" d="M22 14v-2c0-.839-.004-2.335-.017-3H2.01c-.013.665-.01 2.161-.01 3v2c0 3.771 0 5.657 1.172 6.828S6.228 22 10 22h4c3.77 0 5.656 0 6.828-1.172S22 17.772 22 14" opacity="0.5" />
                <path fill="currentColor" d="M18 17a1 1 0 1 1-2 0a1 1 0 0 1 2 0m0-4a1 1 0 1 1-2 0a1 1 0 0 1 2 0m-5 4a1 1 0 1 1-2 0a1 1 0 0 1 2 0m0-4a1 1 0 1 1-2 0a1 1 0 0 1 2 0m-5 4a1 1 0 1 1-2 0a1 1 0 0 1 2 0m0-4a1 1 0 1 1-2 0a1 1 0 0 1 2 0" />
              </svg>
            </div>
            <div class="fw-bold">Urutkan Berdasarkan</div>
          </div>
          <select name="order" id="order" class="form-select border border-coklat">
            <option value="desc" {{$filter->order == 'desc' ? 'selected' : ''}}>Terbaru</option>
            <option value="asc" {{$filter->order == 'asc' ? 'selected' : ''}}>Terlama</option>
          </select>
        </div>

        <div class="flex-grow-1 mb-2">
          <div class="d-flex align-items-center gap-3 mb-2">
            <div class="d-flex align-items-center justify-content-center p-2 rounded-circle bg-tanur-green">
              <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                <path fill="currentColor" d="M4.728 16.137c-1.545-1.546-2.318-2.318-2.605-3.321c-.288-1.003-.042-2.068.45-4.197l.283-1.228c.413-1.792.62-2.688 1.233-3.302s1.51-.82 3.302-1.233l1.228-.284c2.13-.491 3.194-.737 4.197-.45c1.003.288 1.775 1.061 3.32 2.606l1.83 1.83C20.657 9.248 22 10.592 22 12.262c0 1.671-1.344 3.015-4.033 5.704c-2.69 2.69-4.034 4.034-5.705 4.034c-1.67 0-3.015-1.344-5.704-4.033z" opacity="0.5" />
                <path fill="currentColor" d="M10.124 7.271a2.017 2.017 0 1 1-2.853 2.852a2.017 2.017 0 0 1 2.853-2.852m8.927 4.78l-6.979 6.98a.75.75 0 1 1-1.06-1.06l6.979-6.98a.75.75 0 1 1 1.06 1.06" />
              </svg>
            </div>
            <div class="fw-bold">Dengan Harga</div>
          </div>
          <select name="price" id="price" class="form-select border border-coklat">
            <option value="">-- Default --</option>
            <option value="low" {{$filter->price == 'asc' ? 'selected' : ''}}>Terendah</option>
            <option value="high" {{$filter->price == 'desc' ? 'selected' : ''}}>Termahal</option>
          </select>
        </div>

        <button type="submit" class="btn btn-success bg-tanur-green rounded-circle d-flex align-items-center justify-content-center" style="aspect-ratio:1/1">
          <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="m21 21l-4.343-4.343m0 0A8 8 0 1 0 5.343 5.343a8 8 0 0 0 11.314 11.314" />
          </svg>
        </button>
        <a href="{{route('merchandise.index')}}" class="btn btn-secondary rounded-circle d-flex align-items-center justify-content-center" style="aspect-ratio:1/1">
          <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
            <path fill="currentColor" d="M22 12c0 5.523-4.477 10-10 10S2 17.523 2 12S6.477 2 12 2v2a8 8 0 1 0 4.5 1.385V8h-2V2h6v2H18a9.99 9.99 0 0 1 4 8" />
          </svg>
        </a>
    </form>
    <div class="row">
      @foreach ($merchandises as $merch)
      <div class="col-6 col-md-3 mb-4">
        <a href="{{route('merchandise.show', $merch->slug)}}" class="d-block text-dark text-decoration-none">
          <img src="{{Voyager::image($merch->image)}}" alt="Image Product {{$merch->title}}" class="d-block mb-3 rounded-4 border w-100 border-2 border-success" style="aspect-ratio:1/1; object-fit:cover">
          <div>
            <h3 class="fs-6 line-clamp line-clamp-2">{{$merch->title}}</h3>
            <div class="fw-bold tanur-green">{{\App\Helpers\GeneralHelper::formatRupiah($merch->price)}}</div>
            <div class="d-flex align-items-center rounded-3 overflow-hidden justify-content-around w-100 mt-2">
              <a href="{{url($merch->tokopedia_link)}}" class="{{$merch->tokopedia_link ? : 'd-none'}} flex-grow-1 text-decoration-none d-flex align-items-center btn btn-light rounded-0 justify-content-center" style="">
                <img src="/src/images/icon/tokopedia.png" alt="tokopedia" class="d-block" style="max-height: 1.5em">
              </a>
              <a href="{{url($merch->shopee_link)}}" class="{{$merch->shopee_link ? : 'd-none'}} flex-grow-1 text-decoration-none d-flex align-items-center btn btn-light rounded-0 justify-content-center" style="">
                <img src="/src/images/icon/shopee.png" alt="Shopee" class="d-block" style="max-height: 1.5em">
              </a>
              <a href="{{url($merch->tiktok_link)}}" class="{{$merch->tiktok_link ? : 'd-none'}} flex-grow-1 text-decoration-none d-flex align-items-center btn btn-light rounded-0 justify-content-center" style="">
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
@endsection