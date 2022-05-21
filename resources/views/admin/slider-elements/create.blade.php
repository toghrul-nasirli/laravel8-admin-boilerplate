@extends('layouts.admin')

@section('title', __('admin.slider-elements') . ' - ' . __('admin.new') . ' |')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('admin.slider-elements') - @lang('admin.new')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">@lang('admin.admin')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.slider-elements.index') }}">@lang('admin.slider-elements')</a></li>
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
                    <form action="{{ route('admin.slider-elements.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="minitext">@lang('admin.minitext')</label>
                                                <input type="text" class="form-control" id="minitext" name="minitext" value="{{ old('minitext') }}" placeholder="@lang('admin.minitext')">
                                                @error('minitext')
                                                    <small class="text-danger">
                                                        <b>{{ $message }}</b>
                                                    </small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="link">@lang('admin.link')</label>
                                                <input type="text" class="form-control" id="link" name="link" value="{{ old('link') }}" placeholder="@lang('admin.link')">
                                                @error('link')
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
