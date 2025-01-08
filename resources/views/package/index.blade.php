@extends('layouts.base')
@section('content')
<section>
  <div class="bg-light py-5" style="border-top: 1px solid #c3932d; border-bottom: 1px solid #c3932d">
    <div class="container">
      <form action="" class="d-flex flex-wrap align-items-end gap-2">
          <div class="flex-grow-1">
            <div class="d-flex align-items-center gap-3 mb-2">
              <div class="d-flex align-items-center justify-content-center p-2 rounded-circle bg-tanur-green">
                <svg xmlns="http://www.w3.org/2000/svg" width="1.4em" height="1.4em" viewBox="0 0 256 256">
                  <g fill="currentColor">
                    <path d="M232 164c0 15.46-14.33 28-32 28s-32-12.54-32-28s14.33-28 32-28s32 12.54 32 28M34.82 152h90.36L80 56Z" opacity="0.2" />
                    <path d="M87.24 52.59a8 8 0 0 0-14.48 0l-64 136a8 8 0 1 0 14.48 6.81L39.9 160h80.2l16.66 35.4a8 8 0 1 0 14.48-6.81ZM47.43 144L80 74.79L112.57 144ZM200 96c-12.76 0-22.73 3.47-29.63 10.32a8 8 0 0 0 11.26 11.36c3.8-3.77 10-5.68 18.37-5.68c13.23 0 24 9 24 20v3.22a42.76 42.76 0 0 0-24-7.22c-22.06 0-40 16.15-40 36s17.94 36 40 36a42.73 42.73 0 0 0 24-7.25a8 8 0 0 0 16-.75v-60c0-19.85-17.94-36-40-36m0 88c-13.23 0-24-9-24-20s10.77-20 24-20s24 9 24 20s-10.77 20-24 20" />
                  </g>
                </svg>
              </div>
              <div class="fw-bold">Cari Paket</div>
            </div>
            <input type="text" name="q" class="form-control border-coklat" placeholder="Nama Paket / Hari / Harga / Bandara" value="{{$filter->q}}">
          </div>

          <div class="flex-grow-1">
            <div class="d-flex align-items-center gap-3 mb-2">
              <div class="d-flex align-items-center justify-content-center p-2 rounded-circle bg-tanur-green">
                <svg xmlns="http://www.w3.org/2000/svg" width="1.4em" height="1.4em" viewBox="0 0 24 24">
                  <path fill="currentColor" d="M7.245 2h9.51c1.159 0 1.738 0 2.206.163a3.05 3.05 0 0 1 1.881 1.936C21 4.581 21 5.177 21 6.37v14.004c0 .858-.985 1.314-1.608.744a.946.946 0 0 0-1.284 0l-.483.442a1.657 1.657 0 0 1-2.25 0a1.657 1.657 0 0 0-2.25 0a1.657 1.657 0 0 1-2.25 0a1.657 1.657 0 0 0-2.25 0a1.657 1.657 0 0 1-2.25 0l-.483-.442a.946.946 0 0 0-1.284 0c-.623.57-1.608.114-1.608-.744V6.37c0-1.193 0-1.79.158-2.27c.3-.913.995-1.629 1.881-1.937C5.507 2 6.086 2 7.245 2" opacity="0.5" />
                  <path fill="currentColor" d="M7 6.75a.75.75 0 0 0 0 1.5h.5a.75.75 0 0 0 0-1.5zm3.5 0a.75.75 0 0 0 0 1.5H17a.75.75 0 0 0 0-1.5zM7 10.25a.75.75 0 0 0 0 1.5h.5a.75.75 0 0 0 0-1.5zm3.5 0a.75.75 0 0 0 0 1.5H17a.75.75 0 0 0 0-1.5zM7 13.75a.75.75 0 0 0 0 1.5h.5a.75.75 0 0 0 0-1.5zm3.5 0a.75.75 0 0 0 0 1.5H17a.75.75 0 0 0 0-1.5z" />
                </svg>
              </div>
              <div class="fw-bold">Jenis Paket</div>
            </div>
            <select name="jenis" id="type_package" class="form-select border border-coklat">
              <option value="">-- Semua Jenis Paket --</option>
              @foreach ($typeOptions as $type)
                <option value="{{$type->id}}" {{$type->id == $filter->jenis ? 'selected' : ''}}>{{$type->title}}</option>
              @endforeach
            </select>
          </div>

          <button type="submit" class="btn btn-success bg-tanur-green rounded-circle d-flex align-items-center justify-content-center" style="aspect-ratio:1/1">
            <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
              <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="m21 21l-4.343-4.343m0 0A8 8 0 1 0 5.343 5.343a8 8 0 0 0 11.314 11.314" />
            </svg>
          </button>
          <a href="{{route('package.index')}}" class="btn btn-secondary rounded-circle d-flex align-items-center justify-content-center" style="aspect-ratio:1/1">
            <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
              <path fill="currentColor" d="M22 12c0 5.523-4.477 10-10 10S2 17.523 2 12S6.477 2 12 2v2a8 8 0 1 0 4.5 1.385V8h-2V2h6v2H18a9.99 9.99 0 0 1 4 8" />
            </svg>
          </a>
      </form>
    </div>
  </div>
</section>

<section>
  <div class="container py-5">
    <div class="row">
      @forelse ($packages as $package)
      <div class="col-md-4 mb-3">
        <div class="bg-light border border-coklat p-3 rounded-4">
          <img src="{{Voyager::image($package->image)}}" alt="Image {{$package->title}} Package" class="d-block rounded-3 mb-3 w-100">
          <h2 class="fs-5">
            {{$package->title}}
          </h2>
          <div class="tanur-green" style="font-size: 13px">Harga mulai dari</div>
          <div class="fs-5 fw-semibold text-danger">{{\App\Helpers\GeneralHelper::formatRupiah($package->price)}}</div>
          <div class="d-flex flex-column align-items-start gap-1 pt-3 border-top border-coklat mt-3">
            <div class="d-flex align-items-start gap-3 mb-2">
              <div class="d-flex align-items-center justify-content-center p-2 rounded-circle bg-tanur-green">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                  <path fill="currentColor" d="M6.94 2c.416 0 .753.324.753.724v1.46c.668-.012 1.417-.012 2.26-.012h4.015c.842 0 1.591 0 2.259.013v-1.46c0-.4.337-.725.753-.725s.753.324.753.724V4.25c1.445.111 2.394.384 3.09 1.055c.698.67.982 1.582 1.097 2.972L22 9H2v-.724c.116-1.39.4-2.302 1.097-2.972s1.645-.944 3.09-1.055V2.724c0-.4.337-.724.753-.724" />
                  <path fill="currentColor" d="M22 14v-2c0-.839-.004-2.335-.017-3H2.01c-.013.665-.01 2.161-.01 3v2c0 3.771 0 5.657 1.172 6.828S6.228 22 10 22h4c3.77 0 5.656 0 6.828-1.172S22 17.772 22 14" opacity="0.5" />
                  <path fill="currentColor" d="M18 17a1 1 0 1 1-2 0a1 1 0 0 1 2 0m0-4a1 1 0 1 1-2 0a1 1 0 0 1 2 0m-5 4a1 1 0 1 1-2 0a1 1 0 0 1 2 0m0-4a1 1 0 1 1-2 0a1 1 0 0 1 2 0m-5 4a1 1 0 1 1-2 0a1 1 0 0 1 2 0m0-4a1 1 0 1 1-2 0a1 1 0 0 1 2 0" />
                </svg>
              </div>
              <div class="">{{\Carbon\Carbon::parse($package->tgl_berangkat)->format('d M Y')}}</div>
            </div>
            <div class="d-flex align-items-start gap-3 mb-2">
              <div class="d-flex align-items-center justify-content-center p-2 rounded-circle bg-tanur-green">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                  <path fill="currentColor" d="M17 19h2v-8h-6v8h2v-6h2zM3 19V4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v5h2v10h1v2H2v-2zm4-8v2h2v-2zm0 4v2h2v-2zm0-8v2h2V7z" />
                </svg>
              </div>
              <div class="">
                {{$package->hotel}}
              </div>
            </div>
            <div class="d-flex align-items-start gap-3 mb-2">
              <div class="d-flex align-items-center justify-content-center p-2 rounded-circle bg-tanur-green">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                  <path fill="currentColor" d="m2.55 19.225l9.85-14.35q.275-.425.713-.65T14.05 4h5.55q.95 0 1.538.725t.412 1.65l-2.4 12.8q-.075.35-.35.588t-.625.237H2.95q-.3 0-.438-.262t.038-.513M14.5 14q1.05 0 1.775-.725T17 11.5t-.725-1.775T14.5 9t-1.775.725T12 11.5t.725 1.775T14.5 14" />
                </svg>
              </div>
              <div class="">{{$package->maskapai}}</div>
            </div>
            <div class="d-flex align-items-start gap-3 mb-2">
              <div class="d-flex align-items-center justify-content-center p-2 rounded-circle bg-tanur-green">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20">
                  <path fill="currentColor" d="M11.676 5.16a7 7 0 0 0-.377.327a2.1 2.1 0 0 1-.735.465L4.759 7.887l-.593-1.224a1.2 1.2 0 0 0-.245-.341c-.619-.596-1.745-.276-1.902.621A1.3 1.3 0 0 0 2 7.16v2.986A1.75 1.75 0 0 0 4.321 11.8l3.018-1.043l-.293 1.465c-.311 1.555 1.687 2.466 2.657 1.212l3.098-4.006l4.179-1.351c.838-.272 1.332-1.28.737-2.091c-.516-.706-1.425-1.689-2.663-1.93a3 3 0 0 0-.886-.04c-1.018.1-1.909.67-2.492 1.143m-2.562.22l-3.73 1.244l-.04-.05C4.532 5.523 5.28 4 6.605 4c.323 0 .637.097.903.28zM2.5 17a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1z" />
                </svg>
              </div>
              <div class="">{{$package->bandara}}</div>
            </div>
            <a href="{{route('package.show', $package->slug)}}" class="btn btn-success bg-tanur-green rounded-3 w-100">Lihat Detail</a>
          </div>
        </div>
      </div>
      @empty
          
      @endforelse
    </div>
  </div>
</section>
@endsection
@section('scripts')
@endsection