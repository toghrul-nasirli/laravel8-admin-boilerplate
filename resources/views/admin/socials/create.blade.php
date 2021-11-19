@extends('layouts.admin')

@section('title', 'Sosial şəbəkələr - Yeni |')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sosial şəbəkələr - Yeni</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.users.index', lang()) }}">Admin</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.socials.index', lang()) }}">Sosial şəbəkələr</a></li>
                        <li class="breadcrumb-item active">Yeni</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.socials.store', lang()) }}" method="POST" autocomplete="off">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="icon">Icon</label>
                                                <div class="row">
                                                    <div id="col" class="col-12">
                                                        <select class="form-control" id="icon" name="icon">
                                                            <option value="">Seçin</option>
                                                            @foreach ($icons as $name => $icon)
                                                                <option value="{{ $icon }}">{{ $name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-1 text-center"><i id="selected-icon"></i></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="link">Link</label>
                                                <input type="text" class="form-control" id="link" name="link" value="{{ old('link') }}" placeholder="Sosial şəbəkənin linki">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">Əlavə et</button>
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
            $("select").on("change", function() {
                $("#col").removeClass();
                $("#col").addClass("col-11");
                $("#selected-icon").removeClass();
                $("#selected-icon").addClass($(this).val() + " fa-2x");
            });
        });
    </script>
@endsection