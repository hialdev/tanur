@extends('layouts.base')
@section('content')
<section class="bg-light py-5">
  <div class="container">
    <div class="text-center d-flex align-items-center justify-content-center border border-2 border-dashed p-5 rounded-4">
      <div>
        <img src="{{env('APP_URL')}}/src/images/comingsoon.webp" alt="Coming Soon" class="w-100 d-block">
        <h4>Merchandise Sedang di Persiapkan!</h4>
        <p style="max-width:40em;" class="mx-auto">Mohon maaf, saat ini merchandise sedang kami persiapkan. Silahkan kunjungi halaman lain, dan cek halaman ini secara berkala</p>
      </div>
    </div>
  </div>
</section>
@endsection