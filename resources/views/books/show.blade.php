@extends('layouts.base')
@section('css')
<style>
.accordion-button:not(.collapsed){
  background-color: #e9d6ad8e;
}
.accordion-button:focus{
  box-shadow: 0 0 0 0.25rem rgba(142, 119, 49, 0.25);
}
</style>
@endsection
@section('content')
<section class="bg-light">
    <div class="container-sm py-5">
      <a href="{{route('book.index')}}" class="d-inline-flex text-decoration-none text-dark mb-3 align-items-center gap-3">
        <div>
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m9.55 12l7.35 7.35q.375.375.363.875t-.388.875t-.875.375t-.875-.375l-7.7-7.675q-.3-.3-.45-.675t-.15-.75t.15-.75t.45-.675l7.7-7.7q.375-.375.888-.363t.887.388t.375.875t-.375.875z"/></svg>
        </div>

        <div class="d-flex align-items-center gap-3">
          <img src="{{Voyager::image($book->icon)}}" alt="{{$book->name}} Icon" class="d-block w-100 object-fit-contain" style="height: 4em;">
          <div class="fs-4 fw-semibold" style="white-space: nowrap">{{$book->name}}</div>
        </div>
      </a>
      <div class="p-4 pt-4 bg-white rounded-4">
        <div class="accordion" id="accordionExample">
          @forelse ($book->sections as $sec)
              <div class="accordion-item border-0">
                <h2 class="accordion-header border-bottom border-bottom-1 border-coklat">
                  <button class="accordion-button fw-semibold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionSection-{{$sec->id}}" aria-expanded="false" aria-controls="accordionSection-{{$sec->id}}">
                    {{ $sec->title }}
                  </button>
                </h2>
                <div id="accordionSection-{{$sec->id}}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    {!! $sec->content !!}
                  </div>
                </div>
              </div>
          @empty
              <div class="border border-dashed rounded-4 text-muted p-3 text-center border-2">
                Belum ada data pada Buku : {{$book->name}}
              </div>
          @endforelse
        </div>
      </div>      
    </div>
</section>

@endsection
@section('scripts')
@endsection