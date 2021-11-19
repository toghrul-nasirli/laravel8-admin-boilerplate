@extends('layouts.admin')

@section('title', 'Tərcümələr - Yeni |')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tərcümələr - Yeni</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.users.index', lang()) }}">Admin</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.translations.index', ['lang' => lang(), 'group' => 'main']) }}">Tərcümələr</a></li>
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
                <form action="{{ route('admin.translations.store', ['lang' => lang(), 'group' => $group]) }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="key">Açar sözü</label>
                                            <input type="text" class="form-control" id="key" name="key" value="{{ old('key') }}" placeholder="Tərcümə üçün açar söz daxil edin">
                                            @error('key')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    @foreach ($locales as $locale)
                                    <div class="form-group col-md-6">
                                        <label for="{{ $locale->key }}" class="text-uppercase">{{ $locale->key }}</label>
                                        <textarea class="form-control" id="{{ $locale->key }}" name="{{ $locale->key }}" placeholder="{{ $locale->lang }} dili üçün mətni daxil edin">{{ old($locale->key) }}</textarea>
                                        @error($locale->key)
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    @endforeach
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