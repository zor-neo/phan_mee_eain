@extends('static.layout')

@section('title', 'Author Guidelines - Phan Mee Eain')

@section('content')
    <h1 class="h3 fw-bold mb-3">Author Guidelines</h1>
    <p class="text-muted mb-4">These rules match the author promotion agreement and are decided by the admin team.</p>
    <div class="policy-content">{{ $guidelines }}</div>
@endsection
