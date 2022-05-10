@extends('layouts.admin')

@section('title', __('admin.imageables') . ' - ' . __('admin.edit') . ' |')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>@lang('admin.imageables') - @lang('admin.edit')</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">@lang('admin.admin')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">@lang('admin.products')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.products.images.index', $image->imageable) }}">@lang('admin.imageables')</a></li>
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
                <form action="{{ route('admin.products.images.update', ['product' => $image->imageable, 'image' => $image]) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    @method('PATCH')
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-2 mb-4">
                                        <div class="text-center">
                                            <img id="previewFilename" src="{{ _asset('images/imageables', $image->filename) }}" class="profile-user-img img-circle" height="100px" width="100px">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="filename">@lang('admin.image')</label>
                                            <div class="custom-file">
                                                <input type="file" accept="image/*" class="custom-file-input" id="filename" name="filename">
                                                <label class="custom-file-label">@lang('admin.choose-file')</label>
                                            </div>
                                            @error('filename')
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
                            <button type="submit" class="btn btn-outline-success btn-sm">@lang('admin.save')</button>
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
        filename.onchange = evt => {
            const [file] = filename.files;
            if (file) {
                previewFilename.src = URL.createObjectURL(file);
            }
        }

        $('input[type="file"]').on('change', function() {
            $(this).next('label').text(this.files[0].filename);
        });
    });
</script>
@endsection