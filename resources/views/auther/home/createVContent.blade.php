@extends('auther.layout.master')
@section('container')
    <main class="main-content d-flex flex-column min-vh-100 w-100">
        <section class="p-4 p-md-5 flex-grow-1">
            <div class="sw-panel mx-auto" style="max-width: 760px;">
                <span class="badge rounded-pill text-bg-light border text-purple mb-3">Coming Soon</span>
                <h1 class="fs-3 fw-bold text-dark mb-3">
                    <i class="fas fa-video text-purple me-2"></i> Upload Video Lecture Content
                </h1>
                <p class="sw-muted mb-4">
                    Video lecture publishing is planned for a future version of Phan Mee Eain. For the current release,
                    authors can continue publishing articles and educational content with attached resources.
                </p>
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('createContent#Page') }}" class="btn btn-primary">
                        <i class="fas fa-plus-circle me-2"></i> Create Written Content
                    </a>
                    <a href="{{ route('auther#Room') }}" class="btn btn-outline-primary">
                        Back to Author Room
                    </a>
                </div>
            </div>
        </section>
    </main>
@endsection
