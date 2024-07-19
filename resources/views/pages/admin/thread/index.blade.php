@extends('layouts.admin')

@section('title', 'Thread')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Thread</h1>
        <a href="/thread/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Create Thread</a>
    </div>

    <div class="card">
        <div class="card-body">
            <table id="categoryTable" class="table table-striped table-bordered" style="width: 100%">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Judul Thread</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $index=>$item)
                    <tr>
                        <th scope="row">{{$index+1}}</th>
                        <td>{{$item->category->name}}</td>
                        <td>{{$item->title}}</td>
                        <td>
                            <a class="btn btn-danger" onclick="deleteData('{{route('thread.delete', $item)}}')"> 
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
<!-- /.container-fluid -->
@endsection