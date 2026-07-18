@extends('user.layout.master')
@section('container')
    <main>
        <section class="sw-section">
            <div class="container-lg">
                <div class="row align-items-center g-5">
                    <div class="card" style="width: 40rem">
                        <img src="{{ \App\Support\UploadedMedia::url('profile', Auth::user()->image, 'image/user-male-circle.jpg') }}" class="card-img-top m-5 w-50 d-block items-center " alt="..." style="height: 300px" >
                        <div class="card-body">
                            <h5 class="card-title">{{Auth::user()->name}}</h5>
                            <p class="card-text"><i class="fa-solid fa-quote-left"></i>  {{Auth::user()->bio}}<i class="fa-solid fa-quote-right"></i> </p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><i class="fa-solid fa-phone me-3"></i> {{Auth::user()->phone}}</li>
                            <li class="list-group-item"><i class="fa-regular fa-envelope me-3"></i> {{Auth::user()->email}}</li>
                            <li class="list-group-item"><i class="fa-solid fa-map-location-dot me-3"></i> {{Auth::user()->address}}</li>
                        </ul>
                        <div class="card-body">
                            <a href="#" class="card-link"><i class="fa-brands fa-facebook-f me-1"></i>Facebook</a>
                            <a href="#" class="card-link"><i class="fa-brands fa-instagram me-1"></i>Instagram</a>
                        </div>
                    </div>
                </div>
            </div>

        </section>


    </main>
@endsection
