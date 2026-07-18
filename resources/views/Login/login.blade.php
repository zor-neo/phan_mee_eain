<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Phan Mee Ein</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet" />

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Nunito", sans-serif;
            background: #022c74;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .main-container {
            width: 100%;
            max-width: 1150px;
            background: #1e293b;
            border-radius: 24px;
            overflow: hidden;
            display: flex;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.25);
        }

        /* LEFT SIDE */

        .left-side {
            width: 50%;
            background:
                linear-gradient(rgba(118, 185, 216, 0.5), rgba(15, 23, 42, 0.78)),
                url("https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=1200&auto=format&fit=crop");

            background-size: cover;
            background-position: center;

            padding: 45px;
            color: white;

            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .logo {
            font-size: 32px;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .back-btn {
            background: rgba(118, 185, 216, 0.18);
            color: white;
            text-decoration: none;
            padding: 10px 18px;
            border-radius: 30px;
            font-size: 14px;
            transition: 0.3s;
        }

        .back-btn:hover {
            background: rgba(118, 185, 216, 0.32);
            color: white;
        }

        .welcome-text h1 {
            font-size: 48px;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 25px;
        }

        .welcome-text p {
            font-size: 16px;
            line-height: 1.8;
            color: #e2e8f0;
            max-width: 450px;
        }

        .learning-tags {
            margin-top: 30px;
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .learning-tags span {
            background: rgba(255, 255, 255, 0.15);
            padding: 10px 16px;
            border-radius: 30px;
            font-size: 14px;
            backdrop-filter: blur(10px);
        }

        .dots {
            margin-top: 35px;
        }

        .dots span {
            display: inline-block;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.4);
            margin-right: 8px;
        }

        .dots span.active {
            width: 32px;
            border-radius: 20px;
            background: white;
        }

        /* RIGHT SIDE */

        .right-side {
            width: 50%;
            background: #1f2937;
            padding: 60px;
            color: white;
        }

        .right-side h2 {
            font-size: 52px;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .login-text {
            color: #cbd5e1;
            margin-bottom: 35px;
        }

        .login-text a {
            color: #76b9d8;
            text-decoration: none;
            font-weight: 700;
        }

        .form-control {
            height: 58px;
            background: #334155;
            border: 1px solid #475569;
            border-radius: 12px;
            color: white;
            padding-left: 18px;
            margin-bottom: 18px;
        }

        .form-control::placeholder {
            color: #cbd5e1;
        }

        .form-control:focus {
            background: #334155;
            border: 1px solid #76b9d8;
            box-shadow: none;
            color: white;
        }

        .form-check-label {
            color: #cbd5e1;
            font-size: 14px;
        }

        .create-btn {
            width: 100%;
            height: 58px;
            border: none;
            border-radius: 12px;
            background: #76b9d8;
            color: white;
            font-weight: 700;
            font-size: 16px;
            transition: 0.3s;
            margin-top: 10px;
        }

        .create-btn:hover {
            background: #5aa9cd;
        }

        .divider {
            text-align: center;
            color: #94a3b8;
            margin: 30px 0;
            position: relative;
        }

        .divider::before,
        .divider::after {
            content: "";
            position: absolute;
            top: 50%;
            width: 35%;
            height: 1px;
            background: #475569;
        }

        .divider::before {
            left: 0;
        }

        .divider::after {
            right: 0;
        }

        .social-buttons {
            display: flex;
            gap: 15px;
        }

        .social-btn {
            flex: 1;
            height: 55px;
            border-radius: 12px;
            border: 1px solid #475569;
            background: transparent;
            color: white;
            font-weight: 600;
            transition: 0.3s;
        }

        .social-btn:hover {
            background: #334155;
        }

        .social-btn i {
            margin-right: 8px;
        }

        /* RESPONSIVE */

        @media (max-width: 992px) {
            .main-container {
                flex-direction: column;
            }

            .left-side,
            .right-side {
                width: 100%;
            }

            .right-side {
                padding: 40px 30px;
            }

            .welcome-text h1 {
                font-size: 38px;
            }

            .right-side h2 {
                font-size: 40px;
            }

            .social-buttons {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <div class="main-container">
        <!-- LEFT SIDE -->

        <div class="left-side">
            <div class="d-flex align-items-center" style="margin-bottom:85px">
                <div class="logo">Phan Mee Ein (ဖန်မီးအိမ်) </div>
            </div>

            <div class="welcome-text mt-5">
                <div>
                    <h1>
                        Welcome to <br />
                        Phan Mee Ein <br />
                        Learning Portal
                    </h1>

                    <p>
                        Start your educational journey with modern digital learning,
                        interactive resources, and knowledge sharing designed for
                        students, educators, and lifelong learners.
                    </p>

                    <div class="learning-tags">
                        <span>Interactive Learning</span>
                        <span>Digital Resources</span>
                        <span>Student Friendly</span>
                    </div>

                    <div class="dots">
                        <span></span>
                        <span></span>
                        <span class="active"></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- RIGHT SIDE -->

        <div class="right-side">
            <h2 class="mb-5">Login</h2>

            <form action="{{ route('login') }}" method="POST">
                @csrf

                <input type="text" name='email' class="form-control" placeholder="Email"
                    value="{{ old('email') }}">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

                <input type="password" name="password" class="form-control" placeholder="Password" autocomplete="current-password">
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

                <button type="submit" class="create-btn">Login</button>
            </form>

            {{-- <div class="divider">Or register with</div> --}}

            <p class="login-text mt-5">
                Create account?
                <a href="{{ route('register') }}">Register</a>
            </p>

        </div>
    </div>
</body>

</html>
