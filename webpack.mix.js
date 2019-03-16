const mix = require('laravel-mix');

require('laravel-mix-tailwind');

mix.js('resources/js/app.js', 'public/js')
   .js('resources/js/admin.js', 'public/js');

mix
    .sass('resources/scss/app.scss', 'public/assets/css')
    .tailwind();