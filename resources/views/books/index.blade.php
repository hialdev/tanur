@extends('layouts.base')
@section('content')
<section class="bg-light">
    <div class="container-sm py-5">
      <div class="p-4 pt-4 bg-white rounded-4">
        <h1 class="fs-3 text-center mb-4">Buku Tanur Muthmainnah</h1>
        <div class="p-4 rounded-4" style="background-color: #e7f5f5">
          <div class="row">
            @forelse ($chapters as $chapter)
            <div class="col-4 col-sm-3 col-md-2 mb-4">
              <a href="{{route('book.show', $chapter->slug)}}" class="d-block text-decoration-none text-dark">
                <div class="mb-3 bg-white overflow-hidden d-flex align-items-center justify-content-center rounded-circle p-3">
                  <img src="{{Voyager::image($chapter->icon)}}" alt="{{$chapter->name}} Icon" class="d-block w-100 object-fit-contain" style="aspect-ratio:1/1; object-fit:contain">
                </div>
                <h6 class="text-center">{{$chapter->name}}</h6>
              </a>
            </div>
            @empty
            <div class="text-center">Belum ada Buku</div>
            @endforelse
          </div>
        </div>
      </div>      
    </div>
</section>

@endsection
@section('scripts')
@endsection