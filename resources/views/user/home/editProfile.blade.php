@extends('user.layout.master')
@section('container')
    <section class="sw-section">
        <div class="container-lg">
            <form action="{{ route('edit#Process') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">

                            <img class="img-profile img-thumbnail" id="output"
                                src="{{ asset(Auth::user()->image == null? 'image/user-male-circle.jpg': 'profile/'.Auth::user()->image) }}">


                            <input type="file" name="image" id=""
                                class="form-control mt-1 @error('image') is-invalied @enderror" onchange="loadfile(event)">
                            @error('image')
                                <small class="invalid-feedbadk text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col">
                            @if(Auth::user()->email != 'superadmin@gmail.com' && Auth::user()->name != 'SuperAdmin' )
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">
                                                Name</label>
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalied @enderror " placeholder="Name..."
                                                value="{{ old('name', Auth::user()->name = !null ? Auth::user()->name : Auth::user()->nickname) }}">
                                            @error('name')
                                                <small class="invalid-feedbadk text-danger">{{ $message }}</small>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">
                                                Email</label>
                                            <input type="text" name="email"
                                                class="form-control @error('email') is-invalied @enderror "
                                                value="{{ old('email', Auth::user()->email) }}" placeholder="Email...">
                                            @error('email')
                                                <small class="invalid-feedbadk text-danger">{{ $message }}</small>
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">
                                            Phone</label>
                                        <input type="text" name="phone"
                                            class="form-control @error('phone') is-invalied @enderror"
                                            value="{{ old('phone', Auth::user()->phone) }}" placeholder="09xxxxxx">
                                        @error('phone')
                                            <small class="invalid-feedbadk text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">
                                            Address</label>
                                        <input type="text" name="address"
                                            class="form-control @error('address') is-invalied @enderror"
                                            value="{{ old('address', Auth::user()->address) }}" placeholder="Address">
                                        @error('address')
                                            <small class="invalid-feedbadk text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">
                                            Facebook <small class="text-danger">*Can Ignore</small></label>
                                        <input type="text" name="facebook"
                                            class="form-control @error('address') is-invalied @enderror"
                                            value="{{ old('facebook', Auth::user()->facebook_link) }}" placeholder="link...">
                                        @error('facebook')
                                            <small class="invalid-feedbadk text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">
                                            Instragram <small class="text-danger">*Can Ignore</small></label>
                                        <input type="text" name="instagaram"
                                            class="form-control @error('address') is-invalied @enderror"
                                            value="{{ old('instagaram', Auth::user()->instagaram_link) }}" placeholder="link...">
                                        @error('instagaram')
                                            <small class="invalid-feedbadk text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">
                                            Your Status</label>
                                        <input type="text" name="status"
                                            class="form-control @error('address') is-invalied @enderror"
                                            value="{{ old('status', Auth::user()->bio) }}" placeholder="Status">
                                        @error('status')
                                            <small class="invalid-feedbadk text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <input type="submit" value="Update" class="btn btn-primary mt-3">
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </section>
@endsection
