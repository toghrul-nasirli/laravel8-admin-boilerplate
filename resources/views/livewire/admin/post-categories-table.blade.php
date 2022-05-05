<div>
    <div class="row mb-3">
        <div class="col-md-5">
            <input wire:model.debounce.300ms="search" type="text" class="form-control" placeholder="@lang('admin.search')">
        </div>
        <div class="col-md-2 offset-md-2 mt-2 mt-md-0">
            <select wire:model="orderBy" class="form-control">
                <option value="position">@lang('admin.order')</option>
                <option value="id">ID</option>
                <option value="name">@lang('admin.name')</option>
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
        <a href="{{ route('admin.post-categories.create', _lang()) }}" class="btn btn-primary btn-lg plus-btn">
            <i class="fas fa-plus fa-xs text-center"></i>
        </a>
    </div>
    <table class="table table-bordered table-hover text-center">
        <thead>
            <tr>
                <th>№</th>
                <th>@lang('admin.name')</th>
                <th>@lang('admin.status')</th>
                <th><i class="fas fa-tools"></i></th>
                @if ($maxPosition > 1)
                    <th><i class="fas fa-sort"></i></th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($postCategories as $postCategory)
                <tr>
                    <td>{{ $postCategory->position }}</td>
                    <td>{{ $postCategory->name }}</td>
                    <td>
                        <a wire:click="changeColumn({{ $postCategory->id }}, 'status')" href="javascript:void(0)" class="px-1">
                            <i class="fas fa-eye{{ !$postCategory->status ? '-slash' : '' }}"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('admin.post-categories.edit', ['lang' => _lang(), 'post_category' => $postCategory]) }}" class="px-1"><i class="fas fa-edit"></i></a>
                        <a wire:click="deleteConfirm({{ $postCategory->id }})" href="javascript:void(0)" class="px-1"><i class="fas fa-trash-alt"></i></a>
                    </td>
                    @if ($maxPosition > 1)
                        <td>
                            @if ($postCategory->position > 1)
                                <a wire:click="up({{ $postCategory->id }})" href="javascript:void(0)" class="px-1">&uarr;</a>
                            @endif
                            @if ($postCategory->position < $maxPosition)
                                <a wire:click="down({{ $postCategory->id }})" href="javascript:void(0)" class="px-1">&darr;</a>
                            @endif
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
        {!! $postCategories->links() !!}
    </div>
</div>

@section('scripts')
    @include('partials.admin._swal')
@endsection