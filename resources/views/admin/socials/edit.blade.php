@extends('layouts.admin')

@section('title', 'Sosial şəbəkələr - Redaktə |')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sosial şəbəkələr - Redaktə</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Admin</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.socials.index') }}">Sosial şəbəkələr</a></li>
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
                    <form action="{{ route('admin.socials.update', $social) }}" method="POST" autocomplete="off">
                        @csrf
                        @method('PATCH')
                        <div class="card">
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="icon">Icon</label>
                                                <div class="row">
                                                    <div id="col" class="col-11">
                                                        <select class="form-control" id="icon" name="icon">
                                                            @foreach ($icons as $name => $icon)
                                                                <option value="{{ $icon }}" {{ $social->icon == $icon ? 'selected' : '' }}>{{ $name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-1 text-center"><i id="selected-icon" class="{{ $social->icon }} fa-2x"></i></div>
                                                    <div class="col-12">
                                                        @error('icon')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="link">Link</label>
                                                <input type="text" class="form-control" id="link" name="link" value="{{ $social->link }}" placeholder="Sosial şəbəkənin linki">
                                                @error('link')
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
            $("select").on("change", function() {
                $("#col").removeClass();
                $("#col").addClass("col-11");
                $("#selected-icon").removeClass();
                $("#selected-icon").addClass($(this).val() + " fa-2x");
            });
        });
    </script>
@endsection