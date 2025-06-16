@extends('layouts.base')
@section('css')
<link rel="stylesheet" href="{{env('APP_URL')}}/assets/libs/select2/dist/css/select2.min.css">
@endsection
@section('content')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Edit Bal : {{$bal->name}} ({{$bal->code}})</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="{{ route('bal.index') }}">Produk</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Edit</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="../assets/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 h-100 mb-3">
            @if($bal->image)
            <img id="now-image" src="{{ '/storage/'.$bal->image }}" alt="Product Image Preview" class="rounded-4 shadow w-100"
                style="">
            @else
            <div id="placeholder-image"
                class="d-flex p-5 text-center align-items-center justify-content-center rounded-5 border-2 border-dashed"
                style="aspect-ratio:1/1">
                <div>
                    <div class="fs-4">If Image Selected, it will show (Preview)</div>
                </div>
            </div>
            @endif
            <img src="" id="preview-image" alt="Product Image Preview" class="d-none rounded-4 shadow w-100"
                style="">
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="px-4 py-3 border-bottom">
                    <h5 class="card-title fw-semibold mb-0">Edit Bal : {{$bal->name}} ({{$bal->code}})</h5>
                </div>
                <div class="card-body p-4">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('bal.update', $bal->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Image Bal</label>
                            <div class="input-group">
                                <span class="input-group-text px-6" id="basic-addon1"><i
                                        class="ti ti-photo fs-6"></i></span>
                                <input type="file" name="image" class="form-control ps-2" accept="image/*">
                            </div>
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Nama</label>
                            <div class="input-group">
                                <span class="input-group-text px-6" id="basic-addon1"><i
                                        class="ti ti-text-caption fs-6"></i></span>
                                <input type="text" name="name" value="{{old('name', $bal->name)}}" class="form-control ps-2" placeholder="Name Product">
                            </div>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Keterangan</label>
                            <div class="input-group">
                                <span class="input-group-text px-6" id="basic-addon1"><i
                                        class="ti ti-align-justified fs-6"></i></span>
                                <textarea class="form-control ps-2" name="description" id="description" cols="20" rows="5"
                                    placeholder="Description about this Product">{{old('description', $bal->description)}}</textarea>
                            </div>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="p-3 rounded-3 bg-primary-subtle mb-2">
                            <label for="product_type_id" class="form-label">Tipe Produk</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text px-6" id="basic-addon1"><i
                                        class="ti ti-package fs-6"></i></span>
                                <div style="flex-grow:1">
                                    <select name="product_type_id" id="product_type_id" class="select2-normal form-select">
                                        <option value="">-- Pilih Tipe Produk --</option>
                                        @foreach ($product_types as $product_type)
                                            <option value="{{$product_type->id}}" {{ $product_type->id == old('product_type_id', $bal->product_type_id) ? 'selected' : '' }}>
                                                {{ $product_type->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="is_for_purchase" type="checkbox" value="1" id="is_for_purchase" {{ old('is_for_purchase', $bal->purchase_order_id ?? request()->filled('purchase_order')) ? 'checked' : ''}} />
                                    <label class="form-check-label" for="is_for_purchase">Bal ini dari Pembelian Principal</label>
                                </div>
                            </div>
                            <div id="purchase" class="{{$bal->purchase_order_id ? '' : 'd-none'}}">
                                <label for="purchase_order_id" class="form-label">Pembelian Principal / Purchase Order</label>
                                <div class="input-group mb-2">
                                    <span class="input-group-text px-6" id="basic-addon1"><i
                                            class="ti ti-package fs-6"></i></span>
                                    <div style="flex-grow:1">
                                        <select name="purchase_order_id" id="purchase_order" class="select2-normal form-select">
                                            <option value="">-- Pilih Pembelian --</option>
                                            @foreach ($purchase_orders as $purchase_order)
                                                <option value="{{$purchase_order->id}}" {{ $purchase_order->id == old('purchase_order_id', $bal->purchase_order_id) ? 'selected' : '' }}>
                                                    {{ $purchase_order->code . ' - ' . \Carbon\Carbon::parse($purchase_order->date)->format('d M Y') }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    Tidak menemukan Pembelian ? 
                                    <a href="" class="btn btn-sm text-primary bg-primary-subtle"
                                        >Tambah Pembelian</a>
                                </div>
                            </div>

                            <!-- Container Produk -->
                            <div class="p-4 border-2 border-dashed rounded-3 mt-3">
                                <h6>Bal ini Berisi Produk</h6>
                                <div id="product-container">
                                    @foreach ($bal->products as $balProduct)
                                        <div class="d-flex flex-wrap mb-1 flex-1 w-100 align-items-center">
                                            <input type="hidden" name="product_id[]" value="{{$balProduct->product_id}}">
                                            <img src="{{ $balProduct->product->image ? '/storage/' . $balProduct->product->image : 'https://placehold.co/300?text=' . $balProduct->product->name }}"
                                                class="rounded-2" alt="product Image {{$balProduct->product->name}}" style="width: 4em" />
                                            <div class="ms-3">
                                                <h6 class="fw-semibold mb-1" style="white-space: normal !important">{{$balProduct->product->name}}</h6>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div><i class="ti ti-arrow-up"></i> {{$balProduct->product->height}} cm</div>
                                                    <div><i class="ti ti-arrow-right"></i> {{$balProduct->product->width}} cm</div>
                                                </div>
                                            </div>
                                            <div class="ms-auto">
                                                <div class="fs-2 mb-1">Qty. (available {{$balProduct->qty}})</div>
                                                <input type="number" class="form-control bg-white" style="max-width:10em" name="qty[]" value="{{$balProduct->qty}}" max="{{$balProduct->qty}}" placeholder="{{$balProduct->qty}}">
                                            </div>
                                        </div>
                                    @endforeach
                                    {{-- Produk akan diisi secara dinamis --}}
                                </div>
                                <div class="d-flex flex-wrap gap-1">
                                    <button type="button" id="add-product" class="btn btn-sm btn-secondary mt-2">
                                        <i class="ti ti-plus"></i> Tambah Produk Manual
                                    </button>
                                    <button type="button" id="refresh-product" class="btn btn-sm btn-dark mt-2">
                                        <i class="ti ti-refresh me-1"></i> Reset dari Pembelian
                                    </button>
                                    <button type="button" id="reset-product" class="btn btn-sm btn-warning mt-2">
                                        <i class="ti ti-refresh me-1"></i> Reset ke Awal
                                    </button>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Perbarui Produk
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('units.addmodal', ['id' => 'addSatuanModal'])
@endsection
@section('scripts')
    <script src="{{env('APP_URL')}}/assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="{{env('APP_URL')}}/assets/libs/select2/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').each(function () {
                let modal = $(this).closest('.modal'); // Cari modal terdekat
                $(this).select2({
                    dropdownParent: modal // Pasang dropdown di dalam modal
                });
            });
            $('.select2-normal').each(function () {
                let modal = $(this).closest('.modal'); // Cari modal terdekat
                $(this).select2();
            });
        });
    </script>
    <script>
        $(document).ready(function () {

            function fetchProducts(id) {
                $.get(`/purchase-order/${id}/products`, function (data) {
                    let html = '';

                    data.forEach((prod) => {
                        html += `
                            <div class="d-flex flex-wrap gap-2 mb-1 flex-1 w-100 align-items-center">
                                <input type="hidden" name="product_id[]" value="${prod.product_id}">
                                <img src="${ prod.image }"
                                    class="rounded-2" alt="product Image ${prod.name}" style="width: 4em" />
                                <div class="">
                                    <h6 class="fw-semibold mb-1" style="white-space: normal !important">${prod.name}</h6>
                                    <div class="d-flex align-items-center gap-2">
                                        <div><i class="ti ti-arrow-up"></i> ${prod.height} cm</div>
                                        <div><i class="ti ti-arrow-right"></i> ${prod.width} cm</div>
                                    </div>
                                </div>
                                <div class="ms-auto">
                                    <div class="fs-2 mb-1">Qty. (available ${prod.qty})</div>
                                    <input type="number" class="form-control bg-white" style="max-width:10em" name="qty[]" value="0" max="${prod.qty}" placeholder="${prod.qty}">
                                </div>
                            </div>`;
                    });

                    $('#product-container').html(html);
                });
            }
            // Ketika purchase order diubah
            $('#purchase_order').on('change', function () {
                const id = $(this).val();
                if (!id) return;

                fetchProducts($id);
            });

            // Hapus baris produk
            $(document).on('click', '.remove-row', function () {
                $(this).closest('.product-row').remove();
            });

            const currentPurchaseId = @JSON($bal->purchase_order_id);
            // Refresh 
            $('#refresh-product').on('click', function () {
                if (!currentPurchaseId) return;
                fetchProducts(currentPurchaseId);
            })

            $('#reset-product').on('click', function () {
                location.reload();
            })
            
            // Tambah produk manual
            let productCounter = 0;
            $('#add-product').on('click', function () {
                productCounter++; // Tambah counter setiap klik

                let manual = `
                    <div class="d-flex flex-wrap align-items-end gap-2 mb-2 product-row">
                        <select name="product_id[]" id="select_product_${productCounter}" class="form-select" style="width:100%">
                            <option value="">-- Pilih Produk --</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">
                                    {{ $product->name }} - Jual {{ formatRupiah($product->price_per_unit) }} / {{ $product->unit->code }}
                                </option>
                            @endforeach
                        </select>
                        <div>
                            <div class="fs-1 mb-1 text-dark">Sebanyak</div>
                            <input type="number" class="form-control bg-white" name="qty[]" value="0" placeholder="Sebanyak" style="max-width:10em">
                        </div>
                        <button type="button" class="btn btn-sm btn-danger remove-row"><i class="ti ti-trash"></i></button>
                    </div>`;
                $('#product-container').append(manual);
            
                // Inisialisasi select2 setelah ditambahkan
                $(`#select_product_${productCounter}`).select2({
                    dropdownParent: $('#product-container') // opsional jika select2 di modal
                });
            });

        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.querySelector('input[type="file"][name="image"]');
            const placeholder = document.getElementById('placeholder-image');
            const nowImage = document.getElementById('now-image');
            const previewImage = document.getElementById('preview-image');

            fileInput.addEventListener('change', function(event) {
                const file = event.target.files[0];

                if (file && file.type.startsWith('image/')) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        previewImage.src = e.target.result; // Set preview image source
                        nowImage.classList.add('d-none');
                        previewImage.classList.remove('d-none'); // Show the preview image
                        placeholder.classList.add('d-none'); // Hide the placeholder
                    };

                    reader.readAsDataURL(file);
                } else {
                    // Reset if no file or file is not an image
                    previewImage.src = '';
                    previewImage.classList.add('d-none');
                    nowImage.classList.remove('d-none');
                    placeholder.classList.remove('d-none');
                }
            });

            $('input[name="name"]').on('input', function() {
                const name = $(this).val();
                $('input[name="slug"]').val(makeSlug(name));
            });

            $('input[name="price"]').on('input', function() {
                $(this).val(formatRupiah($(this).val()));
            })

            $('input[name="is_for_purchase"]').on('change', function(){
                let check = $(this).is(':checked');
                if(check) {
                    $('#purchase').removeClass('d-none');
                }else{
                    $('#purchase').addClass('d-none');
                }
            })
        });
    </script>
@endsection
