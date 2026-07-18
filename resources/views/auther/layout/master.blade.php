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
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f4f4f4;
        }

        /* User Custom Colors */
        .text-purple {
            color: #76b9d8 !important;
        }

        .bg-purple {
            background-color: #76b9d8 !important;
            color: #fff;
        }

        .bg-purple:hover {
            background-color: #4db4e3 !important;
            color: #fff;
        }

        .bg-orange {
            background-color: #1c8233 !important;
            color: #fff;
        }

        .bg-orange:hover {
            background-color: #156627 !important;
            color: #fff;
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
            background-color: #f4f4f4;
            color: #333 !important;
        }

        .icon-btn {
            width: 40px;
            height: 40px;
            background-color: #f4f4f4;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 5px;
            color: #333;
            cursor: pointer;
            transition: 0.3s;
            border: none;
        }

        .icon-btn:hover {
            background-color: #e0e0e0;
        }

        .dashboard-icon {
            font-size: 3rem;
            color: #76b9d8;
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
                <img src="{{ asset(Auth::user()->image == null ? 'image/user-male-circle.jpg' : '/profile/' . Auth::user()->image) }}"
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
