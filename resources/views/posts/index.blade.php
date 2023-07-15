@extends('layouts.app')

@section('title', 'Blog Posts')

@section('content')

@forelse ($posts as $key => $post)
  @include('posts.partials.post', [])
    @if ($post->comments_count)
        <p>{{ $post->comments_count }} comments</p>
    @else
        <p>No comments yet!</p>
    @endif
@empty
No posts found!
@endforelse

@endsection
