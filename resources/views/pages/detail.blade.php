@extends('layouts.forum')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="mt-5">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card mt-5 shadow">
                        <div class="card-body">
                             @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (auth()->user() && auth()->user()->id == $thread->user_id)
                                <div class="d-flex justify-content-between">
                                    <div class="user-info mb-3">
                                        <span class="username">{{ '@' . (@$thread->user->nama ?? 'Pengguna') }}</span>
                                    </div>
                                    <div class="dropdown no-arrow">
                                        <a class="btn btn-white dropdown-toggle" href="#" role="button"
                                            id="dropdownDetail" data-toggle="dropdown" aria-expanded="false"
                                            aria-haspopup="true">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownDetail">
                                            <a class="dropdown-item" href="#" data-toggle="modal"
                                                data-target="#editThreadModal">Edit</a>
                                            <a class="dropdown-item"
                                                onclick="deleteData('{{ route('threadDelete', $thread) }}')">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="user-info mb-3">
                                    <span class="username">{{ '@' . (@$thread->user->nama ?? 'Pengguna') }}</span>
                                </div>
                            @endif
                            <h5 class="card-title"><strong>{{ $thread->title }}</strong></h5>
                            <p class="card-text">{{ $thread->category->name }}</p>
                            <p class="card-text">{!! nl2br($thread->content) !!}</p>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-6">
                                    @if ($thread->hasLike)
                                        <a href="{{ route('thread.like', $thread) }}" class="btn btn-outline-primary">
                                            <i class="far fa-thumbs-up"></i>
                                            ({{ $thread->totalLike() }})
                                        </a>
                                    @else
                                        <a href="{{ route('thread.like', $thread) }}" class="btn btn-primary">
                                            <i class="fas fa-thumbs-up"></i>
                                            ({{ $thread->totalLike() }})
                                        </a>
                                    @endif
                                </div>
                                <div class="col-md-6 text-right">
                                    <button type="button" class="btn btn-success comment-btn" data-toggle="collapse"
                                        data-target="#commentForm1"><i class="fas fa-comment"></i>
                                        ({{ $thread->totalComment() }})

                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Form komentar yang awalnya tersembunyi -->
                        <div class="collapse mt-3" id="commentForm1">
                            <div class="card card-body">
                                <form  action="{{ route('commentStore') }}">
                                    @csrf
                                    <input type="hidden" name="thread_id" value="{{ $thread->id }}">
                                    <div class="form-group">
                                        <label for="content">Tambahkan Komentar:</label>
                                        <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-paper-plane"></i>
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Daftar komentar -->
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-2">Komentar</h4>
                                <div class="list-group">
                                    <!-- Komentar akan ditambahkan secara dinamis melalui JavaScript -->
                                    @foreach ($thread->comments as $item)
                                        <div class="card my-1 p-2">
                                            @if (auth()->user() && auth()->user()->id == $item->user_id)
                                                <div class="d-flex justify-content-between">
                                                    <div class="">
                                                        <span
                                                            class="card-title">{{ '@' . (@$item->user->nama ?? 'Pengguna') }}</span>
                                                    </div>
                                                    <div class="dropdown no-arrow">
                                                        <a class="btn btn-white dropdown-toggle" href="#"
                                                            role="button" id="dropdownDetail" data-toggle="dropdown"
                                                            aria-expanded="false" aria-haspopup="true">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownDetail">
                                                            <a class="dropdown-item edit-comment-btn"
                                                                data-comment-id="{{ $item->id }}"
                                                                data-comment-content="{{ $item->content }}">Edit</a>
                                                            <a class="dropdown-item"
                                                                onclick="deleteData('{{ route('commentDelete', $item) }}')">
                                                                Hapus
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="">
                                                    <span
                                                        class="card-title">{{ '@' . (@$item->user->nama ?? 'Pengguna') }}</span>
                                                </div>
                                            @endif
                                            <p class="card-text"> {{ $item->content }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- edit thread modal -->
    <div class="modal" role="dialog" id="editThreadModal">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Thread</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editThreadForm" method="POST" action="{{ route('thread.edit', $thread) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="editedContent">Edited Content:</label>
                            <textarea class="form-control" id="editedContent" name="editedContent" rows="8">{{ $thread->content }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- edit comment modal -->
    <div class="modal" role="dialog" id="editCommentModal">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Comment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editCommentForm" method="POST" action="{{ route('comment.edit', $thread) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="editedCommentContent">Edited Content:</label>
                            <textarea class="form-control" id="editedCommentContent" name="editedContent" rows="8"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
