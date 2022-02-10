<div>
    <div class="row mb-3">
        <div class="col-md-5">
            <input wire:model.debounce.300ms="search" type="text" class="form-control" placeholder="@lang('admin.search')">
        </div>
        <div class="col-md-2 offset-md-2 mt-2 mt-md-0">
            <select wire:model="orderBy" class="form-control">
                <option value="position">@lang('admin.order')</option>
                <option value="id">ID</option>
                <option value="title">@lang('admin.title')</option>
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
        <a href="{{ route('admin.news.create', _lang()) }}" class="btn btn-primary btn-lg position-fixed" style="right: 40px; bottom: 40px;">
            <i class="fas fa-plus fa-xs text-center"></i>
        </a>
    </div>
    <table class="table table-bordered table-hover text-center">
        <thead>
            <tr>
                <th>№</th>
                <th>@lang('admin.image')</th>
                <th>@lang('admin.title')</th>
                <th>@lang('admin.status')</th>
                <th><i class="fas fa-tools"></i></th>
                @if (count($allNews) > 1)
                    <th><i class="fas fa-sort"></i></th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($allNews as $news)
                <tr style="line-height: 60px;">
                    <td>{{ $news->position }}</td>
                    <td><img src="{{ _asset('images/news', $news->image) }}" height="60px" width="80px" style="object-fit: contain;"></td>
                    <td>{{ $news->title }}</td>
                    <td>
                        <a wire:click="changeStatus({{ $news->id }})" href="javascript:void(0)" class="px-1">
                            <i class="fas fa-eye{{ !$news->status ? '-slash' : '' }}"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('admin.news.edit', ['lang' => _lang(), 'news' => $news]) }}" class="px-1"><i class="fas fa-edit"></i></a>
                        <a wire:click="deleteConfirm({{ $news->id }})" href="javascript:void(0)" class="px-1"><i class="fas fa-trash-alt"></i></a>
                    </td>
                    @if (count($allNews) > 1)
                        <td>
                            @if ($news->position > 1)
                                <a wire:click="up({{ $news->id }})" href="javascript:void(0)" class="px-1">&uarr;</a>
                            @endif
                            @if ($news->position < $maxPosition)
                                <a wire:click="down({{ $news->id }})" href="javascript:void(0)" class="px-1">&darr;</a>
                            @endif
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
        {!! $allNews->links() !!}
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