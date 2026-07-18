@extends('admin.layout.master');
@section('container')
    <div class="col-7 admin-content ms-5 ">
        <main>
            <section class="sw-section">
                <div class="container-lg">
                    <div class="row align-items-center g-5">
                        <div class="col-12">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <label for="" class="fw-bold fs-4 mb-0">Report Information</label>
                                <form action="{{ route('reports.markSeen') }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-primary btn-sm">Mark all as seen</button>
                                </form>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr class="">
                                        <th class="col">Repoter ID</th>
                                        <th class="col">Reporter Name</th>
                                        <th class="col">Post ID</th>
                                        <th class="col ">Report Reason</th>
                                        <th class="col ">Reported Time</th>
                                        <th class="col">See all</th>
                                    </tr>
                                </thead>
                                @if (count($data) == 0 )
                                    <h4>There is no Reported!</h4>
                                @else
                                    @foreach ($data as $item)
                                    <tbody>
                                        <tr>
                                            <td class="">{{$item->user_id}} .</td>
                                            {{-- <td>..</td> --}}
                                            <td class=""> {{ $item->name}}</td>
                                            <td>{{$item->content_id}}</td>
                                            <td>{{$item->message}}</td>
                                            <td>{{ $item->created_at->format('d-m-y') }}</td>
                                            <td class="text-center"><a href="{{route('reportedContentPage',$item->content_id)}}"><i class="fa-solid fa-expand fs-4"></i></a></td>
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
