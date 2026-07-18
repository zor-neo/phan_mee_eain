@extends('user.layout.master')
@section('container')
    <main>
        <section class="sw-section">
            <div class="container-lg">
                <div class="row">
                    <div class="col-5">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="text-primary">Update Password</h3>
                            </div>
                            <div class="card-body">
                                <form action={{route('ChPass#Process')}} method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label text-dark fw-semibold">Old password</label>
                                        <input type="password" name="oldPassword"  class="form-control @error("oldPassword") is-invalid @enderror"  placeholder="password">
                                        @error('oldPassword')
                                            <small class='invalid-feedback'>{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label text-dark fw-semibold">New password</label>
                                        <input type="password" name="newPassword" class="form-control  @error("newPassword") is-invalid @enderror"  placeholder="new password">
                                        @error('newPassword')
                                            <small class='invalid-feedback'>{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label text-dark fw-semibold">Confirm password</label>
                                        <input type="password" name="confirmPassword"  class="form-control @error("confirmPassword") is-invalid @enderror"  placeholder="confrim password">
                                        @error('confirmPassword')
                                            <small class='invalid-feedback'>{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div>
                                        <input type="submit" value="Update" class="btn btn-outline-primary mt-3">
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
