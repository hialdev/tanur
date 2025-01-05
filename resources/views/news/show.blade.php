@extends('layouts.base')
@section('content')
<section class="bg-light">
  <div class="container py-5">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <div class="bg-white mb-3 p-2 px-3 rounded-pill d-inline-flex align-items-center gap-2">
          <a href="{{route('news.index')}}" class="text-decoration-none tanur-coklat">Berita</a>
          <span>/</span>
          <span>{{$news->title}}</span>
        </div>
        <div class="tanur-green fw-semibold pb-3 border-bottom border-2 border-coklat mb-3">{{\Carbon\Carbon::parse($news->created_at)->format('d M Y')}}</div>
        <h1 class="mb-3">{{$news->title}}</h1>
        <img src="{{Voyager::image($news->image)}}" alt="Image {{$news->title}} News" class="d-block w-100 rounded-4 mb-3" style="object-fit: cover; aspect-ratio:16/9">
        <div>
          {!! $news->content !!}
        </div>
      </div>
    </div>
  </div>
</section>
<section class="mb-4" style="border-top: 2px solid #c3932d; border-bottom: 2px solid #c3932d">
  <div class="container py-5">
      <h2>Rekomendasi Berita</h2>
      <hr class="divider">
      <div class="owl-carousel owl-theme news-show-carousel">
        @foreach ($reccomend_news as $new)
            <div class="bg-light rounded-4 overflow-hidden h-100">
                <img src="{{Voyager::image($new->image)}}" alt="Image {{$new->title}} News" class="d-block w-100 object-fit-cover" style="aspect-ratio:16/9;">
                <a href="{{route('news.show', 'abc')}}" class="p-4 d-block text-decoration-none text-dark">
                    <div class="tanur-green mb-1" style="font-size:13px">{{\Carbon\Carbon::parse($new->created_at)->format('d M Y')}}</div>
                    <h6 class="line-clamp line-clamp-2">{{$new->title}}</h6>
                    <p class="mb-0 line-clamp line-clamp-3">
                        {{$new->excerpt}}
                    </p>
                </a>
            </div>
        @endforeach
      </div>
  </div>
</section>
@endsection
@section('scripts')
@endsection