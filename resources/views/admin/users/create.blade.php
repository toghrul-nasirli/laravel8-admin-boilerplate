@extends('layouts.admin')

@section('title', __('admin.users') . ' - ' . __('admin.new') . ' |')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>@lang('admin.users') - @lang('admin.new')</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">@lang('admin.admin')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">@lang('admin.users')</a></li>
                    <li class="breadcrumb-item active">@lang('admin.new')</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('admin.users.store') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="is_admin">@lang('admin.role')</label>
                                            <select class="form-control" id="is_admin" name="is_admin">
                                                <option>@lang('admin.choose')</option>
                                                <option value="1">@lang('admin.admin')</option>
                                                <option value="0">@lang('admin.user')</option>
                                            </select>
                                            @error('is_admin')
                                                <small class="text-danger">
                                                    <b>{{ $message }}</b>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="username">@lang('admin.username')</label>
                                            <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" placeholder="@lang('admin.username')">
                                            @error('username')
                                                <small class="text-danger">
                                                    <b>{{ $message }}</b>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="email">@lang('admin.email')</label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="@lang('admin.email')">
                                            @error('email')
                                                <small class="text-danger">
                                                    <b>{{ $message }}</b>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 offset-md-4">
                                        <div class="form-group">
                                            <label for="password">@lang('admin.password')</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="@lang('admin.password')">
                                            @error('password')
                                                <small class="text-danger">
                                                    <b>{{ $message }}</b>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="password_confirmation">@lang('admin.password_confirmation')</label>
                                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="@lang('admin.password_confirmation')">
                                            @error('password_confirmation')
                                                <small class="text-danger">
                                                    <b>{{ $message }}</b>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">@lang('admin.add')</button>
                            <a href="{{ url()->previous() }}" class="btn btn-danger btn-sm">@lang('admin.back')</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection