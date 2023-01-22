@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper pt-3">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row mb-3 align-items-center">
                    <h1>{{ $post->title }}</h1>
                    <a href="{{ route('admin.posts.edit', $post) }}"><i class="fas fa-pencil-alt ml-2 mr-2"></i></a>
                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="border-0 bg-transparent">
                            <i class="fas fa-trash-alt text-danger"></i>
                        </button>
                    </form>
                </div>
                <div class="row mb-3">
                    {{ $post->content }}
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
