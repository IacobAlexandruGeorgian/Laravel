@extends('layouts.app')

@section('title', 'Blog Posts')

@section('content')
<div class="row">
    <div class="col-8">
        @forelse ($posts as $key => $post)

        @include('posts.partials.post', [])
            @updated(['date' => $post->created_at, 'name' => $post->user->name, 'userId' => $post->user->id])
            @endupdated

            @tags(['tags' => $post->tags])
            @endtags

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
        @include('posts._activity')
    </div>
</div>
@endsection
