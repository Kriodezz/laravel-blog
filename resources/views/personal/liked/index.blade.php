@extends('personal.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper pt-3">
    <!-- Main content -->
    <section class="content">
        <div class="row mb-2">
            <div class="col-6">
                <ol class="breadcrumb float-left">
                    <li class="breadcrumb-item"><a href="{{ route('personal.index') }}">Personal</a></li>
                    <li class="breadcrumb-item active">Liked</li>
                </ol>
            </div>
        </div>
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
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
                            <td><a href="{{ route('personal.liked.show', $post->id) }}">{{ $post->title }}</a></td>
                            <td>
                                <form action="{{ route('personal.liked.destroy', $post->id)}}" method="post">
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
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
