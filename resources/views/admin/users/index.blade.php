@extends('layouts.admin')

@section('title', 'İstifadəçilər |')

@section('styles')
<link rel="stylesheet" href="{{ asset('backend/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>İstifadəçilər</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Admin</a></li>
                    <li class="breadcrumb-item active">İstifadəçilər</li>
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
                        @livewire('admin.users-table')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script src="{{ asset('backend/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend/js/responsive.bootstrap4.min.js') }}"></script>

<script>
    $(function() {
        $('#table').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": false,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
@endsection