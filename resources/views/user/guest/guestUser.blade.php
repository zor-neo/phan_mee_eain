<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Phan Mee Ein</title>
    <link href="{{ asset('user/vendor1/fonts/spring-wisdom-fonts.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="{{ asset('user/vendor1/cdn/cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css') }}.."
        rel="stylesheet">
    <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg sw-navbar sticky-top">
        <div class="container-lg">
            <a class="navbar-brand fw-bold" href="#">Pann Mee Eain (Knowledge & Education)</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
                aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                </ul>
                <div class="d-flex align-items-center gap-3">
                    <a class="btn btn-outline-primary btn-sm" href="{{ route('login') }}">Login & Register</a>
                </div>

            </div>
        </div>
    </nav>
    <main>
        <section class="sw-section">
            <div class="container-lg">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6">
                        <h4 class="fw-bold mb-4">"ဖန်မီးအိမ်"လေးရဲ့အလင်းအားဖြင့် အမှောင်ကိုလည်းခွင်းစေ၊ အလင်းကိုလည်းရစေ။</h4>
                        <p class="lead sw-muted">
                            <span class="d-inline-block fst-italic fs-4 fw-semibold text-dark border-start border-3 ps-3">
                                &ldquo;Breakthroughs are rarely easy; they are often born in struggle,uch like the sun breaking through a dense morning fog.&rdquo;
                            </span>
                            <span class="text-primary fw-bold">Phan Mee Eain(ဖန်မီးအိမ်)</span>
                            ဆိုတဲ့ ကျွန်ုပ်တို့ရဲ့ ခိုလုံရာလေးဟာ စဉ်ဆက်မပြတ် ဆက်လက်လေ့လာလို၊ သင်ကြားလို၊ မေတ္တာဖြင့်သင်ကြားပို့ချလိုကြသော ကျွန်ုပ်တို့ပြည်သူများအတွက် တစ်စုံတစ်ရာသော အကျိုးဖြစ်စေရန်အဖို့ငှာ "ဖန်မီးအိမ်"ကိုရည်ရွယ်ဖန်တီးခဲ့ပါသည်။ လေ့လာသင်ကြားရေးအတွက် လိုအပ်သောအရင်းအမြစ်များအား တစုတစည်းတည်း ဖြစ်စေရန် ကူညီခြင်းဖြင့် လေ့လာ၊သင်ကြား၊ပို့ချနေကြသောသူများအား မေတ္တာများနှင့်အတူ "ဖန်မီးအိမ်"မှ အမြဲအသင့်ရှိနေပါမည်။</p>
                        <a class="btn btn-outline-primary mt-3" href="{{route('login')}}">Browse Contents</a>
                    </div>
                    <div class="col-lg-6">
                        <div class="sw-visual"><img src="{{ asset('user/images/featured_img.png') }}"
                                alt="Illustration of children learning in a difficult environment"></div>
                    </div>
                </div>
            </div>

        </section>

        <section class="sw-section sw-soft border-top border-bottom">
            <div class="container-lg">
                <div class="d-flex justify-content-between align-items-end mb-4">
                    <div>
                        <span class="badge sw-badge mb-2">Admin Feed</span>
                        <h2 class="h3 fw-bold mb-0">Administrative Updates</h2>
                    </div >
                    <div class="">
                        <a href="{{route('login')}}" class="fw-semibold text-2xl btn btn-outline-primary btn-sm">Read all Contents <i class="bi bi-arrow-right"></i></a>
                    </div>


                </div>
                <div class="row g-4">
                    <div class="col-md-4">
                        <article class="card h-100">
                            <div class="card-body">
                                <time class="small text-muted">2026-05-12 16:27:00.795672+00</time>
                                <h3 class="h5 mt-3">Alert security</h3>
                                <p class="sw-muted">The account passwords should be changed every 90 days to prevent any
                                    security breach. Please regard this highly as a best practice whether your asset is
                                    valuable or not in particular platform.</p>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="sw-footer mt-5">
        <div class="container-lg py-5">
            <div class="row g-4">
                <div class="col-lg-5">
                    <a class="footer-brand fw-bold" href="/home.php">Spring Wisdom</a>
                    <p class="small sw-muted mt-2 mb-3">Preserving knowledge for focused digital learning through
                        curated readings, author contributions, and responsible moderation.</p>
                    <div class="d-flex flex-wrap gap-2">
                        <a class="footer-icon-link" href="#" aria-label="Contact Spring Wisdom"><i
                                class="bi bi-envelope"></i></a>
                        <a class="footer-icon-link" href="#" aria-label="Help Center"><i
                                class="bi bi-chat-left-text"></i></a>
                        <a class="footer-icon-link" href="#" aria-label="Platform updates"><i
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
    <script src="{{ asset('user/js/main.js') }}"></script>
    <script src="{{ asset('user/js/static-router.js') }}"></script>
</body>

</html>
