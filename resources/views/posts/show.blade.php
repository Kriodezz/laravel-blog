@extends('layouts.main')
@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title aos-init aos-animate" data-aos="fade-up">{{ $post->title }}</h1>
            <div class="row d-flex justify-content-between">
                <p class="edica-blog-post-meta aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                    {{ $date }}
                </p>
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
            <section class="blog-post-featured-img aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                <img src="{{ asset(Storage::url($post->image)) }}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto aos-init aos-animate" data-aos="fade-up">
                        {{ $post->content }}
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <section class="related-posts">
                        <h2 class="section-title mb-4 aos-init aos-animate" data-aos="fade-up">Похожие посты</h2>
                        <div class="row">
                            @foreach($relatedPosts as $relatedPost)
                                <div class="col-md-4 aos-init aos-animate" data-aos="fade-right" data-aos-delay="100">
                                    <img src="{{ asset(Storage::url($relatedPost->image)) }}" alt="related post"
                                         class="post-thumbnail">
                                    <p class="post-category">{{ $relatedPost->category->title }}</p>
                                    <a href="{{ route('posts.show', $relatedPost->id) }}" class="blog-post-permalink">
                                        <h5 class="post-title">{{ $relatedPost->title }}</h5>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </section>
                    <h3>Комментарии <span class="small">({{ $post->comments->count() }})</span></h3>
                    <section class="comment-list mb-5">
                        @foreach($post->comments as $comment)
                            <div class="comment-text mb-3">
                                <div class="username">{{ $comment->user->name }}
                                    <span
                                        class="text-muted small float-right">{{ $comment->getCreatedAt()->diffForHumans() }}</span>
                                </div>
                                {{ $comment->message }}
                            </div>
                        @endforeach
                    </section>
                    @auth()
                        <section class="comment-section">
                            <h4 class="section-title mb-3 aos-init aos-animate" data-aos="fade-up">Ваш комментарий</h4>
                            <form action="{{ route('post.comments.store', $post->id) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12 aos-init aos-animate" data-aos="fade-up">
                                        <label for="comment" class="sr-only">Напишите комментарий</label>
                                        <textarea name="message" id="comment"
                                                  class="form-control"
                                                  placeholder="Напишите комментарий"
                                                  rows="10"
                                        ></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 aos-init aos-animate" data-aos="fade-up">
                                        <input type="submit" value="Отправить" class="btn btn-warning">
                                    </div>
                                </div>
                            </form>
                        </section>
                    @endauth
                </div>
            </div>
        </div>
    </main>
@endsection
