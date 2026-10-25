
@extends('layouts.admin.app')

@section('content')
<div class="py-4">
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('user.index') }}">User</a>
            </li>
            <li class="breadcrumb-item active">Edit User</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Edit User</h1>
            <p class="mb-0">Form untuk mengedit data user.</p>
        </div>
        <div>
            <a href="{{ route('user.index') }}" class="btn btn-primary">
                Kembali
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow components-section">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <form action="{{ route('user.update', $dataUser->id) }}"
                      method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row mb-4">
                        <div class="col-lg-6 col-sm-12">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" id="name"
                                       class="form-control"
                                       name="name"
                                       value="{{ old('name', $dataUser->name) }}"
                                       maxlength="100" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email"
                                       class="form-control"
                                       name="email"
                                       value="{{ old('email', $dataUser->email) }}"
                                       required>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12">
                            <div class="mb-3">
                                <label for="password" class="form-label">
                                    Password Baru
                                </label>
                                <input type="password" id="password"
                                       class="form-control"
                                       name="password" minlength="8">
                                <small>Kosongkan jika tidak ingin mengganti password.</small>
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation"
                                       class="form-label">
                                    Confirm Password
                                </label>
                                <input type="password"
                                       id="password_confirmation"
                                       class="form-control"
                                       name="password_confirmation">
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">
                                Simpan Perubahan
                            </button>
                            <a href="{{ route('user.index') }}"
                               class="btn btn-outline-secondary ms-2">
                                Batal
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
