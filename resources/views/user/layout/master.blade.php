<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Phan Mee Eain</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link href="{{ asset('user/vendor1/fonts/spring-wisdom-fonts.css') }}" rel="stylesheet">
    <link href="{{ asset('user/vendor1/cdn/cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('user/vendor1/cdn/cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css') }}"
        rel="stylesheet">
    <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        .react-btn.active-react {
            background-color: #e7f1ff;
            border-color: #0d6efd;
        }

        .react-btn.active-react i {
            color: #0d6efd;
        }

        #imageModal .modal-content {
            background: transparent !important;
        }

        #imageModal .modal-backdrop {
            opacity: 0.9;
        }
    </style>

</head>

<body>
    @php
        $actingViewMode = session('acting_view_mode', Auth::user()->role === 'admin' ? 'admin' : Auth::user()->role);
        $canSeeAuthorRoom = Auth::user()->role === 'author' || $actingViewMode === 'author_readonly';
        $roleLabel = $actingViewMode === 'author_readonly'
            ? 'author (read-only)'
            : ($actingViewMode === 'user' && Auth::user()->role === 'admin'
                ? 'user'
                : Auth::user()->role);
    @endphp

    <nav class="navbar navbar-expand-lg sw-navbar sticky-top">
        <div class="container-lg">
            <a class="navbar-brand fw-bold" href="/home.php">Phan Mee Eain (Knowledge & Education)</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
                aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ route('userHome') }}">Home</a></li>
                    @if ($canSeeAuthorRoom)
                        <li class="nav-item"><a class="nav-link" href="{{ route('auther#Room') }}">Author Room</a></li>
                    @endif
                </ul>
                {{-- <div class="d-flex align-items-center gap-3">
                    <a class="btn btn-sw-primary btn-sm" href="{{ route('login') }}">Login & Register</a>
                </div> --}}

                <div class="dropdown">
                    <button class="btn btn-outline-primary dropdown-toggle ms-3" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false"> <i class="fa-solid fa-pen me-3"></i>
                        Edit
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li class="dropdown-header">
                            <div class="row">
                                <img class="sw-avatar col-4"
                                    src="{{ asset(Auth::user()->image == null ? 'image/user-male-circle.jpg' : '/profile/' . Auth::user()->image) }}"
                                    alt="Admin Scholar profile picture">
                                <div class="col-7 offset-1">
                                    <strong> Role - {{ $roleLabel }}</strong>
                                    <div class="small">{{ Auth::user()->email }}</div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item active" href="{{ route('profile#Page') }}"><i
                                    class="fa-solid fa-user me-3"></i> Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('edit#Page') }}"><i
                                    class="fa-solid fa-user-pen me-3"></i> Edit Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('ChPass#Page') }}"><i
                                    class="fa-solid fa-key me-3"></i> Manage Password</a></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('suggestion#Page') }}">
                                <i class="fa-regular fa-comment-dots me-3"></i> User Suggestion
                            </a>
                        </li>
                        @if (Auth::user()->role === 'user' || $actingViewMode === 'user')
                            <li><a class="dropdown-item" href="{{ route('promote#Page') }}"><i
                                        class="fa-solid fa-person-arrow-up-from-line me-3"></i> Request To Promote</a>
                            </li>
                        @endif
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <form action="{{ route('logout') }}" method="post"
                            class="d-flex align-items-center gap-3 ms-2 ">
                            @csrf
                            <button class="btn btn-outline-primary btn-sm col-12 ">
                                <i class="fa-solid fa-right-from-bracket me-3"></i> Logout
                            </button>
                        </form>
                    </ul>
                </div>

            </div>
        </div>
    </nav>
    @yield('container')
    @include('sweetalert2::index')

    {{-- image pointer --}}
    <div class="modal fade" id="imageModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-transparent border-0">
                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3"
                    data-bs-dismiss="modal" style="z-index: 1"></button>
                <img id="modalImage" src="" class="img-fluid rounded" alt="Full image">
            </div>
        </div>
    </div>



    <footer class="sw-footer mt-5">
        <div class="container-lg py-5">
            <div class="row g-4">
                <div class="col-lg-5">
                    <a class="footer-brand fw-bold" href="{{ route('userHome') }}">Phan Mee Eain Learning Hub</a>
                    <p class="small sw-muted mt-2 mb-3">A focused learning space for reading, writing, sharing, and responsible moderation.</p>
                    <div class="d-flex flex-wrap gap-2">
                        <a class="footer-icon-link" href="{{ route('adminHome') }}" aria-label="Open admin alerts"><i
                                class="bi bi-envelope"></i></a>
                        <a class="footer-icon-link" href="#guru-widget" data-guru-open aria-label="Open AI help center"><i
                                class="bi bi-chat-left-text"></i></a>
                    </div>
                </div>
                <div class="col-6 col-lg-2">
                    <h2 class="footer-heading">Explore</h2>
                    <ul class="footer-links">
                        <li><a href="{{ route('userHome') }}">Home</a></li>
                        <li><a href="{{ route('content#Page') }}">Browse Contents</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2">
                    <h2 class="footer-heading">Support</h2>
                    <ul class="footer-links">
                        <li><a href="{{ route('reportPolicy') }}">Report Policy</a></li>
                        <li><a href="{{ route('authorGuidelines') }}">Author Guidelines</a></li>
                        <li><a href="#guru-widget" data-guru-open>Help Center</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h2 class="footer-heading">Contact</h2>
                    <address class="small sw-muted mb-0" id="contact">
                        Phan Mee Eain Learning Hub<br>
                        www.gurus.com<br>
                        Email: support@gurus.com
                    </address>
                </div>
            </div>
            <div class="footer-bottom d-flex flex-column flex-md-row justify-content-between gap-2 mt-4 pt-4">
                <p class="small sw-muted mb-0">&copy; Phan Mee Eain 2026</p>
                <div class="d-flex flex-wrap gap-3 small">
                    <span>Privacy Policy</span>
                    <span>Terms of Use</span>
                    <span>Accessibility</span>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('user/vendor1/cdn/cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js') }}">
    </script>
    <script src="{{ asset('user/js/main.js') }}"></script>
    <script src="{{ asset('user/js/static-router.js') }}"></script>
    @stack('jq-section')

    {{-- Summie AI chat widget. Routes are guarded by auth middleware. --}}
    @include('ai-companion::widget')
</body>


<script>
    function loadfile(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('output');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

</html>
