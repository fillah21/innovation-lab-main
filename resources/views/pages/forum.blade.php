@extends('layouts.forum')

@section('title', 'forum')

@section('content')
    @if ($thread->count())
        <div class="container mt-5">
            <div class="my-5">
                <div class="row">
                    @foreach ($thread as $item)
                        <div class="col-md-6">
                            <div class="card mt-5 shadow">
                                <div class="card-body content-thread" style="height : 250px;">
                                    <div class="user-info mb-3">
                                        <span class="username">{{ '@' . (@$item->user->nama ?? 'Pengguna') }}</span>
                                    </div>
                                    <h5 class="card-title"><strong>{{ $item->title }}</strong></h5>
                                    <p class="card-text">{{ $item->category->name }}</p>
                                    <p class="card-text text-justify overflow-hidden" style="max-height : 100px;">
                                        {!! nl2br($item->content) !!}</p>
                                </div>
                                <div class="card-header py-1">
                                    <div class="justify-content-center navbar">
                                        <a href="{{ route('thread.detail', $item) }}" type="button"
                                            class="getstarted scrollto m-0">
                                            <i class="fas fa-indent mr-1"></i>
                                            Baca Selengkapnya
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <div class="container mt-5">
            <div class="my-5">
                <div class="mt-5">
                    <p class="text-center fs-3">Tidak Ada Thread</p>
                </div>
            </div>
        </div>
    @endif
@endsection
