{{--@extends('welcome')--}}

{{--@section('content')--}}
<div style="margin-inline-end: inherit">
    <h6>All POST</h6>
</div>
    @foreach ($posts as $post)
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->content }}</p>
        <small>By {{ $post->author }} on {{ $post->created_at->format('Y-m-d') }}</small>
        <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>

        <h3>Comments</h3>
        @foreach ($post->comments as $comment)
            <p>{{ $comment->user_name }}: {{ $comment->comment_text }}</p>
        @endforeach

        @auth
        <form action="{{ route('comments.store') }}" method="POST">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <input type="text" name="user_name" placeholder="Your Name" required>
            <textarea name="comment_text" placeholder="Your Comment" required></textarea>
            <button type="submit">Add Comment</button>
        </form>
        @endauth
    @endforeach
{{--    {{ $posts->links() }}--}}
{{--@endsection--}}
