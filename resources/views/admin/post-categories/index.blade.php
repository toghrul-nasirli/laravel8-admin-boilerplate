@extends('layouts.admin')

@section('title', __('admin.categories') . ' |')

@section('styles')
<link rel="stylesheet" href="{{ asset('backend/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>@lang('admin.categories')</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">@lang('admin.admin')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">@lang('admin.posts')</a></li>
                    <li class="breadcrumb-item active">@lang('admin.categories')</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @livewire('admin.post-categories-table')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
