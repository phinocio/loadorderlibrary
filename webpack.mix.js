const mix = require('laravel-mix');
require('laravel-mix-purgecss');

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

// Sass
mix.sass('resources/sass/app.scss', 'public/css').purgeCss().version();

// JS
mix.js('resources/js/app.js', 'public/js').extract().version();

// mix.version();

if(!mix.inProduction()) {
	// Browsersync
	mix.browserSync('loadorderlibrary.localhost');
}
