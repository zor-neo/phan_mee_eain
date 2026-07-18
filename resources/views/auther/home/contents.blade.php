@extends('auther.layout.master')
@section('container')
    <main class="main-content d-flex flex-column min-vh-100 w-100">
        <section class="p-4 p-md-5 flex-grow-1">
            <a href="{{ route('createContent#Page') }}" class="text-decoration-none d-block" aria-label="Create new content">
                <div class="sw-author-create-zone mb-4">
                    <div class="row g-0 align-items-stretch">
                        <div class="col-lg-4">
                            <div class="sw-panel h-100 border-dashed d-flex flex-column justify-content-center text-center">
                                <i class="fas fa-plus-circle text-purple mb-3" style="font-size: 3.5rem;"></i>
                                <h3 class="fs-4 fw-medium text-dark mb-2">Create Content</h3>
                                <p class="text-muted small mb-0">Add a new lesson or Article(Saung Par).</p>
                            </div>
                        </div>
                        <div class="col-lg-8 d-none d-lg-block">
                            <div class="sw-panel h-100 d-flex align-items-center justify-content-center text-center">
                                <div>
                                    <h2 class="h4 fw-bold mb-2">Write, upload, and publish from here</h2>
                                    <p class="sw-muted mb-0">Use this area or the card to start a new author post.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>

            <div class="row g-4" id="content-container">
                @foreach ($content as $item)
                    <div class="col-12 col-md-6 col-lg-4 content-box" data-playlist="english">
                        <div class="card border shadow-sm h-100 rounded-3 overflow-hidden bg-white">
                            <div class="position-relative">
                                <img src="{{ asset($item->image ? 'content/' . $item->image : 'content/image/logo.jpg') }}" class="card-img-top sw-content-image" alt="Content">
                            </div>
                            <div class="card-body d-flex flex-column p-3">
                                <span class="badge bg-secondary mb-2 align-self-start"><i class="fas fa-bars-staggered"></i> {{ $item->name }}</span>
                                <h4 class="card-title fw-bold text-dark fs-5 mb-1">{{ $item->title }}</h4>
                                <p class="card-text text-muted small mb-3 flex-grow-1">{{ Str::words($item->content, 50, '.....') }}</p>
                                <div class="d-flex flex-wrap gap-2 mt-auto">
                                    <a href="{{ route('editContent#Page', $item->contentId) }}" class="btn bg-purple text-white flex-grow-1 btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                    <form action="{{ $item->image ? route('deleteContent#Process', [$item->contentId, $item->image]) : route('deleteContent#Process', [$item->contentId]) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Delete this content?')"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-4">
                {{ $content->links() }}
            </div>
        </section>
    </main>
@endsection
