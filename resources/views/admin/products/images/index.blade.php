@extends('layouts.admin')

@section('title', __('admin.imageables') . ' |')

@section('styles')
<link rel="stylesheet" href="{{ asset('backend/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>@lang('admin.imageables')</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">@lang('admin.admin')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">@lang('admin.products')</a></li>
                    <li class="breadcrumb-item active">@lang('admin.imageables')</li>
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
                        @livewire('admin.product.images-table', ['product' => $product])
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection