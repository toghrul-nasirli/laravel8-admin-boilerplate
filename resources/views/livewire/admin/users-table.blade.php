<div>
    <div class="row mb-3">
        <div class="col-md-5">
            <input wire:model.debounce.300ms="search" type="text" class="form-control" placeholder="Axtar...">
        </div>
        <div class="col-md-2 mt-2 mt-md-0">
            <select wire:model="is_admin" class="form-control">
                <option value="all">@lang('admin.role')</option>
                <option value="1">@lang('admin.admin')</option>
                <option value="0">@lang('admin.user')</option>
            </select>
        </div>
        <div class="col-md-2 mt-2 mt-md-0">
            <select wire:model="orderBy" class="form-control">
                <option value="id">ID</option>
                <option value="firstname">@lang('admin.name')</option>
                <option value="lastname">@lang('admin.surname')</option>
                <option value="email">@lang('admin.email')</option>
            </select>
        </div>
        <div class="col-md-2 mt-2 mt-md-0">
            <select wire:model="orderDirection" class="form-control">
                <option value="asc">@lang('admin.ascending')</option>
                <option value="desc">@lang('admin.descending')</option>
            </select>
        </div>
        <div class="col-md-1 mt-2 mt-md-0">
            <select wire:model="perPage" class="form-control">
                <option>10</option>
                <option>25</option>
                <option>50</option>
                <option>100</option>
            </select>
        </div>
        <a href="{{ route('admin.users.create', _lang()) }}" class="btn btn-primary btn-lg position-fixed" style="right: 40px; bottom: 40px;">
            <i class="fas fa-plus fa-xs text-center" style="line-height:25px;"></i>
        </a>
    </div>
    <table class="table table-bordered table-hover text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>@lang('admin.username')</th>
                <th>@lang('admin.email')</th>
                <th>@lang('admin.role')</th>
                <th><i class="fas fa-tools"></i></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->is_admin ? 'Admin' : 'İstifadəçi' }}</td>
                <td>
                    <a href="{{ route('admin.users.edit', ['lang' => _lang(), 'user' => $user]) }}" class="px-1"><i class="fas fa-edit"></i></a>
                    <a wire:click="deleteConfirm({{ $user->id }})" href="javascript:void(0)" class="px-1"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
        {!! $users->links() !!}
    </div>
</div>

@section('scripts')
    <script>
        window.addEventListener('Swal:confirm', event => {
            Swal.fire({
                icon: 'warning',
                title: event.detail.title,
                text: event.detail.text,
                showCancelButton: true,
                confirmButtonText: '@lang('admin.yes-delete-it')',
                confirmButtonColor: '#3085d6',
                cancelButtonText: '@lang('admin.cancel')',
                cancelButtonColor: '#d33',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.livewire.emit('delete', event.detail.id);
                    Swal.fire({
                        toast: true,
                        icon: 'success',
                        title: '@lang('admin.deleted')',
                        position: 'top-right',
                        showConfirmButton: false,
                        timerProgressBar: true,
                        timer: 2000,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });
                }
            });
        });
    </script>
@endsection