<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard - Spring Wisdom</title>
    <link href="{{ asset('user/vendor1/fonts/spring-wisdom-fonts.css') }}" rel="stylesheet">
    <link href="{{ asset('user/vendor1/cdn/cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('user/vendor1/cdn/cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css') }}"
        rel="stylesheet">
    <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <nav class="navbar navbar-expand-lg sw-navbar sticky-top">
        <div class="container-lg">
            <a class="navbar-brand fw-bold" href="/home.php">Spring Wisdom</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
                aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item"><a class="nav-link active" href="/admin-dashboard.php">Dashboard</a></li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " href="#" role="button"
                            data-bs-toggle="dropdown">Role Switch</a>
                        <ul class="dropdown-menu">

                            <li>
                                {{-- <form method="post" action="#">
                                    @csrf
                                    <input type="hidden" name="csrf_token"
                                        value="1b5f0d486cf4f4d643150d9c2c3f4efb5b303920675ae33fd6b42e63bbe32a96"> <input
                                        type="hidden" name="role" value="author">
                                    <button class="dropdown-item" type="submit">Sign in as Author</button>
                                </form> --}}
                                <a class="droupdown-item ms-3" class="text-decoration-none" href="{{route('switch#Process')}}">Sign in as author</a>
                            </li>

                        </ul>
                    </li>
                </ul>
                <div class="d-flex align-items-center gap-3">
                    <span class="badge rounded-pill text-bg-light border text-secondary"> Role - {{Auth::user()->role}}</span>
                    <div class="dropdown">
                        <button class="btn btn-icon" data-bs-toggle="dropdown" aria-label="Account menu" style="width: 60px; height:60px; ">
                            <img class="sw-avatar" src="{{asset(Auth::user()->image == null ? 'image/user-male-circle.jpg' : '/profile/'.Auth::user()->image)}}"
                                alt="Admin Scholar profile picture">
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                            <li class="dropdown-header">
                                <strong>{{Auth::user()->role}}</strong>
                                <div class="small">{{Auth::user()->email}}</div>
                        </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{route('adminProfile#Page')}}"> <i class="fa-solid fa-user me-3"></i>Profile</a></li>

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
        </div>
    </nav>
    <main>
        <div class="admin-shell container-lg">
            <button class="btn btn-outline-sw mb-3" type="button" data-bs-toggle="collapse"
                data-bs-target="#adminSidebar" aria-expanded="true" aria-controls="adminSidebar">
                <i class="bi bi-layout-sidebar me-2"></i>Admin Menu
            </button>
            <div class="row g-4 align-items-start">
                <aside class="col-lg-3 collapse show" id="adminSidebar">
                    <div class="admin-sidebar-card">
                        <div class="mb-3 px-2">
                            <strong class="d-block">Admin Portal</strong>
                            <span class="small sw-muted">Spring Wisdom Management</span>
                        </div>
                        <nav class="nav flex-column gap-1">
                            <a class="nav-link" href="{{route('adminHome')}}">
                                <i class="bi bi-speedometer2 me-2"></i>Overview </a>
                            <a class="nav-link " href="{{route('allUserPage')}}">
                                <i class="bi bi-people me-2"></i>Users Accounts </a>
                            <a class="nav-link " href="{{route('allAuthorPage')}}">
                                <i class="bi bi-person-badge me-2"></i>Authors Accounts </a>
                            <a class="nav-link " href="{{route('category#Page')}}">
                                <i class="fa-solid fa-table-list me-2"></i>Categories </a>
                            <a class="nav-link " href="{{route('allReportPage')}}">
                                <i class="bi bi-flag me-2"></i>Reports </a>
                            <a class="nav-link " href="{{route('allSuggestPage')}}">
                                <i class="bi bi-envelope me-2"></i>User Suggestion </a>
                            <a class="nav-link " href="{{route('requestToPromoPage')}}">
                                <i class="bi bi-person-plus me-2"></i>User Requests <br> <small class="ms-4">Promote to Auther</small> </a>
                            <a class="nav-link " href="#">
                                <i class="bi bi-rss me-2"></i>Create Admin Feed </a>
                        </nav>
                    </div>
                </aside>
                @yield('container')
                @include('sweetalert2::index')
            </div>
        </div>
    </main>
    <footer class="sw-footer mt-5">
        <div class="container-lg py-5">
            <div class="row g-4">
                <div class="col-lg-5">
                    <a class="footer-brand fw-bold" href="/home.php">Spring Wisdom</a>
                    <p class="small sw-muted mt-2 mb-3">Preserving knowledge for focused digital learning through
                        curated readings, author contributions, and responsible moderation.</p>
                    <div class="d-flex flex-wrap gap-2">
                        <a class="footer-icon-link" href="/contact.php" aria-label="Contact Spring Wisdom"><i
                                class="bi bi-envelope"></i></a>
                        <a class="footer-icon-link" href="/help-center.php" aria-label="Help Center"><i
                                class="bi bi-chat-left-text"></i></a>
                        <a class="footer-icon-link" href="/admin-feed.php" aria-label="Platform updates"><i
                                class="bi bi-megaphone"></i></a>
                    </div>
                </div>
                <div class="col-6 col-lg-2">
                    <h2 class="footer-heading">Explore</h2>
                    <ul class="footer-links">
                        <li><a href="/home.php">Home</a></li>
                        <li><a href="/browse.php">Browse</a></li>
                        <li><a href="/archives.php">All Archives</a></li>
                        <li><a href="/admin-feed.php">Updates</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2">
                    <h2 class="footer-heading">Support</h2>
                    <ul class="footer-links">
                        <li><a href="/contact.php">Contact Us</a></li>
                        <li><a href="/report-policy.php">Report Policy</a></li>
                        <li><a href="/author-guidelines.php">Author Guidelines</a></li>
                        <li><a href="/help-center.php">Help Center</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h2 class="footer-heading">Contact</h2>
                    <address class="small sw-muted mb-0" id="contact">
                        Spring Wisdom Learning Portal<br>
                        Student Final Project Demo<br>
                        Email: <a href="mailto:contact@springwisdom.test">contact@springwisdom.test</a>
                    </address>
                </div>
            </div>
            <div class="footer-bottom d-flex flex-column flex-md-row justify-content-between gap-2 mt-4 pt-4">
                <p class="small sw-muted mb-0">&copy; 2026 Spring Wisdom. All rights reserved.</p>
                <div class="d-flex flex-wrap gap-3 small">
                    <a href="/privacy-policy.php">Privacy Policy</a>
                    <a href="/terms.php">Terms of Use</a>
                    <a href="/accessibility.php">Accessibility</a>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <script src="{{ asset('user/verdor1/cdn/cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js') }}">
    </script>
    <script src="{{ asset('user/js/main.js') }}"></script>
    <script src="{{ asset('user/js/static-router.js') }}"></script>
</body>

</html>
