@extends('user.layout.master')
@section('container')
    <main>
        <section class="sw-section">
            <div class="container-lg">
                <div class="row">
                    <div class="col-5">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="text-primary">Suggestion (Respect your opinions)</h5>
                            </div>
                            <div class="card-body">
                                <form action={{route('suggestion#Process')}} method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label text-dark fw-semibold">အကြံပေးလိုသည်များကို လွတ်လပ်စွာပြုလုပ်နိုင်ပါသည်</label>
                                        <input type="textarea" name="suggest"  class="form-control @error("suggest") is-invalid @enderror"  placeholder="Your Suggestions">
                                        @error('suggest')
                                            <small class='invalid-feedback'>{{$message}}</small>
                                        @enderror
                                    </div>

                                    <div>
                                        <input type="submit" value="Submit" class="btn btn-outline-primary mt-3">
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
