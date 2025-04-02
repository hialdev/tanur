<!-- Add New Customer modal -->
<div class="modal fade" id="{{$id}}" tabindex="-1" aria-labelledby="vertical-center-modal"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="myLargeModalLabel">
                    Tambah Customer
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('customer.store') }}" method="POST">
                    @csrf

                    <label for="name" class="form-label">Nama Customer</label>
                    <input type="text" name="name" class="form-control mb-2" value="{{ old('name') }}"
                      placeholder="Nama Customer">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control mb-2" value="{{ old('email') }}"
                      placeholder="customer@mail.com">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="number" name="phone" class="form-control mb-2" value="{{ old('phone') }}"
                      placeholder="">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Deskripsi</label>
                        <div class="input-group">
                            <span class="input-group-text px-6" id="basic-addon1"><i
                                    class="ti ti-align-justified fs-6"></i></span>
                            <textarea class="form-control ps-2" name="description" id="description" cols="20" rows="5"
                                placeholder="Description about this Customer">{{ old('description') }}</textarea>
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
                                            <select name="city" id="city_added" class="select2 form-select">
                                                <option value="">-- Pilih Kota / Kabupaten --</option>
                                                @foreach ($cities as $city)
                                                    <option value="{{$city->city_name}}" {{ $city->city_name == old('city') ? 'selected' : '' }}>
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
                                        <input type="text" name="postal_code" value="{{ old('postal_code') }}"
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
                                    placeholder="Alamat utama Customer">{{ old('address') }}</textarea>
                            </div>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex gap-1 align-items-center justify-content-end">
                        <button type="button" class="btn bg-danger-subtle text-danger  waves-effect text-start"
                            data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary btn-al-primary">Tambah Customer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
