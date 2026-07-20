@extends('admin.layout.master')

@section('container')
    <div class="col-lg-9 admin-content">
        <main>
            <section class="sw-section">
                <div class="container-lg">
                    <div class="sw-panel mx-auto" style="max-width: 760px;">
                        <span class="badge sw-badge mb-3">Coming Soon</span>
                        <h1 class="fs-3 fw-bold text-dark mb-3">
                            <i class="bi bi-rss text-primary me-2"></i> Create Admin Feed
                        </h1>
                        <p class="sw-muted mb-4">
                            Admin feed publishing is planned for a future version of Phan Mee Eain. For the current
                            release, admins can continue managing users, author requests, reports, suggestions, and
                            categories from the admin portal.
                        </p>
                        <div class="d-flex flex-wrap gap-2">
                            <a href="{{ route('adminHome') }}" class="btn btn-primary">
                                <i class="bi bi-speedometer2 me-2"></i> Back to Dashboard
                            </a>
                            <a href="{{ route('allSuggestPage') }}" class="btn btn-outline-primary">
                                Review Suggestions
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
@endsection
