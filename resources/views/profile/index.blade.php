@extends('layouts.base')
@section('content')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Profile</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="{{ route('home') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Profile</li>
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

    <div class="card overflow-hidden">
        <div class="card-body p-0">
            <img src="../assets/images/backgrounds/profilebg.jpg" alt="" class="img-fluid">
            <div class="row align-items-center">
                <div class="col-lg-4 order-lg-1 order-2">
                    <div class="d-flex align-items-center justify-content-around m-4">
                        <div class="d-flex align-items-center gap-3">
                            <i class="ti ti-photo d-block mb-2" style="font-size: 2rem"></i>
                            <div>
                                <h4 class="mb-0 fw-semibold lh-1">{{ $user->flyersCount() }}</h4>
                                <p class="mb-0 fs-4">Flyers</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <i class="ti ti-eye d-block mb-2" style="font-size: 2rem"></i>
                            <div>
                                <h4 class="mb-0 fw-semibold lh-1">{{ $totalViews }}</h4>
                                <p class="mb-0 fs-4">Views</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-n3 order-lg-2 order-1">
                    <div class="mt-n5">
                        <div class="d-flex align-items-center justify-content-center mb-2">
                            <div class="d-flex align-items-center justify-content-center round-110">
                                <div
                                    class="border border-4 border-white d-flex align-items-center justify-content-center rounded-circle overflow-hidden round-100">
                                    <img src="../assets/images/profile/user-1.jpg" alt="" class="w-100 h-100">
                                </div>
                            </div>
                        </div>
                        <div class="text-center mb-4">
                            <h5 class="fs-5 mb-0 fw-semibold">{{$user->name}}</h5>
                            <p class="mb-0 fs-4">{{$user->email}}</p>
                            <p class="mb-0 fs-2 bg-primary-subtle d-inline-block text-primary rounded-2 p-1 px-2 my-3">{{$user->getRoleNames()[0]}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 order-last">
                    <ul
                        class="list-unstyled d-flex align-items-center justify-content-center justify-content-lg-end my-3 mx-4 pe-4 gap-3">
                        <li><a href="{{route('profile.edit')}}" class="btn btn-primary">Edit Profile</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class=""
        style="
          display: grid;
          gap: 1rem;
          grid-template-columns: repeat(3, 1fr);"
        >
        @forelse ($user->flyers as $flyer)
        <div class="card overflow-hidden mb-2">
            <div class="el-card-item pb-3">
                <div
                    class="
                  el-card-avatar
                  mb-3
                  el-overlay-1
                  w-100
                  overflow-hidden
                  position-relative
                  text-center
                ">
                    <a class="image-popup-vertical-fit" href="{{route('flyer.status', $flyer->id)}}">
                        <img src="{{ $flyer->image ? '/storage/'.$flyer->image :'/assets/images/blog/blog-img5.jpg'}}" class="d-block position-relative w-100"
                            alt="user" />
                    </a>
                </div>
                <div class="el-card-content text-center">
                    <h4 class="mb-0 fs-4">{{$flyer->title}}</h4>
                    <div class="my-2 text-muted justify-content-center d-flex align-items-center gap-2"><i class="ti ti-eye" style="font-size: 1rem"></i> {{$flyer->viewsCount()}}</div>
                </div>
            </div>
        </div>
        @empty
        <div class="d-flex align-items-center justify-content-center p-4 rounded-4 border-2 border-dashed w-100" style="height: 40vh; grid-column: span 3;">
            <div class="text-center">Tidak ada Flyers</div>
        </div>
        @endforelse
    </div>
@endsection
