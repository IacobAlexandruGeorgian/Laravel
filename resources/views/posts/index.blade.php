@extends('layouts.app')

@section('title', 'Blog Posts')

@section('content')
<div class="row">
    <div class="col-8">
        @forelse ($posts as $key => $post)

        @include('posts.partials.post', [])
            <p>Added {{ $post->created_at->diffForHumans() }} by {{ $post->user->name }}</p>
            @if ($post->comments_count)
                <p>{{ $post->comments_count }} comments</p>
            @else
                <p>No comments yet!</p>
            @endif
        @empty
        No posts found!
        @endforelse
    </div>
    <div class="col-4">
        <div class="container">
            <div class="row">
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                    <h5 class="card-title">Most commented</h5>
                    <h6 class="card-subtitle mb-2 text-muted">What people are curently talking about</h6>
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach ($mostCommented as $post)
                            <li class="list-group-item">
                                <a href={{ route('posts.show', ['post' => $post->id]) }}>
                                    {{ $post->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row mt-4">
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                    <h5 class="card-title">Most active</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Users with most posts written</h6>
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach ($mostActive as $user)
                            <li class="list-group-item">
                                {{ $user->name }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row mt-4">
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                    <h5 class="card-title">Most active Last Month</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Users with most posts written</h6>
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach ($mostActiveLastMonth as $user)
                            <li class="list-group-item">
                                {{ $user->name }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
