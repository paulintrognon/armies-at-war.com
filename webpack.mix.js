let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')
   .copy('resources/assets/css/bootstrap.css', 'public/css/bootstrap.css')
   .copy('resources/assets/css/bootstrap-extend.css', 'public/css/bootstrap-extend.css')
   .copy('resources/assets/css/remark.css', 'public/css/remark.css')
   .sass('resources/assets/sass/app.scss', 'public/css');
