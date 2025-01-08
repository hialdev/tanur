@extends('layouts.base')
@section('content')

<section class="bg-light">
    <div class="container py-4">
        <div class="row">
            <div class="col-12 mb-3">
                <div class="owl-carousel owl-theme featured-carousel">
                    @foreach ($featured_news as $new)
                    <div class="rounded-4 overflow-hidden position-relative" style="max-width: 50em">
                        <img src="{{Voyager::image($new->image)}}" alt="{{$new->title}} Image News" class="d-block w-100" style="aspect-ratio:16/9; object-fit:cover; height:20em;">
                        <a href="{{route('news.show',$new->slug)}}" class="d-block text-decoration-none text-white position-absolute top-0 bottom-0 start-0 end-0 p-4 d-flex align-items-end" style="background:linear-gradient(0deg, #132F57 0.1%, rgba(18, 49, 88, 0.50) 20.1%, rgba(15, 58, 91, 0.30) 30.1%, rgba(11, 74, 97, 0.15) 50.1%, rgba(5, 95, 106, 0.00) 60.1%, rgba(0, 116, 115, 0.00) 70.1%, rgba(0, 116, 115, 0.00) 100.1%);">
                            <div class="text-white flex-column mt-auto d-flex align-items-start justify-content-start">
                                <h5>{{$new->title}}</h5>
                                <p class="line-clamp line-clamp-2">
                                  {{$new->excerpt}}
                                </p>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                <div id="featured-dots" class="custom-dots mt-3"></div>
            </div>
        </div>
    </div>
</section>

<section>
  <div class="bg-light py-5" style="border-top: 1px solid #c3932d; border-bottom: 1px solid #c3932d">
    <div class="container">
      <form action="" class="d-flex flex-wrap align-items-end gap-2">
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
              <div class="fw-bold">Judul / Deskripsi Berita</div>
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
            <select name="total_days" id="total_days" class="form-select border border-coklat">
              <option value="desc" {{$filter->order == "desc" ? 'selected' : ''}}>Terbaru</option>
              <option value="asc" {{$filter->order == "asc" ? 'selected' : ''}}>Terlama</option>
            </select>
          </div>

          <button type="submit" class="btn btn-success bg-tanur-green rounded-circle d-flex align-items-center justify-content-center" style="aspect-ratio:1/1">
            <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
              <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="m21 21l-4.343-4.343m0 0A8 8 0 1 0 5.343 5.343a8 8 0 0 0 11.314 11.314" />
            </svg>
          </button>
          <a href="{{route('news.index')}}" class="btn btn-secondary rounded-circle d-flex align-items-center justify-content-center" style="aspect-ratio:1/1">
            <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
              <path fill="currentColor" d="M22 12c0 5.523-4.477 10-10 10S2 17.523 2 12S6.477 2 12 2v2a8 8 0 1 0 4.5 1.385V8h-2V2h6v2H18a9.99 9.99 0 0 1 4 8" />
            </svg>
          </a>
      </form>
    </div>
  </div>
</section>

<section>
    <div class="container py-4">
        <div class="row">
            <div class="col-12">
                <h1 class="fs-4">Berita Terkini</h1>
                <hr class="divider">
            </div>
            @foreach ($news as $ni)
            <div class="col-12 col-md-4 mb-3 col-lg-3">
                <div class="bg-light rounded-4 h-100 overflow-hidden">
                    <img src="{{Voyager::image($ni->image)}}" alt="Image News {{$ni->title}}" class="d-block w-100 object-fit-cover" style="aspect-ratio:16/9">
                    <a href="{{route('news.show', $ni->slug)}}" class="p-4 d-block text-decoration-none text-dark">
                        <div class="tanur-green mb-1" style="font-size:13px">{{\Carbon\Carbon::parse($ni->created_at)->format('d M Y')}}</div>
                        <h6 class="line-clamp line-clamp-2">{{$ni->title}}</h6>
                        <p class="mb-0 line-clamp line-clamp-3">{{$ni->excerpt}}
                        </p>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
@section('scripts')
@endsection