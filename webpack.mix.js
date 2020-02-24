const mix = require('laravel-mix');
require('laravel-mix-svg-vue');

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

mix.webpackConfig({
    devServer: {
        proxy: {
            '*': 'http://localhost:8000'
        }
    }
});

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .svgVue({
    svgPath: 'resources/icons',
    extract: false,
    svgoSettings: [
        { removeTitle: true },
        { removeViewBox: true },
        { removeDimensions: false }
    ]
});
