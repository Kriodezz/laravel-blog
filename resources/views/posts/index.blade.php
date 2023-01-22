@extends('layouts.main')
@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Блог с постами</h1>
            <div class="row">
                <div class="col-md-8">
                    <section>
                        @foreach($posts as $k => $post)
                            @if($k % 2 == 0)
                                <div class="row blog-post-row">
                                    <div class="col-md-6 blog-post" data-aos="fade-up">
                                        <div class="blog-post-thumbnail-wrapper">
                                            <img src="{{ Storage::url($post->image) }}" alt="blog post">
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="blog-post-category">{{ $post->category->title }}</p>
                                            @auth()
                                                <form action="{{ route('post.likes.store', $post->id) }}" method="post">
                                                    @csrf
                                                    <span>{{ $post->liked_users_count }}</span>
                                                    <button type="submit" class="border-0 bg-transparent">
                                                        @if(auth()->user()->posts->contains($post->id))
                                                            <i class="fas fa-heart"></i>
                                                        @else
                                                            <i class="far fa-heart"></i>
                                                        @endif
                                                    </button>
                                                </form>
                                            @endauth
                                            @guest()
                                                <div>
                                                    <span>{{ $post->liked_users_count }}</span>
                                                    <i class="far fa-heart"></i>
                                                </div>
                                            @endguest
                                        </div>
                                        <a href="{{ route('posts.show', $post->id) }}" class="blog-post-permalink">
                                            <h6 class="blog-post-title">{{ $post->title }}</h6>
                                        </a>
                                    </div>
                                    @if(isset($posts[$k + 1]))
                                        <div class="col-md-6 blog-post" data-aos="fade-up">
                                            <div class="blog-post-thumbnail-wrapper">
                                                <img src="{{ Storage::url($posts[$k + 1]->image) }}" alt="blog post">
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <p class="blog-post-category">{{ $posts[$k + 1]->category->title }}</p>
                                                @auth()
                                                    <form action="{{ route('post.likes.store', $posts[$k + 1]->id) }}"
                                                          method="post">
                                                        @csrf
                                                        <span>{{ $posts[$k + 1]->liked_users_count }}</span>
                                                        <button type="submit" class="border-0 bg-transparent">
                                                            @if(auth()->user()->posts->contains($posts[$k + 1]->id))
                                                                <i class="fas fa-heart"></i>
                                                            @else
                                                                <i class="far fa-heart"></i>
                                                            @endif
                                                        </button>
                                                    </form>
                                                @endauth
                                                @guest()
                                                    <div>
                                                        <span>{{ $posts[$k + 1]->liked_users_count }}</span>
                                                        <i class="far fa-heart"></i>
                                                    </div>
                                                @endguest
                                            </div>
                                            <a href="{{ route('posts.show', $posts[$k + 1]->id) }}"
                                               class="blog-post-permalink">
                                                <h6 class="blog-post-title">{{ $posts[$k + 1]->title }}</h6>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        @endforeach
                        <div>{{ $posts->withQueryString()->links() }}</div>
                    </section>
                </div>
                <div class="col-md-4 sidebar" data-aos="fade-left">
                    <div class="widget widget-post-list">
                        <h5 class="widget-title">Популярное</h5>
                        <ul class="post-list">
                            @foreach($popularPosts as $popularPost)
                                <li class="post">
                                    <a href="{{ route('posts.show', $popularPost->id) }}" class="post-permalink media">
                                        <img src="{{ Storage::url($popularPost->image) }}" alt="blog post">
                                        <div class="media-body">
                                            <h6 class="post-title">{{ $popularPost->title }}</h6>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
