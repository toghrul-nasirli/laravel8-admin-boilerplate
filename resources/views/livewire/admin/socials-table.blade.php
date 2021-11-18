<div>
    <div class="row mb-3">
        <div class="col-md-5">
            <input wire:model.debounce.300ms="search" type="text" class="form-control" placeholder="Axtar...">
        </div>
        <div class="col-md-2 mt-2 mt-md-0">
            <select wire:model="status" class="form-control">
                <option value="all">Status</option>
                <option value="1">Aktiv</option>
                <option value="0">Deaktiv</option>
            </select>
        </div>
        <div class="col-md-2 mt-2 mt-md-0">
            <select wire:model="orderBy" class="form-control">
                <option value="position">Sıra</option>
                <option value="icon">Icon</option>
                <option value="link">Link</option>
            </select>
        </div>
        <div class="col-md-2 mt-2 mt-md-0">
            <select wire:model="orderDirection" class="form-control">
                <option value="asc">Artan</option>
                <option value="desc">Azalan</option>
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
    </div>
    <table class="table table-bordered table-hover text-center">
        <thead>
            <tr>
                <th>№</th>
                <th>Icon</th>
                <th>Link</th>
                <th>Status</th>
                <th><i class="fas fa-tools"></i></th>
                <th><i class="fas fa-sort"></i></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($socials as $social)
                <tr style="line-height: 80px;">
                    <td>{{ $social->position }}</td>
                    <td><i class="{{ $social->icon }} fa-2x"></i></td>
                    <td>
                        <a href="{{ $social->link }}" target="_blank">
                            {{ str_limit($social->link, 70) }}
                        </a>
                    </td>
                    <td>
                        <a wire:click="changeStatus({{ $social->id }})" href="javascript:void(0)" class="px-1">
                            <i class="fas fa-eye{{ !$social->status ? '-slash' : '' }}"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('admin.socials.edit', $social) }}" class="px-1"><i class="fas fa-edit"></i></a>
                        <a wire:click="deleteConfirm({{ $social->id }})" href="javascript:void(0)" class="px-1"><i class="fas fa-trash-alt"></i></a>
                    </td>
                    <td>
                        @if ($social->position > 1)
                            <a wire:click="up({{ $social->id }})" href="javascript:void(0)" class="px-1">&uarr;</a>
                        @endif
                        @if ($social->position < $maxPosition)
                            <a wire:click="down({{ $social->id }})" href="javascript:void(0)" class="px-1">&darr;</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
        {!! $socials->links() !!}
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
                confirmButtonText: 'Bəli, silinsin!',
                confirmButtonColor: '#3085d6',
                cancelButtonText: 'İmtina',
                cancelButtonColor: '#d33',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.livewire.emit('delete', event.detail.id);
                    Swal.fire({
                        toast: true,
                        icon: 'success',
                        title: 'Müvəffəqiyyətlə silindi!',
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