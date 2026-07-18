@extends('admin.layout.master');
@section('container')
    <div class="col-7 admin-content ms-5 ">
        <main>
            <section class="sw-section">
                <div class="container-lg">
                    <div class="row align-items-center g-5">
                        <div class="col-12">
                            <label for="" class="fw-bold fs-4 mb-3">Promotion Process</label>
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
                                    <h4>There is no Request yet!</h4>
                                @else
                                    @foreach ($data as $item)
                                    <tbody>
                                        <tr>
                                            <td class="fw-bold">{{$item->userId}} .</td>
                                            <td style="width: 100px; height: 75px;">
                                                <img src="{{$item->image != null ? asset('/profile/'. $item->image) : asset('image/user-male-circle.jpg')}}" alt="" class="w-75 h-100" >
                                            </td>
                                            <td class="fw-bold"> {{ $item->name }}</td>
                                            <td class=""> {{ $item->email }}</td>
                                            <td>{{ $item->created_at->format('d-m-y') }}</td>

                                            <td>
                                                <form action="{{ route('promote.process', $item->user_id) }}" method="post" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-outline-success fw-bold me-2 p-1" onclick="return confirm('Promote this user to author?')">Promote<i class="fa-solid fa-turn-up ms-2"></i></button>
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
@endsection
