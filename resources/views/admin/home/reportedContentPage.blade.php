@extends('admin.layout.master');
@section('container')
    <div class="col-7 admin-content ms-5 ">
        <main>
            <section class="sw-section">
                <div class="container-lg">
                    <div class="card align-items-center g-5">
                        <div class="card-header fs-5 fw-bold text-danger rounded rounded-1">Reported Content</div>

                        <div class="card-body">
                            <h6>Title : {{$data->title}}</h6>
                            <h6>Creator ID : {{$data->user_id}}</h6>
                            <h6>Content ID : {{$data->id}}</h6>
                            @if($data->role == 'edu')
                                <h6>Type : Educaton</h6>
                            @else
                                <h6>Type : Article (ဆောင်းပါး)</h6>
                            @endif
                            <p>{{$data->content}}</p>

                        </div>

                    </div>
                </div>

            </section>
        </main>
    </div>
@endsection
