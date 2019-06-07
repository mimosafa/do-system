const mix = require('laravel-mix');
const path = require('path');

require('laravel-mix-eslint');
require('laravel-mix-stylelint');

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

/*
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
*/

const sassOptions = mix.inProduction() ? {outputStyle: 'compressed'} : {outputStyle: 'expanded'};
const resolveModules = [path.resolve('./resources/wstd/js/modules'), 'node_modules'];

mix.js('resources/wstd/js/admin.js', 'public/wstd/js/admin.js')
  .sass('resources/wstd/sass/admin.scss', 'public/wstd/css/admin.css', sassOptions)
  .webpackConfig({output: {publicPath: '/wstd/'}, resolve: {modules: resolveModules}})
  .eslint()
  .stylelint({configFile: './.stylelintrc.js', files: ['**/*.scss']})
  .extract(['jquery', 'bootstrap', 'vue'])
  .version()
;
