@livewireScripts
<script src="{{ asset('js/admin.js') }}"></script>
<script src="{{ asset('backend/js/adminlte.min.js') }}"></script>
@if (!_isRoute('admin.products'))
    @if($darkmode)
        <script>
            tinymce.init({
                selector: '.editor',
                plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak code lists',
                toolbar: 'undo redo | styleselect | fontsizeselect | forecolor | bold italic | numlist bullist | alignleft aligncenter alignright alignjustify | outdent indent | link image | code', 
                toolbar_mode: 'floating',
                force_br_newlines : false,
                forced_root_block : '',
                skin: "oxide-dark",
                content_css: "dark",
            });
        </script>
    @else
        <script>
            tinymce.init({
                selector: '.editor',
                plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak code lists',
                toolbar: 'undo redo | styleselect | fontsizeselect | forecolor | bold italic | numlist bullist | alignleft aligncenter alignright alignjustify | outdent indent | link image | code', 
                toolbar_mode: 'floating',
                force_br_newlines : false,
                forced_root_block : '',
            });
        </script>
    @endif
@endif
@yield('scripts')