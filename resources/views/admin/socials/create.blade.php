@extends('layouts.admin')

@section('title', __('admin.socials') . ' - ' . __('admin.new') . ' |')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('admin.socials') - @lang('admin.new')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">@lang('admin.admin')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.socials.index') }}">@lang('admin.socials')</a></li>
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
                    <form action="{{ route('admin.socials.store') }}" method="POST" autocomplete="off">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="icon">@lang('admin.icon')</label>
                                                <div class="row">
                                                    <div id="col" class="col-12">
                                                        <select class="form-control" id="icon" name="icon">
                                                            <option value="">@lang('admin.choose')</option>
                                                            @foreach ($icons as $name => $icon)
                                                                <option value="{{ $icon }}">{{ $name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-1 text-center"><i id="selected-icon"></i></div>
                                                    <div class="col-12">
                                                        @error('icon')
                                                            <small class="text-danger">
                                                                <b>{{ $message }}</b>
                                                            </small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
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
            $("select").on("change", function() {
                $("#col").removeClass();
                $("#col").addClass("col-11");
                $("#selected-icon").removeClass();
                $("#selected-icon").addClass($(this).val() + " fa-2x");
            });
        });
    </script>
@endsection