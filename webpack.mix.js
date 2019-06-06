const mix = require('laravel-mix');
const path = require('path');
const fs = require('fs');

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

/*
@see https://qiita.com/maa_bp/items/dd26dfee161f729c7884
*/
const sassOptions = (mix.inProduction()) ? {outputStyle: 'compressed'} : {outputStyle: 'expanded'};

const entryPoints = [
  'admin',
];

for (let ep of entryPoints) {
  let jsPath = `resources/wstd/js/${ep}.js`,
      sassPath = `resources/wstd/sass/${ep}.scss`;

  try {
    fs.accessSync(path.resolve(jsPath));
    mix.js(jsPath, 'public/wstd/js');
  } catch (err) {}
  try {
    fs.accessSync(path.resolve(sassPath));
    mix.sass(sassPath, 'public/wstd/css', sassOptions);
  } catch (err) {}
}

mix.webpackConfig({
  output: {
    publicPath: '/wstd/'
  },
  resolve: {
    modules: [
      path.resolve('./resources/'),
      'node_modules'
    ]
  }
})
.eslint()
.stylelint({configFile: './.stylelintrc.js', files: ['**/*.scss']})
.extract(['jquery', 'bootstrap', 'vue']);

if (mix.inProduction()) {
  mix.version();
}
