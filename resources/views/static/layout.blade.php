<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Phan Mee Eain')</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link href="{{ asset('user/vendor1/cdn/cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css') }}"
        rel="stylesheet">
    <style>
        body {
            font-family: Arial, "Noto Sans Myanmar", sans-serif;
            background: #f4f4f4;
            color: #333333;
        }

        .policy-shell {
            max-width: 920px;
            margin: 0 auto;
        }

        .policy-card {
            background: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            box-shadow: 0 10px 28px rgba(51, 51, 51, .08);
        }

        .btn-outline-primary {
            --bs-btn-color: #3f9fc8;
            --bs-btn-border-color: #3f9fc8;
            --bs-btn-hover-bg: #3f9fc8;
            --bs-btn-hover-border-color: #3f9fc8;
            --bs-btn-active-bg: #2f86ad;
            --bs-btn-active-border-color: #2f86ad;
        }

        .policy-content {
            line-height: 1.8;
            white-space: pre-line;
        }
    </style>
</head>

<body>
    <main class="container py-5">
        <div class="policy-shell">
            <a href="{{ url()->previous() }}" class="btn btn-outline-primary btn-sm mb-4">Back</a>
            <section class="policy-card p-4 p-md-5">
                @yield('content')
            </section>
        </div>
    </main>
</body>

</html>
