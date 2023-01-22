@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper pt-3">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-6">
                        <ol class="breadcrumb float-left">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
                            <li class="breadcrumb-item active">Posts</li>
                        </ol>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-2">
                        Список постов
                    </div>
                    <div class="col-3">
                        <a class="btn btn-block btn-success btn-xs" href="{{ route('admin.posts.create') }}">
                            Добавить новый
                        </a>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="width: 10px">№</th>
                        <th>Название</th>
                        <th colspan="2" style="width: 20%">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td><a href="{{ route('admin.posts.show', $post->id) }}">{{ $post->title }}</a></td>
                            <td>
                                <a href="{{ route('admin.posts.edit', $post) }}"><i class="fas fa-pencil-alt"></i></a>
                            </td>
                            <td>
                                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="border-0 bg-transparent">
                                        <i class="fas fa-trash-alt text-danger"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
