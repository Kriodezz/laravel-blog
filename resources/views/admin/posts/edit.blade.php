@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper pt-3">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Редактирование поста
                                </h3>
                            </div>
                            <form action="{{ route('admin.posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Заголовок</label>
                                        <input type="text"
                                               name="title"
                                               class="form-control"
                                               id="title"
                                               placeholder="Введите заголовок"
                                               value="{{ old('title') ?? $post->title}}">
                                        @error('title')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="summernote">Содержание поста</label>
                                        <textarea name="content"
                                                  class="form-control"
                                                  id="summernote"
                                        >{{ old('content') ?? $post->content}}</textarea>
                                        @error('content')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Изображение</label>
                                        <div class="w-50">
                                            <img class="w-50 mb-2" src="{{ Storage::url($post->image) }}" alt="image">
                                        </div>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image" name="image">
                                                <label class="custom-file-label" for="image">Выберите файл</label>
                                            </div>
                                        </div>
                                        @error('image')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="category_id" class="form-label">Выберите категорию</label>
                                        <select name="category_id" class="form-control" id="category_id">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_id') ?? $post->category->id == $category->id ? 'selected' : '' }}
                                                >{{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Укажите теги</label>
                                        @foreach($tags as $tag)
                                            <div class="form-check">
                                                <input {{ in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'checked' : '' }}
                                                       name="tags[]"
                                                       class="form-check-input"
                                                       type="checkbox"
                                                       value="{{ $tag->id }}"
                                                       id="tag{{ $tag->id }}">
                                                <label class="form-check-label" for="tag{{ $tag->id }}">
                                                    {{ $tag->title }}
                                                </label>
                                            </div>
                                        @endforeach
                                        @error('tags')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                        @error('tags.*')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Сохранить</button>
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
