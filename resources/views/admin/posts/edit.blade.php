@extends('layouts.admin')

@section('title', 'Postlar - Redaktə |')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Postlar - Redaktə</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Admin</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Postlar</a></li>
                    <li class="breadcrumb-item active">Redaktə</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('admin.posts.update', $post) }}" method="POST" autocomplete="off">
                    @csrf
                    @method('PATCH')
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-2 mb-4">
                                        <div class="text-center">
                                            <img id="previewLogo" src="{{ _asset('images/settings', $settings->logo) }}" class="profile-user-img img-fluid img-circle" height="100px" width="100px">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="image">Şəkil</label>
                                            <div class="custom-file">
                                                <input type="file" accept="image/*" class="custom-file-input" id="image" name="image">
                                                <label class="custom-file-label">Fayl seçin</label>
                                            </div>
                                            @error('image')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="title">Başlıq</label>
                                            <input type="text" class="form-control" id="title" name="title" value="{{ $settings->title }}" placeholder="Post üçün başlıq daxil edin">
                                            @error('title')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="text">Haqqımızda</label>
                                            <textarea class="form-control" rows="4" id="text" name="text" placeholder="Post üçün mətn daxil edin">{{ $settings->text }}</textarea>
                                            @error('text')
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
</section>
@endsection

@section('scripts')
<script>
    $(function() {
        image.onchange = evt => {
            const [file] = image.files;
            if (file) {
                previewLogo.src = URL.createObjectURL(file);
            }
        }

        $('input[type="file"]').on('change', function() {
            $(this).next('label').text(this.files[0].name);
        });
    });
</script>
@endsection