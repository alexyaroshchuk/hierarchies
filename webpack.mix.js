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

mix.js('resources/assets/js/app.js', 'public/js')
	.js('resources/assets/js/common.js', 'public/js')
	.js('resources/assets/js/vendor/jquery.drawDoughnutChart.js', 'public/js')
	.js('resources/assets/js/vendor/jquery.orgchart.min.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .sass('resources/assets/sass/common.scss', 'public/css');

// mix.scripts([
// 	'resources/assets/js/vendor/jquery.drawDoughnutChart.js',
// 	'resources/assets/js/vendor/jquery.orgchart.min.js',
// 	'resources/assets/js/vendor/simple-chart.js',
// ], 'public/js/vendor.js');

mix.styles([
	'resources/assets/sass/vendor/jquery.orgchart.min.css',
	'resources/assets/sass/vendor/simple-chart.css'
], 'public/css/vendor.css');
// mix.copyDirectory('assets/img', 'public/img');
// mix.copyDirectory('assets/svg', 'public/svg');