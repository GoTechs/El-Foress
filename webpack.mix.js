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
	'resources/assets/css/blogpage.css',
    'resources/assets/css/bootstrap.min.css',
    'resources/assets/css/jasny-bootstrap.min.css',
    'resources/assets/css/material-kit.css',
    'resources/assets/css/font-awesome.min.css',
    'resources/assets/css/main.css',
    'resources/assets/css/extras/animate.css',
    'resources/assets/css/extras/owl.carousel.css',
    'resources/assets/css/extras/owl.theme.css',
    'resources/assets/css/extras/settings.css',
    'resources/assets/css/responsive.css',
    'resources/assets/css/slicknav.css',
    'resources/assets/css/bootstrap-select.min.css',
    'resources/assets/css/custom-components.css',
    'resources/assets/css/bootstrap-social.css',


], 'public/css/bundle.css');

mix.combine([
	'resources/assets/js/lib/jquery-min.js',
	'resources/assets/js/lib/jquery-ui.js',
	'resources/assets/js/lib/owl.carousel.min.js',
	'resources/assets/js/lib/bootstrap.min.js',
	'resources/assets/js/lib/material.min.js',
    'resources/assets/js/lib/material-kit.js',
    'resources/assets/js/lib/jquery.parallax.js',
    'resources/assets/js/lib/wow.js',
    'resources/assets/js/main.js',
    'resources/assets/js/actions.js',
    'resources/assets/js/lib/jquery.counterup.min.js',
    'resources/assets/js/lib/waypoints.min.js',
    'resources/assets/js/lib/jasny-bootstrap.min.js',    
    'resources/assets/js/lib/bootstrap-select.min.js',      
    'resources/assets/js/lib/jquery.maskedinput.min.js',    
    'resources/assets/js/lib/jquery.validate.min.js',      
    'resources/assets/js/lib/fotorama.js',

], 'public/js/bundle.js');


