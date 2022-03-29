@extends('layouts.admin')

@section('title', __('admin.socials') . ' |')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('admin.socials')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="{{ route('admin.socials.index') }}">@lang('admin.admin')</a></li>
                        <li class="breadcrumb-item active">@lang('admin.socials')</li>
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
                            @livewire('admin.socials-table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection