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

const imagePath = 'assets/img'
const jsPath = 'assets/js'
const cssPath = 'assets/css'

mix.options({
    processCssUrls: false
});


mix.js('resources/js/script.js', jsPath)
    .sass('resources/scss/styles.scss', cssPath)
    .options({
        autoprefixer: {
            options: {
                browsers: [
                    'last 6 versions',
                ]
            }
        }
    }).sourceMaps()

mix.setPublicPath('assets/')
    .copyDirectory('resources/img', `${imagePath}`)
