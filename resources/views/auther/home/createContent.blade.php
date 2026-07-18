@extends('auther.layout.master')
@section('container')
    <main class=" mt-5 main-content d-flex flex-column min-vh-100 w-100">
        <div class="container-lg">
            <form action="{{ route('createContent#Process') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                        <div class="col-3">

                            <img class="img-profile img-thumbnail" id="output"
                                src="{{ asset('content/image/logo.jpg') }}">
                                {{-- Auth::user()->image == null ? 'content/image/book.jpg' : 'profile/' . Auth::user()->image --}}


                            <input type="file" name="image" id=""
                                class="form-control mt-1 @error('image') is-invalied @enderror" onchange="loadfile(event)">
                            @error('image')
                                <small class="invalid-feedbadk text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label fw-bold">
                                            Title</label>
                                        <input type="text" name="title"
                                            class="form-control @error('name') is-invalied @enderror " placeholder="Name..."
                                            value="{{ old('title')}}">
                                        @error('title')
                                            <small class="invalid-feedbadk text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label fw-bold">
                                            Choice category</label> <br>
                                        <select name="category" id="" class="form-control">
                                            <option value="">Choice category.....</option>
                                            @foreach ($data as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                            <small class="invalid-feedbadk text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label fw-bold">
                                            Select one object</label> <br>
                                        Education : <input type="radio" name="object[]" id="" value="edu"> <br>
                                        Artical : <input type="radio" name="object[]" id="" value="kno">
                                        @error('object')
                                            <small class="invalid-feedbadk text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label fw-bold">
                                            Youtube link <small class="text-danger">*Can Ignore</small></label>
                                        <input type="text" name="link"
                                            class="form-control @error('address') is-invalied @enderror"
                                            value="{{ old('link') }}"
                                            placeholder="link...">
                                        @error('link')
                                            <small class="invalid-feedbadk text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label fw-bold">
                                            Content</label>
                                        <textarea name="content" id="" cols="30" rows="10" class="form-control @error('address') is-invalied @enderror"
                                            value="{{ old('content') }}" placeholder="content..."></textarea>
                                        {{-- <input type="textarea" name="content"
                                            class="form-control @error('address') is-invalied @enderror"
                                            value="{{ old('content') }}" placeholder="content..." style=""> --}}
                                        @error('content')
                                            <small class="invalid-feedbadk text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <input type="submit" value="Create" class="btn btn-primary mt-3">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
