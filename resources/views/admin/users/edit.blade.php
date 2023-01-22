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
                                    Редактирование профиля пользователя
                                </h3>
                            </div>
                            <form action="{{ route('admin.users.update', $user->id) }}" method="post">
                                @csrf
                                @method('patch')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Имя</label>
                                        <input type="text"
                                               name="name"
                                               class="form-control"
                                               id="name"
                                               placeholder="Введите имя"
                                               value="{{ old('name') ?? $user->name}}">
                                        @error('name')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email"
                                               name="email"
                                               class="form-control"
                                               id="email"
                                               placeholder="Введите адрес эл. почты"
                                               value="{{ old('email') ?? $user->email }}">
                                        @error('email')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="role" class="form-label">Укажите роль</label>
                                        <select name="role" class="form-control" id="role">
                                            @foreach($roles as $k => $role)
                                                <option value="{{ $k }}"
                                                    {{ old('role') ?? $user->role == $k ? 'selected' : '' }}
                                                >{{ $role }}</option>
                                            @endforeach
                                        </select>
                                        @error('role')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
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
