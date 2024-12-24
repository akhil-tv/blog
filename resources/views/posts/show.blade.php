@extends('layouts.blogLayout')

@section('container')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- Post content-->
            <article>
                <!-- Post header-->
                <header class="mb-4">
                    <!-- Post title-->
                    <h1 class="fw-bolder mb-1">{{$post->title}}</h1>
                    <!-- Post meta content-->
                    <div class="text-muted fst-italic mb-2">{{$post->created_at}}</div>
                    <!-- Post categories-->
                    @auth
                    @if($post->user->id == auth()->user()->id)
                        <form action="{{route('posts.destroy',['id' => $post->id])}}" method="POST" id="delete-form">
                            @csrf
                            @method('DELETE')
                        </form>
                    <a class="badge bg-secondary text-decoration-none link-light" href="#" onclick="event.preventDefault();document.getElementById('delete-form').submit()">
                        DELETE</a>
                    <a class="badge bg-secondary text-decoration-none link-light" href="{{route('posts.edit',['id'=>$post->id])}}">EDIT</a>
                    @endif
                    @endauth
                </header>
                <!-- Preview image figure-->
{{--                <figure class="mb-4"><img class="img-fluid rounded" src="https://dummyimage.com/900x400/ced4da/6c757d.jpg" alt="..." /></figure>--}}
                <!-- Post content-->
                <section class="mb-5">
                    <p class="fs-5 mb-4">{{$post->content}}</p>
                </section>
            </article>
            <!-- Comments section-->
                <section class="mb-4">
                    <div class="card bg-light">
                        <div class="card-body">
                            <!-- Comment form-->
                            <form class="mb-5" action="{{route('comments.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <textarea class="form-control mb-3" rows="3" placeholder="Join the discussion and leave a comment!" name="comment_text"></textarea>
                                <input type="hidden" name="post_id" value={{$post->id}}>
                                <div class="d-flex mb-5">
                                    <button type="submit" class="btn btn-primary">Post Your Comment</button>
                                </div>
                            </form>
                            <!-- Comment with nested comments-->
                            <!-- Single comment-->
                            @foreach($post->comments as $comment)
                            <div class="d-flex ms-3" style="padding-bottom: 20px">
                                <div class="flex-shrink-0"><img class="rounded-circle ms-3" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                <div class="ms-3">
                                    <div class="fw-bold">{{$comment->user_name}}</div>
                                    {{$comment->comment_text}}
                                </div>
                                <div class="ms-3">
                                    <form action="{{route('comments.destroy',$comment->id )}}" method="POST" id="delete-comment-form">
                                        @csrf
                                        @method("DELETE")
                                        <div class="ms-3">
                                            <button type="submit" class="btn btn-outline-danger"> Delete Your Comment</button>
                                        </div>
                                    </form>
                                </div>
{{--                                <div class="ms-3">--}}
{{--                                    <a href="#" onclick="event.preventDefault();document.getElementById('delete-comment-form').submit()>Delete</a>--}}
{{--                                </div>--}}
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>
        </div>
        <!-- Side widgets-->
{{--        <div class="col-lg-4">--}}
{{--            <!-- Search widget-->--}}
{{--            <div class="card mb-4">--}}
{{--                <div class="card-header">Search</div>--}}
{{--                <div class="card-body">--}}
{{--                    <div class="input-group">--}}
{{--                        <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />--}}
{{--                        <button class="btn btn-primary" id="button-search" type="button">Go!</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- Categories widget-->--}}
{{--            <div class="card mb-4">--}}
{{--                <div class="card-header">Categories</div>--}}
{{--                <div class="card-body">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-sm-6">--}}
{{--                            <ul class="list-unstyled mb-0">--}}
{{--                                <li><a href="#!">Web Design</a></li>--}}
{{--                                <li><a href="#!">HTML</a></li>--}}
{{--                                <li><a href="#!">Freebies</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="col-sm-6">--}}
{{--                            <ul class="list-unstyled mb-0">--}}
{{--                                <li><a href="#!">JavaScript</a></li>--}}
{{--                                <li><a href="#!">CSS</a></li>--}}
{{--                                <li><a href="#!">Tutorials</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- Side widget-->--}}
{{--            <div class="card mb-4">--}}
{{--                <div class="card-header">Side Widget</div>--}}
{{--                <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
</div>
@endsection
