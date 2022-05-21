<div class="row pb-4">
    <div class="col-12">
        @foreach ($products as $product)
            <div class="ml-4 mt-1 buttons">
                @if (!$loop->first)
                    <button wire:click.prevent="up({{ $product->id }})" class="btn btn-secondary btn-sm">&uarr;</button>
                @endif
                @if (!$loop->last)
                    <button wire:click.prevent="down({{ $product->id }})" class="btn btn-secondary btn-sm">&darr;</button>
                @endif
                <button class="btn btn-secondary btn-sm px-5 cursor-default">{{ $product->name }}</button>
                <button wire:click="changeColumn({{ $product->id }}, 'status')" class="btn btn-secondary btn-sm">
                    <i class="fa-solid fa-eye{{ !$product->status ? '-slash' : '' }}"></i>
                </button>
                <button wire:click="create({{ $product->id }})" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal">
                    <i data-id="{{ $product->id }}" class="fa-solid fa-plus"></i>
                </button>
                <a href="{{ route('admin.products.images.index', ['lang' => _lang(), 'product' => $product]) }}" class="btn btn-secondary btn-sm"><i class="fa-solid fa-images"></i></a>
                <button wire:click="edit({{ $product->id }})" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal"><i class="fa-solid fa-edit"></i></button>
                <button wire:click="deleteConfirm({{ $product->id }})" class="btn btn-secondary btn-sm"><i class="fa-solid fa-trash-alt"></i></button>

                @if ($product->children_count > 0)
                    @foreach ($product->children as $child)
                        <div class="ml-4 mt-1 buttons">
                            @if (!$loop->first)
                                <button wire:click="up({{ $child->id }})" class="btn btn-info btn-sm">&uarr;</button>
                            @endif
                            @if (!$loop->last)
                                <button wire:click="down({{ $child->id }})" class="btn btn-info btn-sm">&darr;</button>
                            @endif
                            <button class="btn btn-info btn-sm px-5 cursor-default">{{ $child->name }}</button>
                            <button wire:click="changeColumn({{ $child->id }}, 'status')" class="btn btn-info btn-sm">
                                <i class="fa-solid fa-eye{{ !$child->status ? '-slash' : '' }}"></i>
                            </button>
                            <button wire:click="create({{ $child->id }})" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal">
                                <i data-id="{{ $child->id }}" class="fa-solid fa-plus"></i>
                            </button>
                            <a href="{{ route('admin.products.images.index', ['lang' => _lang(), 'product' => $child]) }}" class="btn btn-info btn-sm">
                                <span class="badge bg-teal">{{ $child->images_count }}</span>
                                <i class="fa-solid fa-images"></i>
                            </a>
                            <button wire:click="edit({{ $child->id }})" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal"><i class="fa-solid fa-edit"></i></button>
                            <button wire:click="deleteConfirm({{ $child->id }})" class="btn btn-info btn-sm"><i class="fa-solid fa-trash-alt"></i></button>

                            @if ($child->children_count > 0)
                                @foreach ($child->children as $subChild)
                                    <div class="ml-4 mt-1 buttons">
                                        @if (!$loop->first)
                                            <button wire:click="up({{ $subChild->id }})" class="btn btn-primary btn-sm">&uarr;</button>
                                        @endif
                                        @if (!$loop->last)
                                            <button wire:click="down({{ $subChild->id }})" class="btn btn-primary btn-sm">&darr;</button>
                                        @endif
                                        <button class="btn btn-primary btn-sm px-5 cursor-default">{{ $subChild->name }}</button>
                                        <button wire:click="changeColumn({{ $subChild->id }}, 'status')" class="btn btn-primary btn-sm">
                                            <i class="fa-solid fa-eye{{ !$subChild->status ? '-slash' : '' }}"></i>
                                        </button>
                                        <a href="{{ route('admin.products.images.index', ['lang' => _lang(), 'product' => $subChild]) }}" class="btn btn-secondary btn-sm"><i class="fa-solid fa-images"></i></a>
                                        <button wire:click="edit({{ $subChild->id }})" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal"><i class="fa-solid fa-edit"></i></button>
                                        <button wire:click="deleteConfirm({{ $subChild->id }})" class="btn btn-primary btn-sm"><i class="fa-solid fa-trash-alt"></i></button>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    @endforeach
                @endif
            </div>
        @endforeach
    </div>
    <button wire:click="create(null)" class="btn btn-primary btn-lg plus-btn" data-toggle="modal" data-target="#modal">
        <i class="fa-solid fa-plus fa-xs text-center"></i>
    </button>
    <div wire:ignore.self class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="store-form" wire:submit.prevent="store" method="POST" autocomplete="off">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-name">@lang('admin.product')</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row mt-3 mx-auto">
                                <div class="col-md-2 mb-4">
                                    <div class="text-center">
                                        @if ($is_uploaded)
                                            <img id="previewImage" src="{{ $image->temporaryUrl() }}" class="profile-user-img img-circle" height="100px" width="100px">
                                        @elseif ($product_id)
                                            <img id="previewImage" src="{{ _asset('images/products', $image) }}" class="profile-user-img img-circle" height="100px" width="100px">
                                        @else
                                            <img id="previewImage" src="{{ _asset() }}" class="profile-user-img img-circle" height="100px" width="100px">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="image">@lang('admin.image')</label>
                                        <div class="custom-file">
                                            <input wire:model="image" type="file" accept="image/*" class="custom-file-input" id="image" name="image">
                                            <label class="custom-file-label">{{ $is_uploaded ? $image->getClientOriginalName() : __('admin.choose-file') }}</label>
                                        </div>
                                        @error('image')
                                            <small class="text-danger">
                                                <b>{{ $message }}</b>
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">@lang('admin.name')</label>
                                        <input wire:model="name" type="text" class="form-control" id="name" name="name" placeholder="@lang('admin.name')">
                                        @error('name')
                                            <small class="text-danger">
                                                <b>{{ $message }}</b>
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="text">@lang('admin.text')</label>
                                        <div wire:ignore>
                                            <textarea wire:model="text" class="form-control editor" rows="4" id="text" name="text" placeholder="@lang('admin.text')">@lang('admin.text')</textarea>
                                        </div>
                                        @error('text')
                                            <small class="text-danger">
                                                <b>{{ $message }}</b>
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="description">@lang('admin.meta-description')</label>
                                        <input wire:model="description" type="text" class="form-control" id="description" name="description" placeholder="@lang('admin.meta-description')">
                                        @error('description')
                                            <small class="text-danger">
                                                <b>{{ $message }}</b>
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="keywords">@lang('admin.meta-keywords')</label>
                                        <input wire:model="keywords" type="text" class="form-control" id="keywords" name="keywords" placeholder="@lang('admin.meta-keywords')">
                                        @error('keywords')
                                            <small class="text-danger">
                                                <b>{{ $message }}</b>
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            @if ($product_id)
                                <button type="submit" class="btn btn-outline-success btn-sm">@lang('admin.save')</button>
                            @else
                                <button type="submit" class="btn btn-outline-primary btn-sm">@lang('admin.add')</button>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script>
        window.addEventListener('Swal:success', event => {
            Swal.fire({
                toast: true,
                icon: 'success',
                title: event.detail.title,
                position: 'top-right',
                showConfirmButton: false,
                timerProgressBar: true,
                timer: 2000,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });
        });

        window.addEventListener('Swal:confirm', event => {
            Swal.fire({
                icon: 'warning',
                title: event.detail.title,
                text: event.detail.text,
                showCancelButton: true,
                confirmButtonText: '{{ __('admin.yes-delete-it') }}',
                confirmButtonColor: '#3085d6',
                cancelButtonText: '@lang('admin.cancel')',
                cancelButtonColor: '#d33',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.livewire.emit('delete', event.detail.id);
                    Swal.fire({
                        toast: true,
                        icon: 'success',
                        title: '{{ __('admin.deleted') }}',
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

        window.livewire.on('stored', () => {
            $('#modal').modal('hide');
        });

        tinymce.init({
            selector: ".editor",
            plugins: "advlist autolink lists link image charmap print preview hr anchor pagebreak code lists fullscreen",
            toolbar_mode: "scrolling",
            toolbar1: "undo redo | forecolor backcolor | bold italic | numlist bullist | alignleft aligncenter alignright alignjustify | outdent indent | link image | fullscreen code",
            toolbar2: " styles | fontfamily | fontsize",
            content_style: "@import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap'); body { font-family: inter, sans-serif; }",
            font_family_formats: "Andale Mono=andale mono,times; Arial=arial,helvetica,sans-serif; Arial Black=arial black,avant garde; Book Antiqua=book antiqua,palatino; Comic Sans MS=comic sans ms,sans-serif; Courier New=courier new,courier; Georgia=georgia,palatino; Helvetica=helvetica; Impact=impact,chicago; Inter=Inter, sans-serif; Poppins=Poppins, sans-serif; Symbol=symbol; Tahoma=tahoma,arial,helvetica,sans-serif; Terminal=terminal,monaco; Times New Roman=times new roman,times; Trebuchet MS=trebuchet ms,geneva; Verdana=verdana,geneva;",
            skin: "oxide{{ $darkmode ? '-dark' : '' }}",
            content_css: "{{ $darkmode ? 'dark' : '' }}",
            image_title: true,
            automatic_uploads: true,
            file_picker_types: 'image',
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function() {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function() {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), {
                            title: file.name
                        });
                    };
                };
                input.click();
            },
            setup: (editor) => {
                window.livewire.on('reset-text', () => {
                    editor.setContent('');
                });
                editor.on('init change', (e) => {
                    window.addEventListener('update-text', event => {
                        editor.setContent(@this.text);
                    });
                    editor.save();
                });
                editor.on('change', (e) => {
                    @this.set('text', editor.getContent());
                });
            }
        });
    </script>
@endsection
