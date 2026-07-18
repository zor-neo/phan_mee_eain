@extends('admin.layout.master');
@section('container')
    <div class="col-7 admin-content ms-5 ">
        <main>
            <section class="sw-section">
                <div class="container-lg">
                    <div class="row align-items-center g-5">
                        <div class="col-12">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <label for="" class="fw-bold fs-4 mb-0">User Suggestion</label>
                                <form action="{{ route('suggestions.markSeen') }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-primary btn-sm">Mark all as seen</button>
                                </form>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr class="">
                                        <th class="col">Suggestor ID</th>
                                        <th class="col">Suggestor Name</th>
                                        <th class="col-5 text-center ">Suggestions</th>
                                        <th class="col ">Reported Time</th>
                                    </tr>
                                </thead>
                                @if (count($data) == 0 )
                                    <h4>There is no Reported!</h4>
                                @else
                                    @foreach ($data as $item)
                                    <tbody>
                                        <tr>
                                            <td class="">{{$item->user_id}} .</td>
                                            <td class=""> {{ $item->name}}</td>
                                            <td>{{$item->message}}</td>
                                            <td>{{ $item->created_at->format('d-m-y') }}</td>
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
