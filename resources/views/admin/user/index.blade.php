
@extends('layouts.admin.app')

@section('content')
<div class="py-4">
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">User</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Data User</h1>
            <p class="mb-0">List data seluruh user</p>
        </div>
        <div>
            <a href="{{ route('user.create') }}"
               class="btn btn-success text-white">
                Tambah User
            </a>
        </div>
    </div>
</div>

<div class="row">
    @if (session('success'))
        <div class="alert alert-info">
            {{ session('success') }}
        </div>
    @endif

    <div class="col-12 mb-4">
        <div class="card border-0 shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table-user"
                           class="table table-centered table-nowrap mb-0 rounded">
                        <thead class="thead-light">
                            <tr>
                                <th class="border-0">Name</th>
                                <th class="border-0">Email</th>
                                <th class="border-0">Password</th>
                                <th class="border-0 rounded-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataUser as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>********</td>
                                <td>
                                    <a href="{{ route('user.edit', $item->id) }}"
                                       class="btn btn-info btn-sm">
                                        Edit
                                    </a>

                                    <form action="{{ route('user.destroy', $item->id) }}"
                                          method="POST"
                                          style="display:inline">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus user ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
