const { mix } = require('laravel-mix');

mix.sass('resources/assets-dev/sass/space.scss', 'resources/assets/css')
   .js('resources/assets-dev/js/space.js', 'resources/assets/js')
   .sourceMaps();
