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

mix
    .js('resources/js/app.js', 'public/js')
    .vue()
    .js('resources/js/header.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css')
    .postCss('resources/css/font-family.css', 'public/css')
    .postCss('resources/css/rvmp.css', 'public/css');
    
    mix.options({
        postCss: [
            require('tailwindcss')
        ],
        hmrOptions: {
            host: '127.0.0.1',
            port: 8085
        }
    });