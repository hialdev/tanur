@extends('layouts.base')
@section('css')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<style>
#map {
    height: 60vh; /* Peta memenuhi layar penuh */
    margin: 0;
    padding: 0;
    border-radius: 15px;
}
</style>
@endsection
@section('content')
<section class="bg-light">
    <h1 class="d-none">Kontak - Hubungi Kami</h1>
    <div class="container py-5">
        <div id="map" class="mb-4"></div>
        <div class="row">
          @foreach ($offices as $office)
          <div class="col-md-4 mb-3">
            <div class="bg-white position-relative h-100 p-4 pb-5 rounded-4 border border-success">
              <div class="d-flex flex-column mb-3 align-items-center gap-2">
                <div class="d-flex align-items-center justify-content-center p-1 rounded-circle bg-radial-coklat-tua text-white">
                  <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 16 16">
                    <path fill="currentColor" fill-rule="evenodd" d="M3.125 7a4.875 4.875 0 1 1 9.75 0c0 1.864-.774 2.962-1.687 3.815c-.385.36-.765.65-1.17.958l-.365.28a9 9 0 0 0-.781.668c-.243.24-.535.575-.73 1.01a.34.34 0 0 1-.095.132l-.015.008s-.01.004-.032.004l-.032-.003l-.015-.009a.34.34 0 0 1-.095-.131a3.4 3.4 0 0 0-.73-1.01a9 9 0 0 0-.781-.668q-.187-.145-.366-.28a15 15 0 0 1-1.169-.96C3.9 9.963 3.125 8.865 3.125 7M14.5 7c0 3.4-2.066 4.975-3.53 6.091c-.634.485-1.156.882-1.345 1.305C9.355 15 8.788 15.5 8 15.5s-1.354-.5-1.625-1.104c-.19-.423-.71-.82-1.346-1.305C3.566 11.975 1.5 10.399 1.5 7a6.5 6.5 0 0 1 13 0m-5 0a1.5 1.5 0 1 1-3 0a1.5 1.5 0 0 1 3 0M11 7a3 3 0 1 1-6 0a3 3 0 0 1 6 0" clip-rule="evenodd" />
                  </svg>
                </div>
                <h3 class="fs-5">{{$office->city}}</h3>
              </div>
              <div>
                <h6 class="tanur-green mb-2">{{$office->name}}</h6>
                <div class="mb-2 d-flex align-items-start gap-3">
                  <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                      <path fill="currentColor" d="M18 15h-2v2h2m0-6h-2v2h2m2 6h-8v-2h2v-2h-2v-2h2v-2h-2V9h8M10 7H8V5h2m0 6H8V9h2m0 6H8v-2h2m0 6H8v-2h2M6 7H4V5h2m0 6H4V9h2m0 6H4v-2h2m0 6H4v-2h2m6-10V3H2v18h20V7z" />
                    </svg>
                  </div>
                  <div style="font-size: 14px">
                    {{$office->address}}
                  </div>
                </div>
                <div class="mb-2 pb-2 d-flex align-items-center gap-3">
                  <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                      <path fill="currentColor" fill-opacity="0" stroke="currentColor" stroke-dasharray="64" stroke-dashoffset="64" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 3c0.5 0 2.5 4.5 2.5 5c0 1 -1.5 2 -2 3c-0.5 1 0.5 2 1.5 3c0.39 0.39 2 2 3 1.5c1 -0.5 2 -2 3 -2c0.5 0 5 2 5 2.5c0 2 -1.5 3.5 -3 4c-1.5 0.5 -2.5 0.5 -4.5 0c-2 -0.5 -3.5 -1 -6 -3.5c-2.5 -2.5 -3 -4 -3.5 -6c-0.5 -2 -0.5 -3 0 -4.5c0.5 -1.5 2 -3 4 -3Z">
                        <animate fill="freeze" attributeName="fill-opacity" begin="0.7s" dur="0.15s" values="0;0.3" />
                        <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.6s" values="64;0" />
                      </path>
                    </svg>
                  </div>
                  <div style="font-size: 14px">
                    {{$office->telp}}
                  </div>
                </div>
                <a href="{{$office->gmap_link}}" class="btn position-absolute bottom-0 end-0 start-0 m-3 bg-gradient-green text-white">Lihat di Google Maps</a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
    </div>
</section>

<section>
  <div class="container py-5">
    <h2>Hubungi Kami</h2>
    <hr class="divider">
    <form id="whatsappForm" class="row">
      <div class="col-12 mb-3">
        <input type="text" name="name" id="name" placeholder="Nama" class="form-control" required>
        <div class="invalid-feedback">Nama harus diisi.</div>
      </div>
      <div class="col-md-6 mb-3">
        <input type="email" name="email" id="email" placeholder="Email" class="form-control" required>
        <div class="invalid-feedback">Email harus diisi.</div>
      </div>
      <div class="col-md-6 mb-3">
        <input type="number" name="phone" id="phone" placeholder="No. Telp / Whatsapp" class="form-control" required>
        <div class="invalid-feedback">Nomor telepon harus diisi.</div>
      </div>
      <div class="col-12 mb-3">
        <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Pesan" required></textarea>
        <div class="invalid-feedback">Pesan harus diisi.</div>
      </div>
      <div class="col-12">
        <button type="button" id="sendToWhatsApp" class="btn btn-success bg-tanur-green">Kirim</button>
      </div>
    </form>

  </div>
</section>
@endsection
@section('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    const map = L.map('map').setView([-6.200000, 106.816666], 9);

    // Gunakan tile layer default dari OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> for <a href="#">Tanur</a>',
        maxZoom: 19
    }).addTo(map);

    // Data kantor cabang
    const cabang = @json($offices);
    console.log(cabang);

    // Tambahkan marker untuk setiap kantor cabang
    cabang.forEach((item) => {
        const marker = L.marker([item.latitude, item.longitude]).addTo(map);
        const googleMapsLink = `https://www.google.com/maps?q=${item.latitude},${item.longitude}`;
        marker.bindPopup(`
          <div class="fs-5">${item.name}</div>
          <p style="font-size:13px">${item.address}</p>
          <a class="btn btn-sm border-0 btn-success bg-radial-coklat-tua text-white" href="${googleMapsLink}" target="_blank">Buka di Google Maps</a>
        `);
    });


    document.getElementById('sendToWhatsApp').addEventListener('click', function() {
      const name = document.getElementById('name').value.trim();
      const email = document.getElementById('email').value.trim();
      const phone = document.getElementById('phone').value.trim();
      const message = document.getElementById('message').value.trim();
      let valid = true;

      // Validasi input
      if (!name) {
        setError('name', 'Nama harus diisi.');
        valid = false;
      } else {
        clearError('name');
      }

      if (!email) {
        setError('email', 'Email harus diisi.');
        valid = false;
      } else {
        clearError('email');
      }

      if (!phone) {
        setError('phone', 'Nomor telepon harus diisi.');
        valid = false;
      } else {
        clearError('phone');
      }

      if (!message) {
        setError('message', 'Pesan harus diisi.');
        valid = false;
      } else {
        clearError('message');
      }

      if (valid) {
        // Nomor tujuan WhatsApp (ganti dengan nomor tujuan Anda)
        const whatsappNumber = @json(setting('site.whatsapp')); // Format internasional tanpa tanda + (misal: 628xxx)

        // Format pesan
        const whatsappMessage = `Assalamualaikum,%0A%0ASaya : ${name}%0AEmail : ${email}%0APhone : ${phone}%0A%0A${message}`;

        // Redirect ke WhatsApp
        window.open(`https://wa.me/${whatsappNumber}?text=${whatsappMessage}`, '_blank');
      }
    });

    function setError(id, message) {
      const element = document.getElementById(id);
      element.classList.add('is-invalid');
      element.nextElementSibling.textContent = message;
    }

    function clearError(id) {
      const element = document.getElementById(id);
      element.classList.remove('is-invalid');
      element.nextElementSibling.textContent = '';
    }
</script>
@endsection