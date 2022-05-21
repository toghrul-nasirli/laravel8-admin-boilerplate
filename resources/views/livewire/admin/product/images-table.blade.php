<div>
    <div class="row mb-3">
        <div class="col-md-5">
            <input wire:model.debounce.300ms="search" type="text" class="form-control" placeholder="@lang('admin.search')">
        </div>
        <div class="col-md-2 offset-md-2 mt-2 mt-md-0">
            <select wire:model="orderBy" class="form-control">
                <option value="position">@lang('admin.order')</option>
                <option value="id">ID</option>
                <option value="filename">@lang('admin.filename')</option>
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
        <a href="{{ route('admin.products.images.create', ['lang' => _lang(), 'product' => $product]) }}" class="btn btn-primary btn-lg position-fixed plus-btn">
            <i class="fa-solid fa-plus fa-xs text-center"></i>
        </a>
    </div>
    <table class="table table-bordered table-hover text-center">
        <thead>
            <tr>
                <th>№</th>
                <th>@lang('admin.image')</th>
                <th>@lang('admin.status')</th>
                <th><i class="fa-solid fa-fascrewdriver-wrench"></i></th>
                @if ($maxPosition > 1)
                    <th><i class="fa-solid fa-sort"></i></th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($images as $image)
                <tr class="ln-60">
                    <td>{{ $image->position }}</td>
                    <td>
                        <img src="{{ _asset('images/imageables', $image->filename) }}" height="60px" width="80px">
                    </td>
                    <td>
                        <a wire:click="changeColumn({{ $image->id }}, 'status')" href="javascript:void(0)" class="px-1">
                            <i class="fa-solid fa-eye{{ !$image->status ? '-slash' : '' }}"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('admin.products.images.edit', ['lang' => _lang(), 'product' => $image->imageable, 'image' => $image]) }}" class="px-1"><i class="fa-solid fa-edit"></i></a>
                        <a wire:click="deleteConfirm({{ $image->id }})" href="javascript:void(0)" class="px-1"><i class="fa-solid fa-trash-alt"></i></a>
                    </td>
                    @if ($maxPosition > 1)
                        <td>
                            @if ($image->position > 1)
                                <a wire:click="up({{ $image->id }})" href="javascript:void(0)" class="px-1">&uarr;</a>
                            @endif
                            @if ($image->position < $maxPosition)
                                <a wire:click="down({{ $image->id }})" href="javascript:void(0)" class="px-1">&darr;</a>
                            @endif
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
        {!! $images->links() !!}
    </div>
</div>

@section('scripts')
    @include('partials.admin._swal')
@endsection
