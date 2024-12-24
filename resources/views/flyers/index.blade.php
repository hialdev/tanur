@extends('layouts.base')
@section('css')
@endsection
@section('content')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Flyer</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="{{ route('home') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">All Flyer</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="/assets/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-3 d-flex align-items-center gap-2 justify-content-between">
        <h1>Flyer</h1>
        <div style="aspect-ratio:1/1; width:3em; height:3em"
            class="bg-primary text-white d-flex align-items-center justify-content-center rounded-5 me-auto">
            {{ count($flyers) }}</div>
        <a href="{{ route('flyer.add') }}" class="btn btn-primary btn-al-primary">Add New</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{route('flyer.index')}}" method="GET">
                <div class="row align-items-end mb-3 flex-wrap">
                    <div class="col-md-4 mb-2">
                        <label for="search" class="form-label">Filter Kata</label>
                        <input type="text" class="form-control" placeholder="Cari Nama / Deskripsi" name="search" value="{{$filter->q ?? ''}}">
                    </div>
                    <div class="col-md-3 mb-2">
                        <label for="field" class="form-label">Urutkan Berdasarkan</label>
                        <select name="field" id="field" class="form-select">
                            <option value="title" {{$filter->field == 'title' ? 'selected' : ''}}>Flyer Title</option>
                            <option value="open_seat" {{$filter->field == 'open_seat' ? 'selected' : ''}}>Open Seat</option>
                            <option value="left_seat" {{$filter->field == 'left_seat' ? 'selected' : ''}}>Left Seat</option>
                            <option value="updated_at" {{$filter->field == 'updated_at' ? 'selected' : ''}}>Updated at</option>
                            <option value="created_at" {{$filter->field == 'created_at' ? 'selected' : ''}}>Created at</option>
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
                            <a href="{{route('flyer.index')}}" class="btn btn-secondary" style="white-space: nowrap">
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
                                <h6 class="fs-4 fw-semibold mb-0">Flyer</h6>
                            </th>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">Viewed</h6>
                            </th>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">Seat</h6>
                            </th>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">Timestamp</h6>
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($flyers as $flyer)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center" style="width:20em">
                                        <img src="{{ $flyer->image ? asset('storage/' . $flyer->image) : '/assets/images/profile/user-1.jpg' }}"
                                            class="rounded-2" alt="Flyer Image {{ $flyer->title }}" style="width: 4em" />
                                        <div class="ms-3">
                                            <h6 class="fw-semibold mb-1">{{ $flyer->title }}</h6>
                                            <span class="fw-normal line-clamp line-clamp-2"
                                                style="white-space:normal; font-size:13px; ">{{ $flyer->description }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 fw-normal">{{ $flyer->viewsCount() }}</p>
                                </td>
                                <td>
                                    <div class="d-flex flex-column align-items-start gap-2">
                                        <div class="badge bg-success-subtle text-success rounded-3 fw-semibold fs-2">Open :
                                            {{ $flyer->open_seat }}</div>
                                        <div class="badge bg-danger-subtle text-danger rounded-3 fw-semibold fs-2">Sisa :
                                            {{ $flyer->left_seat }}</div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex flex-column align-items-start gap-2">
                                        <div class="badge bg-success-subtle text-success rounded-3 fw-semibold fs-2">Updated
                                            at
                                            : {{ $flyer->updated_at }}</div>
                                        <div class="badge bg-primary-subtle text-primary rounded-3 fw-semibold fs-2">Created
                                            at
                                            : {{ $flyer->created_at }}</div>
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
                                                <a href="{{route('flyer.status', $flyer->id)}}" class="dropdown-item d-flex align-items-center gap-3"><i
                                                        class="fs-4 ti ti-eye"></i>View</a>
                                            </li>
                                            <li>
                                                <button type="button" class="dropdown-item d-flex align-items-center gap-3"
                                                    data-bs-toggle="modal" data-bs-target="#pop-tool-modal"><i
                                                        class="fs-4 ti ti-user-minus"></i>Set Sisa Seat</button>
                                            </li>
                                            <li>
                                                <button type="button" class="dropdown-item d-flex align-items-center gap-3"
                                                    data-bs-toggle="modal" data-bs-target="#qrModal"
                                                    data-id="{{ $flyer->id }}"><i
                                                        class="fs-4 ti ti-qrcode"></i>Generate QR Code</button>
                                            </li>
                                            <li>
                                                <a href="{{route('flyer.edit', $flyer->id)}}" class="dropdown-item d-flex align-items-center gap-3"><i
                                                        class="fs-4 ti ti-edit"></i>Edit</a>
                                            </li>
                                            <li>
                                                <button type="button" class="dropdown-item d-flex align-items-center gap-3"
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal"><i
                                                        class="fs-4 ti ti-trash"></i>Delete</button>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Vertically centered modal -->
                                    <div class="modal fade" id="pop-tool-modal" tabindex="-1"
                                        aria-labelledby="vertical-center-modal" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header d-flex align-items-center">
                                                    <h4 class="modal-title" id="myLargeModalLabel">
                                                        Perbarui Sisa Seat
                                                    </h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('flyer.seat', $flyer->id) }}" method="POST">
                                                        @csrf
                                                        <label for="left_seat" class="form-label">Sisa Seat</label>
                                                        <input type="hidden" name="open_seat"
                                                            value="{{ $flyer->open_seat }}">
                                                        <input type="number" name="left_seat" class="form-control mb-2"
                                                            value="{{ old('left_seat', $flyer->left_seat) }}"
                                                            placeholder="Open Seat : {{ $flyer->open_seat }}, Sisa Terkini : {{ $flyer->left_seat }}">
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
                                    <div id="deleteModal" class="modal fade" tabindex="-1"
                                        aria-labelledby="danger-header-modalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                            <div class="modal-content p-3 modal-filled bg-danger">
                                                <div class="modal-header modal-colored-header text-white">
                                                    <h4 class="modal-title text-white" id="danger-header-modalLabel">
                                                        Yakin ingin menghapus Flyer ?
                                                    </h4>
                                                    <button type="button" class="btn-close btn-close-white"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body" style="width: fit-content; white-space:normal">
                                                    <h5 class="mt-0 text-white">Flyer {{$flyer->title}} akan dihapus</h5>
                                                    <p class="text-white">Segala data yang berkaitan dengan flyer tersebut juga akan dihapus secara permanen.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <form action="{{route('flyer.destroy', $flyer->id)}}" method="POST">
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const qrModal = document.getElementById('qrModal');
            const qrCodeImage = document.getElementById('qrCodeImage');
            const downloadLink = document.getElementById('downloadLink');

            qrModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget; // Tombol yang memicu modal
                const flyerId = button.getAttribute('data-id'); // Ambil ID flyer dari atribut tombol
                const qrUrl = `/flyer/${flyerId}/qr-logo`; // Endpoint QR code

                // Fetch QR Code data
                fetch(qrUrl)
                    .then(response => response.json())
                    .then(data => {
                        if (data.qrCodeUrl) {
                            qrCodeImage.src = data.qrCodeUrl;
                            downloadLink.href = data.qrCodeUrl; // Set link untuk unduh
                        }
                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    </script>
@endsection
