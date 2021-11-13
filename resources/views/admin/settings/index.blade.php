@extends('layouts.admin')

@section('title', 'Tənzimləmələr |')

@section('styles')
<link rel="stylesheet" href="{{ asset('backend/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tənzimləmələr</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Admin</a></li>
                    <li class="breadcrumb-item active">Tənzimləmələr</li>
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
                        <form action="{{ route('admin.settings.update', $settings) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            @method('PATCH')
                            <div class="card">
                                <div class="card-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-2 mb-4">
                                                <div class="text-center">
                                                    <img id="previewLogo" src="{{ img('settings', $settings->logo) }}" class="profile-user-img img-fluid img-circle" style="height: 100px !important; width: 100px !important;">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="logo">Logo</label>
                                                    <div class="custom-file">
                                                        <input type="file" accept="image/*" class="custom-file-input" id="logo" name="logo">
                                                        <label class="custom-file-label">{{ $settings->logo }}</label>
                                                    </div>
                                                    @error('logo')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="text-center">
                                                    <img id="previewFavicon" src="{{ img('settings', $settings->favicon) }}" class="profile-user-img img-fluid img-circle" style="height: 100px !important; width: 100px !important;">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="favicon">Favicon</label>
                                                    <div class="custom-file">
                                                        <input type="file" accept="image/*" class="custom-file-input" id="favicon" name="favicon">
                                                        <label class="custom-file-label">{{ $settings->favicon }}</label>
                                                    </div>
                                                    @error('favicon')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="email">E-poçt ünvanı</label>
                                                    <input type="email" class="form-control" id="email" name="email" value="{{ $settings->email }}" placeholder="E-poçt ünvanı">
                                                    @error('email')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="title">Başlıq</label>
                                                    <input type="text" class="form-control" id="title" name="title" value="{{ $settings->title }}" placeholder="Xidmət adı daxil edin">
                                                    @error('title')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="about">Haqqımızda</label>
                                                    <textarea class="form-control" rows="4" id="about" name="about">{{ $settings->about }}</textarea>
                                                    @error('about')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">META Description</label>
                                                    <input type="text" class="form-control" id="description" name="description" value="{{ $settings->description }}" placeholder="META Description daxil edin">
                                                    @error('description')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="keywords">META Keywords</label>
                                                    <input type="text" class="form-control" id="keywords" name="keywords" value="{{ $settings->keywords }}" placeholder="META Keywords daxil edin">
                                                    @error('keywords')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success btn-sm">Dəyişiklikləri yadda saxla</button>
                                    <a href="{{ url()->previous() }}" class="btn btn-danger btn-sm">Geri</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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

            $('#sitemap-btn').on('click', function() {
                var $temp = $("<input>");
                let fileName = $('+ input', this).val();
                $('body').append($temp);
                $temp.val(fileName).select();
                document.execCommand("copy");
                $temp.remove();

                let currentVal = $('textarea[name=robots]').val();
                $('textarea[name=robots]').val('');
                $('textarea[name=robots]').val(`${currentVal}\nSitemap: ${fileName}`);
            });
        });
    </script>
@endsection
