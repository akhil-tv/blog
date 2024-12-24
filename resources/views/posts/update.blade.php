@extends('layouts.blogLayout')

@section('container')
    <div class="container">
        <h1>Create a New Post</h1>

        <!-- Display validation errors (if any) -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('posts.update',['id'=> $post->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf <!-- CSRF token for security -->
            @method("PUT")
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title',$post->title) }}" required>
            </div>

            <div class="form-group">
                <label for="author">Author Name</label>
                <input type="text" name="author" id="author" class="form-control" value="{{ old('author',$post->author) }}" required>
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control" rows="5" required>{{ old('content', $post->content) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Post</button>
        </form>
    </div>
@endsection
