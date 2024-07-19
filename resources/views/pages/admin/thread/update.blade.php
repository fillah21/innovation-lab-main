@extends('layouts.admin')

@section('title', 'Ubah Thread')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Thread</h1>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{route('thread.update', $thread)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nsms" class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama" required>
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Kategori</label>
                    <input type="text" name="category" class="form-control" id="category" required>
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="title" required>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <input type="text" name="content" class="form-control" id="content" required>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Status</label>
                    <input type="text" name="content" class="form-control" id="content" value="{{ $thread->contnt }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Ubah</button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection