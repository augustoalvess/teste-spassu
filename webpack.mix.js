const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.styles([
    'resources/css/app.css'
], 'public/css/styles.css', 'public/css');
mix.scripts([
    'resources/js/app.js'
], 'public/js/scripts.js');

// register module
mix.styles([
    'resources/css/components/register/person/person-form.css'
], 'public/css/components/register.css', 'public/css');
mix.scripts([
    'resources/js/components/register/person/person-form.js',
    'resources/js/components/register/product/product-form.js'
], 'public/components/register.js');