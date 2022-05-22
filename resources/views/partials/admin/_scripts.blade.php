@livewireScripts
<script src="{{ _asset('js/admin.js') }}"></script>
<script src="{{ _asset('backend/js/adminlte.min.js') }}"></script>
@routeisnot('admin.products.index')
    <script>
        tinymce.init({
            selector: ".editor",
            plugins: "advlist autolink lists link image charmap preview anchor pagebreak code lists fullscreen",
            toolbar_mode: "floating",
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
            }
        });
    </script>
@endrouteisnot

@yield('scripts')
