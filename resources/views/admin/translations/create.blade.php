@extends('layouts.admin')

@section('title', __('admin.translates') . ' - ' . __('admin.new') . ' |')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>@lang('admin.translates') - @lang('admin.new')</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">@lang('admin.admin')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.translations.index', 'main') }}">@lang('admin.translates')</a></li>
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
                <form action="{{ route('admin.translations.store', $group) }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="key">@lang('admin.key')</label>
                                            <input type="text" class="form-control" id="key" name="key" value="{{ old('key') }}" placeholder="@lang('admin.key-placeholder')">
                                            @error('key')
                                                <small class="text-danger">
                                                    <b>{{ $message }}</b>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    @foreach ($locales as $locale)
                                    <div class="form-group col-md-6">
                                        <label for="{{ $locale->key }}" class="text-uppercase">{{ $locale->key }}</label>
                                        <textarea class="form-control editor" id="{{ $locale->key }}" name="{{ $locale->key }}" placeholder="@lang('admin.locale-placeholder', ['locale' => $locale->lang])">{{ old($locale->key) }}</textarea>
                                        @error($locale->key)
                                            <small class="text-danger">
                                                <b>{{ $message }}</b>
                                            </small>
                                        @enderror
                                    </div>
                                    @endforeach
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