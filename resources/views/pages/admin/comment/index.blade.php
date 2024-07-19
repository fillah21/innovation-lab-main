@extends('layouts.admin')

@section('title', 'Komentar')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Komentar</h1>
    </div>

    <div class="card">
        <div class="card-body">
            <table id="categoryTable" class="table table-striped table-bordered" style="width: 100%">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul Thread</th>
                        <th scope="col">Isi Komentar</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $index=>$item)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{$item->thread ? $item->thread->title : 'Tidak Ada Judul'}}</td>
                        <td class="text-truncate" style="max-width: 300px;">{{$item->content}}</td>
                        <td>
                            <a class="btn btn-danger" onclick="deleteData('{{route('comment.delete', $item)}}')">
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