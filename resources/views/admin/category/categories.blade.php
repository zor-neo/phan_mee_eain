@extends('admin.layout.master')
@section('container')
    <div class="col-8 admin-content ms-5 ">
        <main>
            <div class="row">
                <div class="col-4 card " style="height: 190px">
                    <form action="{{route('create#Process')}}" method="post" class="mt-3">
                        @csrf
                        <label for="" class="fw-bold fs-4 mb-3 text-center">Create Category</label>
                        <input type="text" name="name" id="" class=" form-control rounded rounded-1"> <br>
                        @error('name')
                            <small class="text-danger mt-2">$message</small>
                        @enderror
                        <div class="d-flex justify-content-center">
                            <input type="submit" value="Create" class="btn btn-outline-primary mb-3">
                        </div>
                    </form>
                </div>
                <div class="col-7 offset-1">
                    <label for="" class="fw-bold fs-4 mb-3">Categories Table</label>
                    <table class="table">
                        <thead>
                            <tr class="">
                                <th class="col-6 fs-5">Name</th>
                                <th class="col ">Created Time</th>
                                <th class="col ">Tools</th>
                            </tr>
                        </thead>

                        @foreach ($data as $item )
                            <tbody>
                            <tr>
                                <td class="fw-bold"> {{$item -> name}}</td>
                                <td>{{$item -> created_at->format('d-m-y')}}</td></td>
                                <td>
                                    <form action="{{ route('delete#Process', $item->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link text-danger p-0" onclick="return confirm('Delete this category?')">
                                            <i class="fa-solid fa-trash me-1"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </main>
    </div>
@endsection
