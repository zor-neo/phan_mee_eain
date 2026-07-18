@extends('auther.layout.master')
@section('container')
    <!-- Main Content -->
    <main class="main-content d-flex flex-column min-vh-100 w-100">

        <!-- Contents Section -->
        <section class="p-4 p-md-5 flex-grow-1">

            <!-- Controls Area: Filters -->
            <div
                class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3 bg-white p-3 rounded shadow-sm border">
                <h1 class="fs-4 fw-bold text-secondary mb-0"><i class="fas fa-layer-group text-purple me-2"></i> Content
                    Manager</h1>

                <div class="d-flex align-items-center">
                    <label for="filter-playlist" class="fw-bold text-dark me-2 text-nowrap"><i class="fas fa-filter"></i>
                        Playlist:</label>
                    <select id="filter-playlist" class="form-select border-secondary shadow-none cursor-pointer"
                        style="min-width: 180px;">
                        <option value="all" selected>All Playlists</option>
                        <option value="english">English Class</option>
                        <option value="japan">Japan</option>
                    </select>
                </div>
            </div>

            <!-- Content Grid -->
            <div class="row g-4" id="content-container">

                <!-- Box 1: Add New Content (Assignment Removed) -->
                <a href="{{ route('createContent#Page') }}" class="col-12 text-decoration-none">
                    <div class="col-12 col-md-6 col-lg-4 content-box" data-playlist="all">
                        <div class="card p-4 text-center border shadow-sm h-100 rounded-3 d-flex flex-column justify-content-center align-items-center bg-white"
                            style="min-height: 440px; border: 2px dashed #ccc !important;">
                            <i class="fas fa-plus-circle text-purple mb-3" style="font-size: 3.5rem;"></i>
                            <h3 class="fs-4 fw-medium text-dark mb-2">Create Content</h3>
                            <p class="text-muted small mb-4">Add a new lesson or Article(ဆောင်းပါး).</p>
                            {{-- <div class="d-flex flex-column gap-2 w-100">
                            <button class="btn bg-orange w-100"><i class="fas fa-video me-1"></i> Add Video</button>
                            <button class="btn btn-outline-primary w-100"><i class="fas fa-question-circle me-1"></i> Add Quiz</button>
                        </div> --}}
                        </div>
                    </div>
                </a>

                <!-- Box 2: Video Content -->
                @foreach ($content as $item)
                    <div class="col-12 col-md-6 col-lg-4 content-box" data-playlist="english">
                        <div class="card border shadow-sm h-100 rounded-3 overflow-hidden bg-white">
                            <div class="card-header bg-white border-bottom-0 d-flex justify-content-end py-2 row">

                                <div class="position-relative col-12 mt-3">
                                    <img src="{{ asset('content/' . $item->image) }}" class="card-img-top" alt="Content"
                                        style="height: 160px; object-fit: cover;">
                                </div>

                                <div class="card-body d-flex flex-column p-3">
                                    <span class="badge bg-secondary mb-2 align-self-start"><i
                                            class="fas fa-bars-staggered"></i>
                                        {{ $item->name }}</span>
                                    <h4 class="card-title fw-bold text-dark fs-5 mb-1">{{ $item->title }}</h4>
                                    <p class="card-text text-muted small mb-3 flex-grow-1">{{ Str::words($item->content,50,'.....') }}</p>

                                    <div class="d-flex gap-2 mt-auto">
                                        <a href="{{route('editContent#Page',$item->contentId)}}" class="btn bg-purple text-white flex-grow-1 btn-sm"><i
                                                class="fas fa-edit"></i> Edit</a>
                                        <a href="{{route('deleteContent#Process',[$item->contentId,$item->image])}}" class="btn btn-outline-danger btn-sm"><i
                                                class="fas fa-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <small>{{$content->links()}}</small>
        </section>

    </main>
@endsection
