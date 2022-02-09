@extends('layouts.admin')

@section('title', __('admin.settings') . ' |')

@section('styles')
<link rel="stylesheet" href="{{ asset('backend/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>@lang('admin.settings')</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">@lang('admin.admin')</a></li>
                    <li class="breadcrumb-item active">@lang('admin.settings')</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    @method('PATCH')
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">@lang('admin.main-settings')</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Bağla">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-2 mb-4">
                                        <div class="text-center">
                                            <img id="previewLogo" src="{{ _asset('images/settings', $settings->logo) }}" class="profile-user-img img-circle" height="100px" width="100px" style="object-fit: contain;">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="logo">@lang('admin.logo')</label>
                                            <div class="custom-file">
                                                <input type="file" accept="image/*" class="custom-file-input" id="logo" name="logo">
                                                <label class="custom-file-label">{{ $settings->logo }}</label>
                                            </div>
                                            @error('logo')
                                                <small class="text-danger">
                                                    <b>{{ $message }}</b>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="text-center">
                                            <img id="previewFavicon" src="{{ _asset('images/settings', $settings->favicon) }}" class="profile-user-img img-circle" height="100px" width="100px" style="object-fit: contain;">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="favicon">@lang('admin.favicon')</label>
                                            <div class="custom-file">
                                                <input type="file" accept="image/*" class="custom-file-input" id="favicon" name="favicon">
                                                <label class="custom-file-label">{{ $settings->favicon }}</label>
                                            </div>
                                            @error('favicon')
                                                <small class="text-danger">
                                                    <b>{{ $message }}</b>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="title">@lang('admin.title')</label>
                                            <input type="text" class="form-control" id="title" name="title" value="{{ $settings->title }}" placeholder="Sayt üçün başlıq daxil edin">
                                            @error('title')
                                                <small class="text-danger">
                                                    <b>{{ $message }}</b>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">@lang('admin.email')</label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ $settings->email }}" placeholder="E-poçt ünvanı">
                                            @error('email')
                                                <small class="text-danger">
                                                    <b>{{ $message }}</b>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="career_email">@lang('admin.career-email')</label>
                                            <input type="email" class="form-control" id="career_email" name="career_email" value="{{ $settings->career_email }}" placeholder="Karyera e-poçt ünvanı">
                                            @error('career_email')
                                                <small class="text-danger">
                                                    <b>{{ $message }}</b>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">@lang('admin.phone')</label>
                                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $settings->phone }}" placeholder="Telefon">
                                            @error('phone')
                                                <small class="text-danger">
                                                    <b>{{ $message }}</b>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="career_phone">@lang('admin.career-phone')</label>
                                            <input type="text" class="form-control" id="career_phone" name="career_phone" value="{{ $settings->career_phone }}" placeholder="Karyera telefon">
                                            @error('career_phone')
                                                <small class="text-danger">
                                                    <b>{{ $message }}</b>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="about">@lang('admin.about')</label>
                                            <textarea class="form-control editor" rows="4" id="about" name="about" placeholder="Haqqınızda məlumat daxil edin">{{ $settings->about }}</textarea>
                                            @error('about')
                                                <small class="text-danger">
                                                    <b>{{ $message }}</b>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="privacy_policy">@lang('admin.privacy-policy')</label>
                                            <textarea class="form-control editor" rows="4" id="privacy_policy" name="privacy_policy" placeholder="Məxfilik siyasətini daxil edin">{{ $settings->privacy_policy }}</textarea>
                                            @error('privacy_policy')
                                                <small class="text-danger">
                                                    <b>{{ $message }}</b>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="terms_and_conditions">@lang('admin.terms-and-conditions')</label>
                                            <textarea class="form-control editor" rows="4" id="terms_and_conditions" name="terms_and_conditions" placeholder="Qaydalar və şərtləri daxil edin">{{ $settings->terms_and_conditions }}</textarea>
                                            @error('terms_and_conditions')
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
                            <button type="submit" class="btn btn-success btn-sm">@lang('admin.save')</button>
                        </div>
                    </div>
                </form>
                <form action="{{ route('admin.settings.update-seo') }}" method="POST" autocomplete="off">
                    @csrf
                    @method('PATCH')
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">SEO</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Bağla">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="description">META Description</label>
                                            <input type="text" class="form-control" id="description" name="description" value="{{ $settings->description }}" placeholder="META Description daxil edin">
                                            @error('description')
                                                <small class="text-danger">
                                                    <b>{{ $message }}</b>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="keywords">META Keywords</label>
                                            <input type="text" class="form-control" id="keywords" name="keywords" value="{{ $settings->keywords }}" placeholder="META Keywords daxil edin">
                                            @error('keywords')
                                                <small class="text-danger">
                                                    <b>{{ $message }}</b>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="robots">Robots.txt</label>
                                            <textarea class="form-control" rows="4" id="robots" name="robots" placeholder="Robots.txt faylı üçün məzmun daxil edin">{{ $robots }}</textarea>
                                            @error('robots')
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
                            <button type="submit" class="btn btn-success btn-sm">@lang('admin.save')</button>
                            <a href="{{ route('admin.settings.update-sitemap') }}" class="btn btn-dark btn-sm">@lang('admin.update-sitemap')</a>
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
        logo.onchange = evt => {
            const [file] = logo.files;
            if (file) {
                previewLogo.src = URL.createObjectURL(file);
            }
        }
        favicon.onchange = evt => {
            const [file] = favicon.files;
            if (file) {
                previewFavicon.src = URL.createObjectURL(file);
            }
        }

        $('input[type="file"]').on('change', function() {
            $(this).next('label').text(this.files[0].name);
        });
    });
</script>
@endsection