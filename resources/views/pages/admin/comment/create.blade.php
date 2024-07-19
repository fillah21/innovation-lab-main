@extends('layouts.admin')

@section('title', 'Tambah Comment')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Comment</h1>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{route('comment.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama" required>
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Thread</label>
                    <input type="text" name="category" class="form-control" id="category" required>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <input type="text" name="content" class="form-control" id="content" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection