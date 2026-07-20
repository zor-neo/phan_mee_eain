@extends('user.layout.master')
@section('container')
    <main>
        <section class="sw-section">
            <div class="container-lg">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6">
                        <h4 class="fw-bold mb-4">"ဖန်မီးအိမ်"လေးရဲ့အလင်းအားဖြင့် အမှောင်ကိုလည်းခွင်းစေ၊ အလင်းကိုလည်းရစေ။</h4>
                        <p class="lead sw-muted">
                            <span class="d-inline-block fst-italic fs-4 fw-semibold text-dark border-start border-3 ps-3">
                                &ldquo;Breakthroughs are rarely easy; they are often born in struggle, much like the sun breaking through a dense morning fog.&rdquo;
                            </span>
                            <span class="text-primary fw-bold">Phan Mee Eain(ဖန်မီးအိမ်)</span>
                            ဆိုတဲ့ ကျွန်ုပ်တို့ရဲ့ ခိုလှုံရာလေးဟာ စဉ်ဆက်မပြတ် ဆက်လက်လေ့လာလို၊ သင်ကြားလို၊ မေတ္တာဖြင့်သင်ကြားပို့ချလိုကြသော ကျွန်ုပ်တို့ပြည်သူများအတွက် တစ်စုံတစ်ရာသော အကျိုးဖြစ်စေရန်အဖို့ငှာ "ဖန်မီးအိမ်"ကိုရည်ရွယ်ဖန်တီးခဲ့ပါသည်။ လေ့လာသင်ကြားရေးအတွက် လိုအပ်သောအရင်းအမြစ်များအား တစုတစည်းတည်း ဖြစ်စေရန် ကူညီခြင်းဖြင့် လေ့လာ၊သင်ကြား၊ပို့ချနေကြသောသူများအား မေတ္တာများနှင့်အတူ "ဖန်မီးအိမ်"မှ အမြဲအသင့်ရှိနေပါမည်။</p>
                        <a class="btn btn-outline-primary mt-3" href="{{route('content#Page')}}">Browse Contents</a>
                    </div>
                    <div class="col-lg-6">
                        <div class="sw-visual"><img src="{{ asset('user/images/featured_img-1600.webp') }}"
                                width="1600" height="838" alt="Illustration of children learning in a difficult environment"></div>
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
                    {{-- <div class="">
                        <a href="{{route('content#Page')}}" class="fw-semibold text-2xl btn btn-outline-primary btn-sm"><i class="fa-solid fa-book-open-reader me-3"></i>  Read all Contents <i class="bi bi-arrow-right"></i></a>
                    </div> --}}


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
@endsection
