@extends('layouts.admin')

@section('title', __('admin.translates') . ' - ' . __('admin.edit') . ' |')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>@lang('admin.translates') - @lang('admin.edit')</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">@lang('admin.admin')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.translations.index', 'main') }}">@lang('admin.translates')</a></li>
                    <li class="breadcrumb-item active">@lang('admin.edit')</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('admin.translations.update', $translation) }}" method="POST" autocomplete="off">
                    @csrf
                    @method('PATCH')
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="key">@lang('admin.key')</label>
                                            <input type="text" class="form-control" id="key" name="key" value="{{ $translation->key }}" placeholder="@lang('admin.key-placeholder')">
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
                                        <textarea class="form-control editor" id="{{ $locale->key }}" name="{{ $locale->key }}" placeholder="@lang('admin.locale-placeholder', ['locale' => $locale->lang])">{{ $translation->text[$locale->key] }}</textarea>
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
                            <button type="submit" class="btn btn-success btn-sm">@lang('admin.save')</button>
                            <a href="{{ url()->previous() }}" class="btn btn-danger btn-sm">@lang('admin.back')</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection