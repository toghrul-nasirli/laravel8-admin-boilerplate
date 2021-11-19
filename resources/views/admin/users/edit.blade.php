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
                    <li class="breadcrumb-item"><a href="{{ route('admin.users.index', lang()) }}">Admin</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.users.index', lang()) }}">İstifadəçilər</a></li>
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
                <form action="{{ route('admin.users.update', ['lang' => lang(), 'user' => $user]) }}" method="POST" autocomplete="off">
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
                                            @error('is_admin')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="username">İstifadəçi adı</label>
                                            <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}" placeholder="İstifadəçi adı">
                                            @error('username')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="email">E-poçt ünvanı</label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" placeholder="E-poçt ünvanı">
                                            @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 offset-md-4">
                                        <div class="form-group">
                                            <label for="password">Şifrə</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Şifrə">
                                            @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="password_confirmation">Təkrar şifrə</label>
                                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Təkrar şifrə">
                                            @error('password_confirmation')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
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