const mix = require('laravel-mix');
require('laravel-mix-svg-vue');
const tailwindcss = require('tailwindcss');
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
    .js('resources/js/homepage/main.js', 'public/js/homepage')
    .js('resources/js/themes/*.js', 'public/js/themes')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/app-vuetify.scss', 'public/css')
    .sass('resources/sass/homepage/main.scss', 'public/css/homepage')
    .sass('resources/sass/themes/new/theme1001.scss', 'public/css/themes')
    .sass('resources/sass/themes/new/theme2001.scss', 'public/css/themes')
    .sass('resources/sass/themes/new/theme2002.scss', 'public/css/themes')
    .svgVue({
        svgPath: 'public/icons',
        extract: false,
        svgoSettings: [
            { removeTitle: true },
            { removeViewBox: true },
            { removeDimensions: false }
        ],
    })
    .options({
        postCss: [tailwindcss('./tailwind.config.js')],
        processCssUrls: false
    }).sourceMaps();
