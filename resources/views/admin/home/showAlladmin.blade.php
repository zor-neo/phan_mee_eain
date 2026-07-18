@extends('admin.layout.master');
@section('container')
    <div class="col-7 admin-content ms-5 ">
        <main>
            <section class="sw-section">
                <div class="container-lg">
                    <div class="row align-items-center g-5">
                        <div class="col-12">
                            <label for="" class="fw-bold fs-4 mb-3">Role - "Author"</label>
                            <form action="{{route('allAuthorPage')}}" method="get">
                                @csrf
                                <div class="row">
                                    <div class="col-4 ">
                                        <input type="text" name="search" id="" class="form-control" placeholder="Search by id.....">
                                    </div>
                                    <div class="col-1 mb-1">
                                        <button class="btn btn-outline-primary  p-2 form-control" type="submit"><i class="fa-solid fa-magnifying-glass text-primary"></i></button>
                                    </div>
                                </div>
                            </form>
                            <table class="table">
                                <thead>
                                    <tr class="">
                                        <th class="col">ID</th>
                                        <th class="col">Profile</th>
                                        <th class="col fs-5">Name</th>
                                        <th class="col ">Email</th>
                                        <th class="col ">Created Time</th>
                                        <th class="col text-center">Tools</th>
                                    </tr>
                                </thead>
                                @if (count($data) == 0 )
                                    <h4>There is no Auhtor yet!</h4>
                                @else
                                    @foreach ($data as $item)
                                    <tbody>
                                        <tr>
                                            <td class="fw-bold">{{$item->id}} .</td>
                                            <td style="width: 100px; height: 75px;">
                                                <img src="{{$item->image != null ? asset('/profile/'. $item->image) : asset('image/user-male-circle.jpg')}}" alt="" class="w-75 h-100" >
                                            </td>
                                            <td class="fw-bold"> {{ $item->name }}</td>
                                            <td class=""> {{ $item->email }}</td>
                                            <td>{{ $item->created_at->format('d-m-y') }}</td>

                                            <td>
                                                <form action="{{ route('demote#Process', $item->id) }}" method="post" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-outline-danger fw-bold me-2 p-1" onclick="return confirm('Demote this author?')">Demote <i class="fa-solid fa-turn-down ms-2"></i></button>
                                                </form>
                                                <form action="{{ $item->image ? route('deleteUserProcess', ['id' => $item->id, 'image' => $item->image]) : route('deleteUserProcess', ['id' => $item->id]) }}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-link text-danger p-0" onclick="return confirm('Delete this user account?')">
                                                        <i class="fa-solid fa-trash me-1"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                @endif

                            </table>
                        </div>
                    </div>
                </div>

            </section>
        </main>
    </div>
@endsection
