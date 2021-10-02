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

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');

mix.combine([
	'resources/css/blogpage.css',
    'resources/css/bootstrap.min.css',
    'resources/css/jasny-bootstrap.min.css',
    'resources/css/material-kit.css',
    'resources/css/font-awesome.min.css',
    'resources/css/main.css',
    'resources/css/extras/animate.css',
    'resources/css/extras/owl.carousel.css',
    'resources/css/extras/owl.theme.css',
    'resources/css/extras/settings.css',
    'resources/css/responsive.css',
    'resources/css/slicknav.css',
    'resources/css/bootstrap-select.min.css',
    'resources/css/custom-components.css',
    'resources/css/bootstrap-social.css',


], 'public/css/bundle.css');

mix.combine([
	'resources/js/lib/jquery-min.js',
	'resources/js/lib/jquery-ui.js',
	'resources/js/lib/owl.carousel.min.js',
	'resources/js/lib/bootstrap.min.js',
	'resources/js/lib/material.min.js',
    'resources/js/lib/material-kit.js',
    'resources/js/lib/jquery.parallax.js',
    'resources/js/lib/wow.js',
    'resources/js/main.js',
    'resources/js/actions.js',
    'resources/js/lib/jquery.counterup.min.js',
    'resources/js/lib/waypoints.min.js',
    'resources/js/lib/jasny-bootstrap.min.js',    
    'resources/js/lib/bootstrap-select.min.js',      
    'resources/js/lib/jquery.maskedinput.min.js',    
    'resources/js/lib/jquery.validate.min.js',      
    'resources/js/lib/fotorama.js',

], 'public/js/bundle.js');


