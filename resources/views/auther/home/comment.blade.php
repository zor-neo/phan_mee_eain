@extends('auther.layout.master')
@section('container')
    <!-- Main Content -->
    <main class="main-content d-flex flex-column min-vh-100 w-100">

        <!-- Comments Section -->
        <section class="p-4 p-md-5 flex-grow-1">

            <!-- Page Title -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3 bg-white p-3 rounded shadow-sm border">
                <h1 class="fs-4 fw-bold text-secondary mb-0"><i class="fas fa-comments text-purple me-2"></i> User Comments</h1>
                <form action="{{ route('comment.markSeen') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-outline-primary btn-sm">Mark all as seen</button>
                </form>
            </div>

            <div class="row">
                <div class="col-12 col-lg-10 col-xl-8">
                    @foreach ($comments as $item)
                        <!-- Comment 1: Needs Reply -->
                        <div class="card border shadow-sm mb-4 bg-white rounded-3">
                            <div class="card-body p-4">
                                <!-- User Info -->
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="{{ \App\Support\UploadedMedia::url('profile', $item->image, 'image/user-male-circle.jpg') }}" class="rounded-circle bg-light border me-3" width="50" height="50" alt="Student">
                                        <div>
                                            <h5 class="mb-0 fw-bold text-dark fs-5">{{$item->name}}</h5>
                                            <span class="text-muted small"><i class="fas fa-clock me-1"></i>{{$item->created_at->diffForHumans()}}</span>
                                        </div>
                                    </div>
                                    <span class="badge bg-secondary"><i class="fas fa-video me-1"></i>{{$item->categoryName}}</span>
                                </div>

                                <!-- Comment Text -->
                                <p class="mb-1 fw-bold text-dark small">{{$item->title}}</p>
                                <p class="text-secondary mb-3">{{$item->comment}}</p>

                                <!-- Action Buttons -->
                                {{-- <div class="d-flex gap-2">
                                    <button class="btn btn-outline-primary btn-sm px-3" onclick="toggleReplyForm(this)"><i class="fas fa-reply me-1"></i> Reply</button>
                                    <button class="btn btn-outline-danger btn-sm px-3"><i class="fas fa-trash me-1"></i> Delete</button>
                                </div> --}}

                                <!-- Reply Input Form (Hidden by Default) -->
                                {{-- <div class="reply-form mt-3 d-none">
                                    <textarea class="form-control mb-2 shadow-none border-primary" rows="3" placeholder="Write your reply to Aung Aung..."></textarea>
                                    <div class="d-flex gap-2">
                                        <button class="btn bg-purple text-white btn-sm px-4">Send Reply</button>
                                        <button class="btn btn-light btn-sm px-3" onclick="toggleReplyForm(this.parentElement.parentElement)">Cancel</button>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection
