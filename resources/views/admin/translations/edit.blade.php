@extends('layouts.admin')

@section('title', 'İstifadəçilər - Redaktə |')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tərcümələr - Redaktə</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Admin</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.translations.index', 'main') }}">Tərcümələr</a></li>
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
                <form action="{{ route('admin.translations.update', $translation) }}" method="POST" autocomplete="off">
                    @csrf
                    @method('PATCH')
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="key">İstifadəçi adı</label>
                                            <input type="text" class="form-control" id="key" name="key" value="{{ $translation->key }}" placeholder="Tərcümə üçün açar söz daxil edin">
                                            @error('key')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    @foreach ($locales as $locale)
                                    <div class="form-group col-md-6">
                                        <label for="{{ $locale->key }}" class="text-uppercase">{{ $locale->key }}</label>
                                        <textarea class="form-control" id="{{ $locale->key }}" name="{{ $locale->key }}" placeholder="{{ $locale->lang }} dili üçün mətni daxil edin">{{ $translation->text[$locale->key] }}</textarea>
                                        @error($locale->key)
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    @endforeach
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