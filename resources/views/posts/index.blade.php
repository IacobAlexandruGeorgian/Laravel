@extends('layouts.app')

@section('title', 'Blog Posts')

@section('content')
<div class="row">
    <div class="col-8">
        @forelse ($posts as $key => $post)

        @include('posts.partials.post', [])
            @updated(['date' => $post->created_at, 'name' => $post->user->name])

            @endupdated

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
                @card(['title' => 'Most commented'])
                    @slot('subtitle')
                        What people are curently talking about
                    @endslot
                    @slot('items')
                        @foreach ($mostCommented as $post)
                            <li class="list-group-item">
                                <a href={{ route('posts.show', ['post' => $post->id]) }}>
                                    {{ $post->title }}
                                </a>
                            </li>
                        @endforeach
                    @endslot
                @endcard
            </div>
            <div class="row mt-4">
                @card(['title' => 'Most Active'])
                    @slot('subtitle')
                        Users with most posts written
                    @endslot
                    @slot('items', collect($mostActive)->pluck('name'))
                @endcard
            </div>
            <div class="row mt-4">
                @card(['title' => 'Most active Last Month'])
                    @slot('subtitle')
                        Users with most posts written in the month
                    @endslot
                    @slot('items', collect($mostActiveLastMonth)->pluck('name'))
                @endcard
            </div>
        </div>
    </div>
</div>
@endsection
