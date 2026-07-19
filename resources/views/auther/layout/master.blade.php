<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Admin Dashboard</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Bootstrap 5 CSS -->
    <link href="{{ asset('user/vendor1/cdn/cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css') }}"
        rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --author-bg: #f4f4f4;
            --author-surface: #ffffff;
            --author-border: #dee2e6;
            --author-text: #333333;
            --author-muted: #6c757d;
            --author-primary: #3f9fc8;
            --author-primary-hover: #2f86ad;
            --author-success: #1c8233;
            --author-success-hover: #156627;
            --author-soft: #e0e0e0;
            --author-primary-soft: #eaf6fb;
        }

        body {
            font-family: 'Nunito', sans-serif;
            background-color: var(--author-bg);
            color: var(--author-text);
        }

        /* Author Room colors */
        .text-purple {
            color: var(--author-primary) !important;
        }

        .bg-purple {
            background-color: var(--author-primary) !important;
            color: #fff;
        }

        .bg-purple:hover {
            background-color: var(--author-primary-hover) !important;
            color: #fff;
        }

        .bg-orange {
            background-color: var(--author-success) !important;
            color: #fff;
        }

        .bg-orange:hover {
            background-color: var(--author-success-hover) !important;
            color: #fff;
        }

        .sw-panel,
        .card,
        .modal-content {
            background: var(--author-surface);
            border: 1px solid var(--author-border);
            border-radius: 10px;
            box-shadow: 0 5px 16px rgba(51, 51, 51, 0.035);
        }

        .sw-panel {
            padding: 1.35rem;
        }

        .sw-muted,
        .text-muted {
            color: var(--author-muted) !important;
        }

        .border-dashed {
            border: 2px dashed var(--author-border) !important;
        }

        .btn-primary {
            --bs-btn-bg: var(--author-primary);
            --bs-btn-border-color: var(--author-primary);
            --bs-btn-hover-bg: var(--author-primary-hover);
            --bs-btn-hover-border-color: var(--author-primary-hover);
            --bs-btn-color: #fff;
        }

        .btn-outline-primary {
            --bs-btn-color: var(--author-primary);
            --bs-btn-border-color: var(--author-primary);
            --bs-btn-hover-bg: var(--author-primary);
            --bs-btn-hover-border-color: var(--author-primary);
            --bs-btn-active-bg: var(--author-primary-hover);
            --bs-btn-active-border-color: var(--author-primary-hover);
            --bs-btn-disabled-color: var(--author-muted);
            --bs-btn-disabled-border-color: var(--author-border);
        }

        .form-control,
        .form-select {
            background-color: var(--author-surface);
            border-color: var(--author-border);
            color: var(--author-text);
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--author-primary);
            box-shadow: 0 0 0 0.2rem rgba(63, 159, 200, 0.22);
        }

        /* Sidebar Control */
        .sidebar {
            width: 250px;
            z-index: 1045;
        }

        @media (min-width: 768px) {
            .main-content {
                margin-left: 250px;
                width: calc(100% - 250px);
            }
        }

        .nav-link-custom {
            transition: 0.3s;
        }

        .nav-link-custom:hover,
        .nav-link-custom.active {
            background-color: var(--author-bg);
            color: var(--author-text) !important;
        }

        .icon-btn {
            width: 40px;
            height: 40px;
            background-color: var(--author-bg);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 5px;
            color: var(--author-text);
            cursor: pointer;
            transition: 0.3s;
            border: none;
        }

        .icon-btn:hover {
            background-color: var(--author-soft);
        }

        .dashboard-icon {
            font-size: 3rem;
            color: var(--author-primary);
            opacity: 0.2;
            position: absolute;
            right: 20px;
            bottom: 20px;
        }
    </style>
</head>

<body class="d-flex">

    <!-- Sidebar -->
    <aside class="sidebar offcanvas-md offcanvas-start bg-white border-end position-fixed h-100" tabindex="-1"
        id="sidebarMenu">
        <div class="offcanvas-header d-md-none border-bottom">
            <h5 class="offcanvas-title fw-bold text-dark">Menu</h5>
            <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body d-flex flex-column p-0 overflow-auto h-100">
            <div class="p-4 text-center border-bottom w-100">
                <img src="{{ \App\Support\UploadedMedia::url('profile', Auth::user()->image, 'image/user-male-circle.jpg') }}"
                    alt="Profile" class="rounded-circle mb-3" style="width: 80px; height: 80px; object-fit: cover;">
                <h3 class="fs-5 fw-bold text-dark mb-1">{{ Auth::user()->name }}</h3>
                <span class="text-muted small d-block mb-3">{{ Auth::user()->role }}</span>
            </div>
            <nav class="nav flex-column py-3 w-100">
                <!-- Home is Active -->

                <a href="{{ route('userHome') }}"
                    class="nav-link text-secondary py-3 px-4 d-flex align-items-center nav-link-custom"><i
                        class="fas fa-home text-purple fs-5 me-3" style="width: 25px;"></i> home</a>
                <a href="{{ route('auther#Room') }}"
                    class="nav-link text-secondary py-3 px-4 d-flex align-items-center nav-link-custom"><i
                        class="fa-solid fa-chart-line text-purple me-3"></i> dashboard</a>
                {{-- <a href="{{route('playlist#Page')}}" class="nav-link text-secondary py-3 px-4 d-flex align-items-center nav-link-custom"><i class="fas fa-bars-staggered text-purple fs-5 me-3" style="width: 25px;"></i> playlists</a> --}}
                <a href="{{ route('autherContent#Page') }}"
                    class="nav-link text-secondary py-3 px-4 d-flex align-items-center nav-link-custom"><i
                        class="fas fa-graduation-cap text-purple fs-5 me-3" style="width: 25px;"></i> contents</a>
                <a href="{{ route('comment#Page') }}"
                    class="nav-link text-secondary py-3 px-4 d-flex align-items-center nav-link-custom"><i
                        class="fas fa-comment text-purple fs-5 me-3" style="width: 25px;"></i> comments</a>
            </nav>
        </div>
    </aside>

    @yield('container')
    @include('sweetalert2::index')

    <!-- Bootstrap JS -->
    <script src="{{ asset('user/vendor1/cdn/cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js') }}"></script>
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
    @stack('jq-section')

    {{-- Summie AI chat widget. Routes are guarded by auth middleware. --}}
    @include('ai-companion::widget')

</body>


</html>
