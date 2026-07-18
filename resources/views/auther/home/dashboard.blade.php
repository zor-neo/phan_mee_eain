@extends('auther.layout.master')
@section('container')
    <!-- Main Content -->
    <main class="main-content d-flex flex-column min-vh-100 w-100">

        <!-- Home Section -->
        <section class="p-4 p-md-5 flex-grow-1">

            <h1 class="fs-3 fw-bold text-secondary mb-4"><i class="fas fa-chart-line text-purple me-2"></i> Overview</h1>

            <!-- Grid Boxes -->
            <div class="row g-4 mb-5">

                <!-- Playlists Stats -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card p-4 border shadow-sm h-100 rounded-3 bg-white position-relative overflow-hidden">
                        <h2 class="fs-1 fw-bold text-dark mb-0">
                            {{count($userContent)}}
                        </h2>
                        <p class="text-muted small fw-bold mb-4">Total Contents</p>
                        <a href="{{ route('autherContent#Page') }}" class="btn btn-outline-primary w-100 mt-auto">Manage Contents</a>
                        <i class="fas fa-bars-staggered dashboard-icon"></i>
                    </div>
                </div>

                <!-- Contents Stats -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card p-4 border shadow-sm h-100 rounded-3 bg-white position-relative overflow-hidden">
                        <h2 class="fs-1 fw-bold text-dark mb-0">{{count($videoContent)}}</h2>
                        <p class="text-muted small fw-bold mb-4">Videos & Quizzes</p>
                        <a href="{{route('createVContent#Page')}}" class="btn btn-outline-primary w-100 mt-auto">Manage Playlists</a>
                        <i class="fas fa-video dashboard-icon"></i>
                    </div>
                </div>

                <!-- Comments Stats -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card p-4 border shadow-sm h-100 rounded-3 bg-white position-relative overflow-hidden">
                        <h2 class="fs-1 fw-bold text-dark mb-0">{{count($comments)}}</h2>
                        <p class="text-muted small fw-bold mb-4">Unread Comments</p>
                        <a href="{{ route('comment#Page') }}" class="btn btn-outline-primary w-100 mt-auto">View Comments</a>
                        <i class="fas fa-comments dashboard-icon"></i>
                    </div>
                </div>

            </div>

            <!-- Recent Activity Section -->
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="card border shadow-sm rounded-3 bg-white">
                        <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 fw-bold text-dark fs-5"><i class="fas fa-clock text-purple me-2"></i> Recent Comments</h5>
                        </div>
                        <div class="card-body p-0">
                            <!-- show comment -->
                            @foreach ($comments as $item)
                                <div class="d-flex align-items-center p-3 border-bottom">
                                    <img src="{{asset($item->image != null ? '/profile/' . $item->image : 'image/user-male-circle.jpg')}}" class="rounded-circle bg-light border me-3" width="40" height="40" alt="Student">
                                    <div class="flex-grow-1">
                                        <p class="mb-0 small"><span class="fw-bold text-dark">{{$item->name}}</span> commented on <span class="fw-bold text-primary">{{$item->title}}</span></p>
                                    </div>
                                    <span class="text-muted small ms-2">{{$item->created_at->diffForHumans()}}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Quick Actions / Quick Links -->
                <div class="col-12 col-lg-4 mt-4 mt-lg-0">
                    <div class="card border shadow-sm rounded-3 bg-white">
                        <div class="card-header bg-white border-bottom py-3">
                            <h5 class="mb-0 fw-bold text-dark fs-5"><i class="fas fa-bolt text-warning me-2"></i> Quick Actions</h5>
                        </div>
                        <div class="card-body p-3 d-flex flex-column gap-2">
                            <a href="{{route('createContent#Page')}}" class="btn btn-light text-start fw-bold text-dark border"><i class="fas fa-plus-circle text-purple me-2"></i> Create New Content</a>
                            <a href="{{route('createVContent#Page')}}" class="btn btn-light text-start fw-bold text-dark border"><i class="fas fa-cloud-upload-alt text-purple me-2"></i> Upload Video Content</a>
                            <a href="{{route('createQuize#Page')}}" class="btn btn-light text-start fw-bold text-dark border"><i class="fas fa-question-circle text-purple me-2"></i> Create Quiz Test</a>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </main>
@endsection
