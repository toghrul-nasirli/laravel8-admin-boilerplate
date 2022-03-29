@extends('layouts.admin')

@section('title', __('admin.categories') . ' - ' . __('admin.new') . ' |')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>@lang('admin.categories') - @lang('admin.new')</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">@lang('admin.admin')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">@lang('admin.posts')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.post-categories.index') }}">@lang('admin.categories')</a></li>
                    <li class="breadcrumb-item active">@lang('admin.add')</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('admin.post-categories.store') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">@lang('admin.name')</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="@lang('admin.post-categories-placeholder-name')">
                                            @error('name')
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
