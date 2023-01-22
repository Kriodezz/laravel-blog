@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper pt-3">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Редактирование тега
                                </h3>
                            </div>
                            <form action="{{ route('admin.tags.update', $tag->id) }}" method="post">
                                @csrf
                                @method('patch')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="tag">Название тега</label>
                                        <input type="text"
                                               name="title"
                                               class="form-control"
                                               id="tag"
                                               placeholder="Введите название"
                                               value="{{ $tag->title }}">
                                        @error('title')
                                        <small class="form-text text-danger">Необходимо указать название тега</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Изменить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
