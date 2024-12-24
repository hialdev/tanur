@extends('layouts.blank')
@section('content')
<div class="row align-items-center my-4">
  <div class="col-md-5 mb-4">
    <img src="{{$flyer->image ? '/storage/'.$flyer->image : 'https://placeholder.co/800x600'}}" alt="Flyer {{$flyer->title}} Image" class="d-block rounded-4 shadow w-100">
  </div>
  <div class="col-md-7">
    <div class="row">
      <div class="col-12 mb-3">
        <div class="p-4 position-relative rounded-4 d-flex align-items-center justify-content-center" style="background: url('/assets/images/backgrounds/bgperiode.webp') no-repeat; background-position: center; background-size: cover; min-height:10em">
          <div class="d-flex align-items-center justify-content-center top-0 position-absolute end-0 start-0">
            <div class="p-3 shadow rounded-bottom-3 text-dark" style="background: linear-gradient(180deg, rgb(255, 254, 251) 0.4%, rgb(243, 218, 142) 50.68%, #604B17 110.19%);">
              <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.2em" viewBox="0 0 640 512">
                <path fill="currentColor" d="M381 114.9L186.1 41.8c-16.7-6.2-35.2-5.3-51.1 2.7L89.1 67.4C78 73 77.2 88.5 87.6 95.2l146.9 94.5L136 240l-58.2-25.9c-8.7-3.9-18.8-3.7-27.3.6l-32.2 16.1c-9.3 4.7-11.8 16.8-5 24.7l73.1 85.3c6.1 7.1 15 11.2 24.3 11.2h137.7c5 0 9.9-1.2 14.3-3.4l272.9-136.4c46.5-23.3 82.5-63.3 100.8-112C645.9 75 627.2 48 600.2 48h-57.4c-20.2 0-40.2 4.8-58.2 14zM0 480c0 17.7 14.3 32 32 32h576c17.7 0 32-14.3 32-32s-14.3-32-32-32H32c-17.7 0-32 14.3-32 32" />
              </svg>
            </div>
          </div>
          <div class="text-center my-5">
            <div class="fs-5 text-warning">Periode Keberangkatan</div>
            <h2 class="text-white" style="font-size: 39px; font-weight:800">{{ \Carbon\Carbon::parse($flyer->periode)->format('d F Y') }}</h2>
            <h4 class="fw-bold text-white" style="font-size: 18px">{{ \GeniusTS\HijriDate\Hijri::convertToHijri($flyer->periode)->format('d F Y') }}</h2>
          </div>
        </div>
      </div>
      <div class="col-6 mb-3">
        <div class="p-4 position-relative rounded-4 d-flex align-items-center justify-content-center" style="background: linear-gradient(to right, #00bfa5, #004d80); background-position: center; background-size: cover; min-height:10em">
          <div class="d-flex align-items-center justify-content-center top-0 position-absolute end-0 start-0">
            <div class="p-2 shadow rounded-bottom-2 text-dark" style="background: linear-gradient(180deg, rgb(255, 254, 251) 0.4%, rgb(243, 218, 142) 50.68%, #604B17 110.19%);">
              <svg xmlns="http://www.w3.org/2000/svg" width="1.6em" height="1.6em" viewBox="0 0 24 24">
                <path fill="currentColor" d="M5.35 5.64c-.9-.64-1.12-1.88-.49-2.79c.63-.9 1.88-1.12 2.79-.49c.9.64 1.12 1.88.49 2.79c-.64.9-1.88 1.12-2.79.49M16 20c0-.55-.45-1-1-1H8.93c-1.48 0-2.74-1.08-2.96-2.54L4.16 7.78A.976.976 0 0 0 3.2 7c-.62 0-1.08.57-.96 1.18l1.75 8.58A5.01 5.01 0 0 0 8.94 21H15c.55 0 1-.45 1-1m-.46-5h-4.19l-1.03-4.1c1.28.72 2.63 1.28 4.1 1.3c.58.01 1.05-.49 1.05-1.07c0-.59-.49-1.04-1.08-1.06c-1.31-.04-2.63-.56-3.61-1.33L9.14 7.47c-.23-.18-.49-.3-.76-.38a2.2 2.2 0 0 0-.99-.06h-.02a2.27 2.27 0 0 0-1.84 2.61l1.35 5.92A3.01 3.01 0 0 0 9.83 18h6.85l3.09 2.42c.42.33 1.02.29 1.39-.08c.45-.45.4-1.18-.1-1.57l-4.29-3.35a2 2 0 0 0-1.23-.42" />
              </svg>
            </div>
          </div>
          <div class="text-center mt-4 py-3">
            <div class="fs-5 text-warning">Open Seat</div>
            <h2 class="text-white" style="font-size: 39px; font-weight:800">{{ $flyer->open_seat }}</h2>
          </div>
        </div>
      </div>
      <div class="col-6 mb-3">
        <div class="p-4 position-relative rounded-4 d-flex align-items-center justify-content-center" style="background: linear-gradient(to right, #004d80, #004d80); background-position: center; background-size: cover; min-height:10em">
          <div class="d-flex align-items-center justify-content-center top-0 position-absolute end-0 start-0">
            <div class="p-2 shadow rounded-bottom-2 text-dark" style="background: linear-gradient(180deg, rgb(255, 254, 251) 0.4%, rgb(243, 218, 142) 50.68%, #604B17 110.19%);">
              <svg xmlns="http://www.w3.org/2000/svg" width="1.6em" height="1.6em" viewBox="0 0 256 256">
                <path fill="currentColor" d="M224 232a8 8 0 0 1-8 8H112a8 8 0 0 1 0-16h104a8 8 0 0 1 8 8m-16-88h-64.22L112 80l14.19-26.32a1.5 1.5 0 0 0 .11-.22A16 16 0 0 0 119.15 32l-.47-.22L85 17.57a16 16 0 0 0-21.2 7.27l-22.12 44a16.1 16.1 0 0 0 0 14.32l58.11 116a15.93 15.93 0 0 0 14.32 8.84H208a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16" />
              </svg>
            </div>
          </div>
          <div class="text-center mt-4 py-3">
            <div class="fs-5 text-warning">Sisa Seat</div>
            <h2 class="text-white" style="font-size: 39px; font-weight:800">{{ $flyer->left_seat }}</h2>
          </div>
        </div>
      </div>
      <div class="col-12 mb-3">
        <div class="p-4 position-relative rounded-4 d-flex align-items-center justify-content-center" style="background: linear-gradient(to right, #604B17, #39301a); background-position: center; background-size: cover; min-height:10em">
          <div class="d-flex align-items-center justify-content-center top-0 position-absolute end-0 start-0">
            <div class="p-3 shadow rounded-bottom-3 text-dark" style="background: linear-gradient(180deg, rgb(255, 254, 251) 0.4%, rgb(243, 218, 142) 50.68%, #604B17 110.19%);">
              <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.6em" viewBox="0 0 20 24">
                <path fill="currentColor" d="M18.845 17.295a7.44 7.44 0 0 0-4.089-2.754l-.051-.011l-1.179 1.99a1.003 1.003 0 0 1-1 1c-.55 0-1-.45-1.525-1.774v-.032a1.25 1.25 0 1 0-2.5 0v.033v-.002c-.56 1.325-1.014 1.774-1.563 1.774a1.003 1.003 0 0 1-1-1l-1.142-1.994A7.47 7.47 0 0 0 .67 17.271l-.014.019a4.5 4.5 0 0 0-.655 2.197v.007c.005.15 0 .325 0 .5v2a2 2 0 0 0 2 2h15.5a2 2 0 0 0 2-2v-2c0-.174-.005-.35 0-.5a4.5 4.5 0 0 0-.666-2.221l.011.02zM4.5 5.29c0 2.92 1.82 7.21 5.25 7.21c3.37 0 5.25-4.29 5.25-7.21v-.065a5.25 5.25 0 1 0-10.5 0v.068z" />
              </svg>
            </div>
          </div>
          <div class="text-center mt-4 py-3">
            <div class="fs-5 text-warning">Marketing Director</div>
            <h2 class="text-white" style="font-size: 39px; font-weight:800">{{ $flyer->md->name }}</h2>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>
@endsection