@extends('layouts.base')
@section('css')
<link rel="stylesheet" href="{{env('APP_URL')}}/assets/libs/select2/dist/css/select2.min.css">
@endsection

@section('content')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Customers</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="{{ route('home') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Manage Customers</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="{{env('APP_URL')}}/assets/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-3 d-flex align-items-center gap-2 justify-content-between">
        <h1>Customers</h1>
        <div style="aspect-ratio:1/1; width:3em; height:3em"
            class="bg-primary text-white d-flex align-items-center justify-content-center rounded-5 me-auto">
            {{ count($customers) }}</div>
        <button class="btn btn-primary btn-al-primary"
            data-bs-toggle="modal" data-bs-target="#addCustomerModal"
        >Tambah</button>
        @include('customers.addmodal',['id' => 'addCustomerModal'])
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{route('customer.index')}}" method="GET">
                <div class="row align-items-end mb-3 flex-wrap">
                    <div class="col-md-4 mb-2">
                        <label for="search" class="form-label">Filter Kata</label>
                        <input type="text" class="form-control" placeholder="Cari Customer" name="search" value="{{$filter->q ?? ''}}">
                    </div>
                    <div class="col-md-3 mb-2">
                        <label for="field" class="form-label">Urutkan Berdasarkan</label>
                        <select name="field" id="field" class="form-select">
                            @foreach (getModelAttributes('Customer', []) as $atr)
                            <option value="{{$atr}}" {{$filter->field == $atr ? 'selected' : ''}}>{{toPascalCase($atr)}}</option>
                            @endforeach                            
                        </select>
                    </div>
                    <div class="col-md-3 mb-2">
                        <label for="order" class="form-label">Dengan urutan</label>
                        <select name="order" id="order" class="form-select">
                            <option value="newest" {{$filter->order == 'desc' ? 'selected' : ''}}>Terbaru / Terbesar</option>
                            <option value="oldest" {{$filter->order == 'asc' ? 'selected' : ''}}>Terlama / Terkecil</option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-2">
                        <div class="d-flex align-items-center gap-1">
                            <button type="submit" class="btn btn-primary w-100" style="white-space: nowrap">Apply</button>
                            <a href="{{url()->current()}}" class="btn btn-secondary" style="white-space: nowrap">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M22 12c0 5.523-4.477 10-10 10S2 17.523 2 12S6.477 2 12 2v2a8 8 0 1 0 4.5 1.385V8h-2V2h6v2H18a9.99 9.99 0 0 1 4 8" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table border text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th>
                                <h6 class="fs-3 fw-semibold mb-0">Customer</h6>
                            </th>
                            <th>
                                <h6 class="fs-3 fw-semibold mb-0">Alamat</h6>
                            </th>
                            <th>
                                <h6 class="fs-3 fw-semibold mb-0">Pesanan</h6>
                            </th>
                            <th>
                                <h6 class="fs-3 fw-semibold mb-0">Timestamp</h6>
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($customers as $customer)
                            <tr>
                                <td>
                                    <div class="fs-3 fw-medium mb-2">
                                        {{ $customer->name }}
                                    </div>
                                    <div class=""><i class="ti ti-mail me-2"></i> {{$customer->email}}</div>
                                    <div class=""><i class="ti ti-phone me-2"></i> {{$customer->phone}}</div>
                                </td>
                                <td>
                                    <div class="fw-normal fs-2" style="white-space:normal; font-size:13px; ">{{ $customer->address }}</div>    
                                    <div class="text-primary fs-2">{{ $customer->city }}. {{$customer->postal_code}}</div>
                                </td>
                                <td>
                                    <div class="badge bg-secondary-subtle text-secondary fs-3">
                                        321
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex flex-column align-items-start gap-2">
                                        <div class="badge bg-success-subtle text-success rounded-3 fw-semibold fs-2">Updated
                                            at
                                            : {{ $customer->updated_at }}</div>
                                        <div class="badge bg-primary-subtle text-primary rounded-3 fw-semibold fs-2">Created
                                            at
                                            : {{ $customer->created_at }}</div>
                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown dropstart">
                                        <a href="#" class="text-muted" id="dropdownMenuButton"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ti ti-dots fs-5"></i>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li>
                                                <a href="{{route('customer.index', $customer->stock?->id)}}" class="dropdown-item d-flex align-items-center gap-3"><i
                                                        class="fs-4 ti ti-eye"></i>View</a>
                                            </li>
                                            <li>
                                                <button type="button" class="dropdown-item d-flex align-items-center gap-3"
                                                    data-bs-toggle="modal" data-bs-target="#editModal-{{$customer->id}}"><i
                                                        class="fs-4 ti ti-pencil"></i>Edit Customer</button>
                                            </li>
                                            <li>
                                                <button type="button" class="dropdown-item d-flex align-items-center gap-3"
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal-{{$customer->id}}"><i
                                                        class="fs-4 ti ti-trash"></i>Delete</button>
                                            </li>
                                        </ul>
                                    </div>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="editModal-{{$customer->id}}" tabindex="-1"
                                        aria-labelledby="vertical-center-modal" aria-hidden="true">
                                        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header d-flex align-items-center">
                                                    <h4 class="modal-title" id="myLargeModalLabel">
                                                        Perbarui Customer {{$customer->name}}
                                                    </h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('customer.update', $customer->id) }}" method="POST">
                                                        @csrf
                                                        <label for="name" class="form-label">Nama Customer</label>
                                                        <input type="text" name="name" class="form-control mb-2" value="{{ old('name', $customer->name) }}"
                                                        placeholder="Nama Customer">
                                                        <label for="email" class="form-label">Email</label>
                                                        <input type="email" name="email" class="form-control mb-2" value="{{ old('email', $customer->email) }}"
                                                        placeholder="customer@mail.com">
                                                        <label for="phone" class="form-label">Phone</label>
                                                        <input type="number" name="phone" class="form-control mb-2" value="{{ old('phone', $customer->phone) }}"
                                                        placeholder="">
                                                        <div class="mb-3">
                                                            <label class="form-label fw-semibold">Deskripsi</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text px-6" id="basic-addon1"><i
                                                                        class="ti ti-align-justified fs-6"></i></span>
                                                                <textarea class="form-control ps-2" name="description" id="description" cols="20" rows="5"
                                                                    placeholder="Description about this Customer">{{ old('description', $customer->description) }}</textarea>
                                                            </div>
                                                            @error('description')
                                                                <span class="invalid-feedback" role="alert">
                                                                    {{ $message }}
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="p-4 bg-primary-subtle rounded-4 mb-3">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <h5>Alamat Utama Customer</h5>
                                                                    <hr style="border-color: #cecece">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="text" class="form-label">Kota / Kabupaten</label>
                                                                        <div class="input-group mb-2">
                                                                            <span class="input-group-text px-6" id="basic-addon1"><i
                                                                                    class="ti ti-package fs-6"></i></span>
                                                                            <div style="flex-grow:1">
                                                                                <select name="city" id="city_edit-{{$customer->id}}" class="select2 form-select">
                                                                                    <option value="">-- Pilih Kota / Kabupaten --</option>
                                                                                    @foreach ($cities as $city)
                                                                                        <option value="{{$city->city_name}}" {{ $city->city_name == old('city', $customer->city) ? 'selected' : '' }}>
                                                                                            {{ $city->city_name }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label fw-semibold">Kode Pos (Postal Code)</label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-text px-6" id="basic-addon1"><i
                                                                                    class="ti ti-text-caption fs-6"></i></span>
                                                                            <input type="text" name="postal_code" value="{{ old('postal_code', $customer->postal_code) }}"
                                                                                class="form-control ps-2 bg-white" placeholder="Kode Pos Alamat utama">
                                                                        </div>
                                                                        @error('postal_code')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                {{ $message }}
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="">
                                                                <label class="form-label fw-semibold">Alamat</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text px-6" id="basic-addon1"><i
                                                                            class="ti ti-map-2 fs-6"></i></span>
                                                                    <textarea class="form-control bg-white ps-2" name="address" id="address" cols="20" rows="5"
                                                                        placeholder="Alamat utama Customer">{{ old('address', $customer->address) }}</textarea>
                                                                </div>
                                                                @error('address')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        {{ $message }}
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="d-flex gap-1 align-items-center justify-content-end">
                                                            <button type="button"
                                                                class="btn bg-danger-subtle text-danger  waves-effect text-start"
                                                                data-bs-dismiss="modal">
                                                                Close
                                                            </button>
                                                            <button type="submit"
                                                                class="btn btn-primary btn-al-primary">Perbarui</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Delete Modal -->
                                    <div id="deleteModal-{{$customer->id}}" class="modal fade" tabindex="-1"
                                        aria-labelledby="danger-header-modalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                            <div class="modal-content p-3 modal-filled bg-danger">
                                                <div class="modal-header modal-colored-header text-white">
                                                    <h4 class="modal-title text-white" id="danger-header-modalLabel">
                                                        Yakin ingin menghapus Customer ?
                                                    </h4>
                                                    <button type="button" class="btn-close btn-close-white"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body" style="width: fit-content; white-space:normal">
                                                    <h5 class="mt-0 text-white">Customer {{$customer->title}} akan dihapus</h5>
                                                    <p class="text-white">Segala data yang berkaitan dengan Customer tersebut juga akan dihapus secara permanen.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <form action="{{route('customer.destroy', $customer->id)}}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-dark">Ya, Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal for QR Code Preview -->
    <div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="qrModalLabel">QR Code</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <!-- Preview QR Code -->
                    <img id="qrCodeImage" src="" class="img-fluid rounded" alt="QR Code Preview">
                    <a id="downloadLink" href="#" class="btn btn-primary mt-3" download="qr_code.png">Download QR
                        Code</a>
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
        });
    </script>
@endsection
