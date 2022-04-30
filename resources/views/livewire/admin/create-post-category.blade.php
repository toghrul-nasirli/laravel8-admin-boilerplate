<div class="col-12 row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="category_id">@lang('admin.categories')</label>
            <select class="form-control" id="category_id" name="category_id">
                <option>@lang('admin.choose')</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ _isRoute('admin.posts.edit') ? ($category->id == $post->category_id ? 'selected' : '') : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <small class="text-danger">
                    <b>{{ $message }}</b>
                </small>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <label for="name">@lang('admin.new')</label>
        <div class="row">
            <div class="col-md-9">
                <div class="form-group">
                    <input wire:model="name" type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="@lang('admin.post-categories-placeholder-name')">
                    @error('name')
                        <small class="text-danger">
                            <b>{{ $message }}</b>
                        </small>
                    @enderror
                </div>
            </div>
            <div class="col-md-3">
                <button wire:click.prevent="store" type="submit" class="btn btn-primary">@lang('admin.add')</button>
            </div>
        </div>
    </div>
</div>