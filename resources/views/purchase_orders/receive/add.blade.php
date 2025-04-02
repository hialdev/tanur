@extends('layouts.base')
@section('css')
<link rel="stylesheet" href="{{env('APP_URL')}}/assets/libs/select2/dist/css/select2.min.css">
@endsection
@section('content')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Tambah Penerimaan Barang dari Pembelian</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="{{ route('receive.index') }}">Penerimaan Pembelian</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Tambah</li>
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
            <div id="placeholder-image"
                class="d-flex p-5 text-center align-items-center justify-content-center rounded-5 border-2 border-dashed"
                style="aspect-ratio:1/1">
                <div>
                    <div class="fs-4">If Image Selected, it will show (Preview)</div>
                </div>
            </div>
            <img src="" id="preview-image" alt="Proof Image Preview" class="d-none rounded-4 shadow w-100"
                style="">
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="px-4 py-3 border-bottom">
                    <h5 class="card-title fw-semibold mb-0">Tambah Penerimaan Barang dari Pembelian</h5>
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
                    <form action="{{ route('receive.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Bukti Penerimaan</label>
                            <div class="input-group">
                                <span class="input-group-text px-6" id="basic-addon1"><i
                                        class="ti ti-photo fs-6"></i></span>
                                <input type="file" name="image" class="form-control ps-2">
                            </div>
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Tanggal Penerimaan</label>
                            <div class="input-group">
                                <span class="input-group-text px-6" id="basic-addon1"><i
                                        class="ti ti-text-caption fs-6"></i></span>
                                <input type="date" name="date" value="{{old('date', \Carbon\Carbon::now()->format('Y-m-d'))}}" class="form-control ps-2" placeholder="Tanggal Penerimaan">
                            </div>
                            @error('date')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        
                        <div class="p-3 rounded-3 bg-primary-subtle mb-2">
                            <label for="purchase_order_id" class="form-label">Purchase Order / Pembelian</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text px-6" id="basic-addon1"><i
                                        class="ti ti-package fs-6"></i></span>
                                <div style="flex-grow:1">
                                    <select name="purchase_order_id" id="purchase_order_id" class="select2-normal form-select">
                                        <option value="">-- Pilih Pembelian --</option>
                                        @foreach ($purchases as $purchase)
                                            <option value="{{$purchase->id}}" {{ $purchase->id == old('purchase_order_id', request()->get('poid')) ? 'selected' : '' }}>
                                                {{ $purchase->code }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <label for="warehouse_id" class="form-label">Gudang Penerima</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text px-6" id="basic-addon1"><i
                                        class="ti ti-package fs-6"></i></span>
                                <div style="flex-grow:1">
                                    <select name="warehouse_id" id="warehouse_id" class="select2-normal form-select">
                                        <option value="">-- Pilih Gudang --</option>
                                        @foreach ($warehouses as $warehouse)
                                            <option value="{{$warehouse->id}}" {{ $warehouse->id == old('warehouse_id', request()->get('whid')) ? 'selected' : '' }}>
                                                {{ $warehouse->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <label for="user_id" class="form-label">Penanggung Jawab</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text px-6" id="basic-addon1"><i
                                        class="ti ti-package fs-6"></i></span>
                                <div style="flex-grow:1">
                                    <select name="user_id" id="user" class="select2-normal form-select">
                                        <option value="">-- Pilih Penanggung Jawab --</option>
                                        <option value="{{auth()->user()->id}}" {{ auth()->user()->id == old('user_id') ? 'selected' : '' }}>
                                                {{ auth()->user()->name }} (Saya Sendiri)
                                            </option>
                                        @foreach ($users as $user)
                                            <option value="{{$user->id}}" {{ $user->id == old('user_id') ? 'selected' : '' }}>
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                Tidak menemukan Penanggung Jawab ? 
                                <a href="{{urlApp('SSO','/user/add')}}" target="_blank" class="btn btn-sm text-primary bg-primary-subtle"
                                    >Tambah Penanggung Jawab</a>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Keterangan</label>
                            <div class="input-group">
                                <span class="input-group-text px-6" id="basic-addon1"><i
                                        class="ti ti-align-justified fs-6"></i></span>
                                <textarea class="form-control ps-2" name="description" id="description" cols="20" rows="5"
                                    placeholder="Description about this receivement">{{old('description')}}</textarea>
                            </div>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-primary">
                            Tambah Penerimaan Barang dari Pembelian
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.querySelector('input[type="file"][name="image"]');
            const placeholder = document.getElementById('placeholder-image');
            const previewImage = document.getElementById('preview-image');

            fileInput.addEventListener('change', function(event) {
                const file = event.target.files[0];

                if (file && file.type.startsWith('image/')) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        previewImage.src = e.target.result; // Set preview image source
                        previewImage.classList.remove('d-none'); // Show the preview image
                        placeholder.classList.add('d-none'); // Hide the placeholder
                    };

                    reader.readAsDataURL(file);
                } else {
                    // Reset if no file or file is not an image
                    previewImage.src = '';
                    previewImage.classList.add('d-none');
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
        });
    </script>
@endsection
