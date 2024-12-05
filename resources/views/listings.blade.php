@extends('layouts.app')
@section('title', 'Umroh Listings - Tanur Mutmainnah Tour')

@section('content')
<div class="header-filter-section">
  <div class="bg-overlay"></div>
  <div class="container px-3 px-md-0 px-lg-0">
    <form id="listingFilterForm" action="/listings" accept-charset="UTF-8" method="get" class="element-filter">
      <div class="row no-gutters custom-search-input-2 mt-0">

        <div class="col-lg-4">
          <div class="form-group">
            <input id="searchListing" class="form-control" type="text" placeholder="Paket Umroh">
            <i class="fa fa-map-o"></i>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="form-group d-flex">
            <i class="fa fa-calendar"></i>
            <select class="wide" id="departureAtSelect">
              <option value="" selected>Waktu Keberangkatan</option>
            </select>
          </div>
        </div>

        <div class="col-lg-2">
          <div class="panel-dropdown">
            <a href="#">
              Pilihan Lain
            </a>
            <i class="fa fa-gears"></i>
            <div class="panel-dropdown-content">

              <div class="form-group d-flex mb-1">
                <i class="fa fa-paper-plane-o"></i>
                <select class="wide" id="departureFromSelect">
                  <option value="" selected>Lokasi Keberangkatan</option> <!-- Default option -->
                </select>
              </div>
            
              <div class="form-group d-flex mb-1">
                <i class="fa fa-money"></i>
                <select class="wide" id="pricingListSelect">
                  <option value="" selected>Biaya Umroh</option>
                </select>
              </div>

              <div class="form-group d-flex mb-1">
                <i class="fa fa-hotel"></i>
                <select class="wide" id="hotelSelect">
                  <option value="" selected>Hotel</option>
                </select>
              </div>

              <div class="form-group d-flex mb-1">
                <i class="fa fa-clock-o"></i>
                <select class="wide" id="durationSelect">
                  <option value="" selected>Durasi</option>
                </select>
              </div>

              <div class="form-group d-flex mb-1">
                <i class="fa fa-sort-amount-asc"></i>
                <select class="wide" name="sort" id="sortSelect">
                  <option value="" selected>Urutkan Berdasarkan</option>
                  <option value="created_at" >Tanggal Dibuat</option>
                  <option value="departure_at" >Tanggal Keberangkatan</option>
                  <option value="price_start" >Harga</option>
                  <option value="close_at" >Tanggal Ditutup</option>
                </select>
              </div>

              <div class="form-group d-flex mb-1">
                <i class="fa fa-sort-numeric-asc"></i>
                <select class="wide" name="sort_by" id="sortBySelect">
                  <option value="" selected>Atur Urutan</option>
                  <option value="asc" >
                    Terkecil
                  </option>
                  <option value="desc" >
                    Terbesar
                  </option>
                </select>
              </div>

            </div>
          </div>
        </div>

        <div class="col-lg-2">
          <div class="div-action">
            <input type="submit" class="btn_search" value="Cari">
            <a class="btn_search" href="/listings">
              <i class="fa fa-rotate-left"></i>
            </a>
          </div>
        </div>

      </div>
    </form>

    <!-- Error Modal -->
    <div id="errorModal" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">
          <div class="modal-body text-center">
            <i class="fa fa-exclamation-triangle fa-4x mb-2 text-warning"></i>
            <h4 class="font-weight-bold">Terjadi Kesalahan</h4>
            <div class="border-separator mb-3"></div>
            <p id="errorMessage" class="mb-4 h6 font-weight-normal"></p>

            <button type="button" class="btn_1 full-width" data-dismiss="modal">Tutup</button>
          </div>
        </div>

      </div>
    </div>

    <script>
      document.getElementById('listingFilterForm').addEventListener('submit', function (event) {
        // Get the select elements
        var sortSelect = document.getElementById('sortSelect');
        var sortBySelect = document.getElementById('sortBySelect');
        var errorModal = document.getElementById('errorModal');

        var errorMsg = document.getElementById('errorMessage');
        
        if (!sortBySelect.value && sortSelect.value) {
          event.preventDefault(); // Prevent form submission
          sortSelect.removeAttribute('name');

          errorMsg.innerHTML = 'Pilih filter <strong>Atur Tanggal</strong> terlebih dahulu!'
          
          $("#errorModal").appendTo("body");
          $('#errorModal').modal('show');
        } else if (!sortSelect.value && sortBySelect.value) {
          event.preventDefault(); // Prevent form submission
          sortBySelect.removeAttribute('name');

          errorMsg.innerHTML = 'Pilih filter <strong>Urutan Berdasarkan</strong> terlebih dahulu!'
          
          $("#errorModal").appendTo("body");
          $('#errorModal').modal('show');
        } if (!sortBySelect.value && !sortSelect.value) {
          sortSelect.removeAttribute('name');
          sortBySelect.removeAttribute('name');
        }
      });


      document.addEventListener("DOMContentLoaded", function() {
        const updateInputValue = (selectElement, paramName) => {
          const selectedOption = selectElement.options[selectElement.selectedIndex];
          console.log(`Selected item: ${selectedOption.text}`);
          
          // Remove the default option if a valid option is selected
          if (selectedOption.value !== "") {
            const defaultOption = selectElement.querySelector('option[value=""]');
            if (defaultOption) {
              defaultOption.remove();
            }
          }
        };

        const departureAtSelect = document.getElementById('departureAtSelect');
        const departureFromSelect = document.getElementById('departureFromSelect');
        const pricingListSelect = document.getElementById('pricingListSelect');
        const durationSelect = document.getElementById('durationSelect');
        const hotelSelect = document.getElementById('hotelSelect');

        departureAtSelect.addEventListener('change', () => updateInputValue(departureAtSelect, 'da'));
        departureFromSelect.addEventListener('change', () => updateInputValue(departureFromSelect, 'df'));
        pricingListSelect.addEventListener('change', () => updateInputValue(pricingListSelect, 'pr'));
        durationSelect.addEventListener('change', () => updateInputValue(durationSelect, 'd'));
        hotelSelect.addEventListener('change', () => updateInputValue(hotelSelect, 'ho'));

        const form = document.querySelector('form');
        form.addEventListener('submit', function(event) {
          const searchInput = document.getElementById('searchListing');
          const searchValue = searchInput.value.trim();
          if (searchValue) {
            const searchParam = `search=${encodeURIComponent(searchValue)}`;

            let currentUrl = window.location.href;

            // membagi antara base_url dengan bagian query (param)
            const [baseUrl, queryString] = currentUrl.split('?');
            
            // Parse existing query parameters into an array
            let queryParams = queryString ? queryString.split('&') : [];
            queryParams = queryParams.filter(param => !param.startsWith('search='));
            
            // add new param
            queryParams.push(searchParam);

            // inject new url ke url browser
            currentUrl = `${baseUrl}?${queryParams.join('&')}`;

            // window.history.pushState({}, '', currentUrl);
            window.location.href = currentUrl.toString();
            event.preventDefault();
          }

          const handleSelectSubmission = (selectElement, paramName) => {
            const selectValue = selectElement.options[selectElement.selectedIndex].value;

            // Remove existing hidden inputs with the same name
            const existingHiddenInputs = form.querySelectorAll(`input[name="${paramName}[]"]`);
            existingHiddenInputs.forEach(input => input.remove());

            // If a valid option is selected, create a hidden input
            if (selectValue) {
              const hiddenInput = document.createElement('input');
              hiddenInput.type = 'hidden';
              hiddenInput.name = `${paramName}[]`;
              hiddenInput.value = selectValue;
              form.appendChild(hiddenInput);
            }
          };

          // Handle both departure date and location select elements
          handleSelectSubmission(departureAtSelect, 'da');
          handleSelectSubmission(departureFromSelect, 'df');
          handleSelectSubmission(pricingListSelect, 'pr');
          handleSelectSubmission(hotelSelect, 'ho');
          handleSelectSubmission(durationSelect, 'd');
        
        });
        const urlParams = new URLSearchParams(window.location.search);
        const searchParam = urlParams.get('search');
        if (searchParam) {
          const searchInput = document.getElementById('searchListing');
          searchInput.value = decodeURIComponent(searchParam);
        }
      });

    </script>
  </div>
</div>


<!-- /hero_single -->
<div class="container py-5">
	<div class="row">


    <div id="listings_package" class="container-fluid">
      <div class="justify-content-start justify-content-lg-center">
        <section class="grid-box">
          <div class="row">
            
          </div>
        </section>
      </div>
    </div>
  </div>
  
</div>
@endsection