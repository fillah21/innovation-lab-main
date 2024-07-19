@extends('layouts.admin')

@section('title', 'Ubah Jenis User')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit User</h1>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{route('user.update', $user)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="image_path" class="form-label">Foto</label>
                    <input type="file" name="image_path" class="form-control" id="image_path" value="{{$user->image_path}}">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama" value="{{$user->nama}}" required>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="username" value="{{$user->username}}" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" id="email" value="{{$user->email}}" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password (isi jika ingin ganti password)</label>
                    <input type="text" name="password" class="form-control" id="password" value="">
                </div>
                <button type="submit" class="btn btn-primary">Ubah</button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection