@extends('layouts.admin')

@section('title', __('admin.posts') . ' - ' . __('admin.new') . ' |')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>@lang('admin.posts') - @lang('admin.new')</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">@lang('admin.admin')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">@lang('admin.posts')</a></li>
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
                <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-2 mb-4">
                                        <div class="text-center">
                                            <img id="previewImage" src="{{ _asset() }}" class="profile-user-img img-circle" height="100px" width="100px">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="image">@lang('admin.image')</label>
                                            <div class="custom-file">
                                                <input type="file" accept="image/*" class="custom-file-input" id="image" name="image">
                                                <label class="custom-file-label">@lang('admin.choose-file')</label>
                                            </div>
                                            @error('image')
                                                <small class="text-danger">
                                                    <b>{{ $message }}</b>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title">@lang('admin.title')</label>
                                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="@lang('admin.title')">
                                            @error('title')
                                                <small class="text-danger">
                                                    <b>{{ $message }}</b>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    @livewire('admin.create-post-category')
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="text">@lang('admin.text')</label>
                                            <textarea class="form-control editor" rows="4" id="text" name="text" placeholder="@lang('admin.text')">{{ old('text') }}</textarea>
                                            @error('text')
                                                <small class="text-danger">
                                                    <b>{{ $message }}</b>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="description">@lang('admin.meta-description')</label>
                                            <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}" placeholder="@lang('admin.meta-description')">
                                            @error('description')
                                                <small class="text-danger">
                                                    <b>{{ $message }}</b>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="keywords">@lang('admin.meta-keywords')</label>
                                            <input type="text" class="form-control" id="keywords" name="keywords" value="{{ old('keywords') }}" placeholder="@lang('admin.meta-keywords')">
                                            @error('keywords')
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
                            <button type="submit" class="btn btn-outline-primary btn-sm">@lang('admin.add')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    $(function() {
        image.onchange = evt => {
            const [file] = image.files;
            if (file) {
                previewImage.src = URL.createObjectURL(file);
            }
        }

        $('input[type="file"]').on('change', function() {
            $(this).next('label').text(this.files[0].name);
        });
    });
</script>
@endsection