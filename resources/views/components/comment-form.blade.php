<div class="mb-2 mt-2">
    @auth
    <form action="{{ $route }}" method="POST">
        @csrf
        <div class="form-group">
            <textarea class="form-control" type="text" name="content"></textarea>
        </div>
        <button type="submit" value="Create" class="btn btn-primary btn-block">Add Comment</button>
    </form>
    @errors
    @enderrors
    @else
        <a href="{{ route('login') }}">Sign-in</a> to post comments!
    @endauth
</div>
<hr>
