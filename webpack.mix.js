const mix = require('laravel-mix');

mix.js('resources/js/admin.js', 'public/js')
    .sass('resources/sass/admin.scss', 'public/css')
    .js('resources/js/front.js', 'public/js')
    .sass('resources/sass/front.scss', 'public/css')
    .copy('node_modules/tinymce', 'public/js')
    .sourceMaps();
