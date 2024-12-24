@extends('layouts.blogLayout')

@section('container')
<div class="row">
    <!-- Blog entries-->
    <div class="col-lg-8">
        <div class="row">
            @foreach($posts as $post )
                <div class="col-lg-3">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h2 class="card-title h4">{{$post->title}}</h2>
                            <div class="small text-muted">{{$post->created_at}}</div>
                            <p class="card-text">{{Str::limit($post->content,50)}}.</p>
                            <a class="btn btn-primary" href="{{route('show',['id' => $post->id])}}!">Read more →</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination-->
        <div class="my-5">
            <nav aria-label="Pagination">
                <div class="my-5">
                    <hr class="my-0"/>
                    {{ $posts->links() }}
                </div>
            </nav>
        </div>
    </div>
</div>
@endsection
