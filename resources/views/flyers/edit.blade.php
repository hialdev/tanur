@extends('layouts.base')
@section('content')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Edit Flyer : {{$flyer->title}}</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="{{route('flyer.index')}}">Flyer</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Edit : {{$flyer->title}}</li>
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

    <div class="row">
      <div class="col-md-4 h-100 mb-3">
        <img src="{{$flyer->image ? '/storage/'.$flyer->image : 'https://placehold.co/800x400'}}" alt="Flyer Image Preview" class="rounded-4 shadow w-100" style="">
        <img src="" id="preview-image" alt="Flyer Image Preview" class="d-none rounded-4 shadow w-100" style="">
      </div>
      <div class="col-md-8">
        <div class="card">
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">Edit Flyer</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{route('flyer.update', $flyer->id)}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-4">
                      <label class="form-label fw-semibold">New Image Flyer</label>
                      <div class="input-group">
                          <span class="input-group-text px-6" id="basic-addon1"><i class="ti ti-photo fs-6"></i></span>
                          <input type="file" name="image" class="form-control ps-2">
                      </div>
                  </div>
                  <div class="mb-4">
                      <label class="form-label fw-semibold">Title Flyer</label>
                      <div class="input-group">
                          <span class="input-group-text px-6" id="basic-addon1"><i class="ti ti-text-caption fs-6"></i></span>
                          <input type="text" name="title" value="{{old('title', $flyer->title)}}" class="form-control ps-2" placeholder="This is The Title of Flyer">
                      </div>
                  </div>
                  <div class="mb-4">
                      <label class="form-label fw-semibold">Description</label>
                      <div class="input-group">
                          <span class="input-group-text px-6" id="basic-addon1"><i class="ti ti-align-justified fs-6"></i></span>
                          <textarea class="form-control ps-2" name="description" id="description" cols="20" rows="5"
                              placeholder="Description about this flyer">{{old('description', $flyer->description)}}</textarea>
                      </div>
                  </div>
                  <div class="mb-4">
                      <label class="form-label fw-semibold">Priode Keberangkatan</label>
                      <div class="input-group">
                          <span class="input-group-text px-6" id="basic-addon1"><i class="ti ti-calendar-event fs-6"></i></span>
                          <input type="date" name="periode" value="{{old('periode', $flyer->periode)}}" class="form-control ps-2">
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="mb-4">
                          <label class="form-label fw-semibold">Open Seat</label>
                          <div class="input-group">
                              <span class="input-group-text px-6" id="basic-addon1"><i class="ti ti-users fs-6"></i></span>
                              <input type="number" name="open_seat" value="{{old('open_seat', $flyer->open_seat)}}" class="form-control ps-2">
                          </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-4">
                          <label class="form-label fw-semibold">Sisa Seat</label>
                          <div class="input-group">
                              <span class="input-group-text px-6" id="basic-addon1"><i class="ti ti-user-minus fs-6"></i></span>
                              <input type="number" name="left_seat" value="{{old('left_seat', $flyer->left_seat)}}" class="form-control ps-2">
                          </div>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Update Flyer</button>
                </form>
            </div>
        </div>
      </div>
    </div>
@endsection
@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const fileInput = document.querySelector('input[type="file"][name="image"]');
    const placeholder = document.getElementById('placeholder-image');
    const previewImage = document.getElementById('preview-image');

    fileInput.addEventListener('change', function (event) {
        const file = event.target.files[0];

        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();

            reader.onload = function (e) {
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
});
</script>
@endsection
