<div>
    <div class="row mb-3">
        <div class="col-md-5">
            <input wire:model.debounce.300ms="search" type="text" class="form-control" placeholder="@lang('admin.search')">
        </div>
        <div class="col-md-2 mt-2 mt-md-0">
            <select wire:model="status" class="form-control">
                <option value="all">@lang('admin.status')</option>
                <option value="1">@lang('admin.ascending')</option>
                <option value="0">@lang('admin.descending')</option>
            </select>
        </div>
        <div class="col-md-2 mt-2 mt-md-0">
            <select wire:model="orderBy" class="form-control">
                <option value="position">@lang('admin.order')</option>
                <option value="icon">@lang('admin.icon')</option>
                <option value="link">@lang('admin.link')</option>
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
        <a href="{{ route('admin.socials.create', _lang()) }}" class="btn btn-primary btn-lg plus-btn">
            <i class="fa-solid fa-plus fa-xs text-center"></i>
        </a>
    </div>
    <table class="table table-bordered table-hover text-center">
        <thead>
            <tr>
                <th>№</th>
                <th>@lang('admin.icon')</th>
                <th>@lang('admin.link')</th>
                <th>@lang('admin.status')</th>
                <th><i class="fa-solid fa-fascrewdriver-wrench"></i></th>
                @if ($maxPosition > 1)
                    <th><i class="fa-solid fa-sort"></i></th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($socials as $social)
                <tr>
                    <td>{{ $social->position }}</td>
                    <td><i class="{{ $social->icon }} fa-2x"></i></td>
                    <td>
                        <a href="{{ $social->link }}" target="_blank">
                            {{ _strLimit($social->link, 70) }}
                        </a>
                    </td>
                    <td>
                        <a wire:click="changeColumn({{ $social->id }}, 'status')" href="javascript:void(0)" class="px-1">
                            <i class="fa-solid fa-eye{{ !$social->status ? '-slash' : '' }}"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('admin.socials.edit', ['lang' => _lang(), 'social' => $social]) }}" class="px-1"><i class="fa-solid fa-edit"></i></a>
                        <a wire:click="deleteConfirm({{ $social->id }})" href="javascript:void(0)" class="px-1"><i class="fa-solid fa-trash-alt"></i></a>
                    </td>
                    @if ($maxPosition > 1)
                        <td>
                            @if ($social->position > 1)
                                <a wire:click="up({{ $social->id }})" href="javascript:void(0)" class="px-1">&uarr;</a>
                            @endif
                            @if ($social->position < $maxPosition)
                                <a wire:click="down({{ $social->id }})" href="javascript:void(0)" class="px-1">&darr;</a>
                            @endif
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
        {!! $socials->links() !!}
    </div>
</div>

@section('scripts')
    @include('partials.admin._swal')
@endsection
