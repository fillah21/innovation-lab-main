@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <!-- Content Row -->
        <div class="row">
            <!-- User Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{ route('user.index') }}">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        User</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Total: {{ App\Models\User::count() }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-users fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Kategori Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{ route('category.index') }}">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Kategori</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Total:
                                        {{ App\Models\Category::count() }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-list-alt fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Thread Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{ route('thread.index') }}">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Thread</div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Total:
                                                {{ App\Models\Thread::count() }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-at fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Komentar Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{ route('comment.index') }}">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Komentar</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Total:
                                        {{ App\Models\Comment::count() }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
