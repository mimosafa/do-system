const mix = require('laravel-mix');
const path = require('path');

require('laravel-mix-eslint');
require('laravel-mix-stylelint');
require('laravel-mix-merge-manifest');

const sassOptions = mix.inProduction() ? {outputStyle: 'compressed'} : {outputStyle: 'expanded'};
const resolveModules = [path.resolve('./resources/wstd/js/modules'), 'node_modules'];

mix
  .js('resources/wstd/js/admin.js', 'public/wstd/js/admin.js')
  .sass('resources/wstd/sass/admin.scss', 'public/wstd/css/admin.css', sassOptions)
  .webpackConfig({output: {publicPath: '/wstd/'}, resolve: {modules: resolveModules}})
  .eslint()
  .stylelint({configFile: './.stylelintrc.js', files: ['**/*.scss']})
  .extract(['jquery', 'bootstrap', 'vue'])
  .version()
  .mergeManifest()
;
