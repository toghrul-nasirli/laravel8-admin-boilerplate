@extends('layouts.admin')

@section('title', 'İstifadəçilər - Redaktə |')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>İstifadəçilər - Redaktə</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Admin</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">İstifadəçilər</a></li>
                    <li class="breadcrumb-item active">Redaktə</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('admin.users.update', $user) }}" method="POST" autocomplete="off">
                    @csrf
                    @method('PATCH')
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="is_admin">Vəzifə</label>
                                            <select class="form-control" id="is_admin" name="is_admin">
                                                <option>Vəzifə seçin</option>
                                                <option value="1" {{ $user->is_admin ? 'selected' : '' }}>Admin</option>
                                                <option value="0" {{ !$user->is_admin ? 'selected' : '' }}>İstifadəçi</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="username">İstifadəçi adı</label>
                                            <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}" placeholder="İstifadəçi adı">
                                        </div>
                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="email">E-poçt ünvanı</label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" placeholder="E-poçt ünvanı">
                                        </div>
                                    </div>
                                    <div class="col-md-4 offset-md-4">
                                        <div class="form-group">
                                            <label for="password">Şifrə</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Şifrə">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="password_confirmation">Təkrar şifrə</label>
                                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Təkrar şifrə">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success btn-sm">Dəyişiklikləri yadda saxla</button>
                            <a href="{{ url()->previous() }}" class="btn btn-danger btn-sm">Geri</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
