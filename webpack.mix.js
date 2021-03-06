const mix = require('laravel-mix');

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
mix.setPublicPath('/');
mix.sass('resources/sass/alert.scss', 'assets/custom/css');
mix.sass('resources/sass/scss-model.scss', 'assets/custom/css');
mix.sass('resources/sass/my-listing.scss', 'assets/custom/css');
