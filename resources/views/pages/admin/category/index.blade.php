@extends('layouts.admin')

@section('title', 'Kategori')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kategori</h1>
        <a href="/admin/category/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-plus fa-sm text-white-50"></i> Tambah Kategori</a>
    </div>
    

    <div class="card">
        <div class="card-body">
            <table id="categoryTable" class="table table-striped table-bordered" style="width: 100%">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $index=>$item)
                    <tr>
                        <th scope="row">{{$index+1}}</th>
                        <td>{{$item->name}}</td>
                        <td>
                            <a class="btn btn-primary" href="{{route('category.edit', $item)}}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-danger" onclick="deleteData('{{route('category.delete', $item)}}')">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    function deleteData(url) {
        if (confirm("Yakin?")) {
            window.location.href = url;
        }
    }
</script>
<!-- /.container-fluid -->
@endsection