<div class="container">
    <a class="navbar-brand" href="{{route('home')}}">All Blogs</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
{{--    <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @auth
                    <li class="nav-item"><a class="nav-link" href="{{route('posts.create')}}">Add New Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('posts.myposts')}}">My Posts</a></li>
                    <form method="post" action="{{route('logout')}}" id="logout-form">
                        @csrf
                    </form>
                    <li class="nav-item"><a class="nav-link" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit()">Logout</a></li>
                @endauth
                @guest
                    <li class="nav-item"><a class="nav-link" href="{{route('login')}}">login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('register')}}">Register</a></li>
                @endguest
        </ul>
{{--    </div>--}}
</div>
