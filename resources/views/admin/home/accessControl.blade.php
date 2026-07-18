@extends('admin.layout.master')

@section('container')
    <div class="col-lg-9 admin-content">
        <main>
            <section class="sw-section">
                <div class="container-lg">
                    <div class="row align-items-center mb-3">
                        <div class="col-md-7">
                            <h1 class="fs-4 fw-bold mb-1">Access Control</h1>
                            <p class="sw-muted mb-0">Grant or revoke user, author, and admin access.</p>
                        </div>
                        <div class="col-md-5">
                            <form action="{{ route('accessControlPage') }}" method="get" class="d-flex gap-2">
                                <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="Search id, name, or email">
                                <button class="btn btn-outline-primary" type="submit" aria-label="Search users">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    @if (count($data) === 0)
                        <p class="sw-muted">No accounts found.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Profile</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Current Role</th>
                                        <th class="text-center">Grant Access</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td class="fw-bold">{{ $item->id }}</td>
                                            <td style="width: 90px; height: 70px;">
                                                <img src="{{ $item->image != null ? asset('/profile/' . $item->image) : asset('image/user-male-circle.jpg') }}" alt="" class="w-75 h-100">
                                            </td>
                                            <td class="fw-bold">{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>
                                                <span class="badge text-bg-light border text-secondary">{{ $item->role }}</span>
                                            </td>
                                            <td>
                                                <form action="{{ route('accessControl#Update', $item->id) }}" method="post" class="d-flex justify-content-center gap-2">
                                                    @csrf
                                                    <select name="role" class="form-select form-select-sm" style="max-width: 150px;" aria-label="Select role for {{ $item->email }}">
                                                        <option value="user" @selected($item->role === 'user')>User</option>
                                                        <option value="author" @selected($item->role === 'author')>Author</option>
                                                        <option value="admin" @selected($item->role === 'admin')>Admin</option>
                                                    </select>
                                                    <button type="submit" class="btn btn-outline-primary btn-sm" onclick="return confirm('Update this account role?')">
                                                        <i class="fa-solid fa-user-shield me-1"></i>Update
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </section>
        </main>
    </div>
@endsection
