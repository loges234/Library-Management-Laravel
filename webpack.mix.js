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

// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css');

   mix.styles([
    'public/assets/css/bootstrap.min.css',
    'public/css/font-awesome.min.css',
    'public/assets/css/jQueryUi.css',
    'public/assets/css/app.css',
  ], 'public/css/pack.css');

   mix.scripts([
    'public/assets/js/jquery-3.2.1.min.js',
    'public/assets/js/jQueryUI.js',
    'public/assets/js/bootstrap.min.js',
    'public/assets/js/material.min.js',
    'public/assets/js/perfect-scrollbar.jquery.min.js',
    'public/assets/js/bootstrap-notify.js',
    'public/assets/js/app-ui.js',
    'public/assets/js/app.js',

  ], 'public/js/pack.js');
