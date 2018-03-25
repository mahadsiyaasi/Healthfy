let mix = require('laravel-mix');

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
.sass('resources/assets/sass/app.scss', 'public/css')
.styles([
    'resources/assets/css/w3.css',
    
    //"files/bootstrap/dist/css/bootstrap.min.css",
	"resources/assets/files/font-awesome/css/font-awesome.min.css",
	"resources/assets/file/Ionicons/css/ionicons.min.css",
	"resources/assets/files/jvectormap/jquery-jvectormap.css",
	'resources/assets/datepicker/jquery.datetimepicker.css',
    'resources/assets/select/dist/css/bootstrap-select.css',
      'resources/assets/vendor/datatables-plugins/dataTables.bootstrap.css',
    'resources/assets/vendor/datatables-responsive/dataTables.responsive.css',
    'resources/assets/vendor/datatables/buttons/css/buttons.bootstrap.min.css',
	"resources/assets/dist/css/AdminLTE.min.css",
	"resources/assets/dist/css/skins/_all-skins.min.css",
	"resources/assets/files/fullcalendar/dist/fullcalendar.min.css",
    
	], 'public/css/all.css')
.scripts([    
    //"files/jquery/dist/jquery.min.js",
	//"files/bootstrap/dist/js/bootstrap.min.js",
	"resources/assets/js/countries.js",
	'resources/assets/datepicker/build/jquery.datetimepicker.full.js',
	 'resources/assets/select/dist/js/bootstrap-select.js',
	
	"resources/assets/files/fastclick/lib/fastclick",
	"resources/assets/dist/js/adminlte.min.js",
	"resources/assets/files/jquery-sparkline/dist/jquery.sparkline.min.js",
	"resources/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js",
	"resources/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js",
	"resources/assets/files/jquery-slimscroll/jquery.slimscroll.min.js",
	"resources/assets/files/Chart.js/Chart.js",
	"resources/assets/dist/js/pages/dashboard2.js",
	"resources/assets/dist/js/demo.js",
	'resources/assets/validate/dist/jquery.validate.min.js',
    'resources/assets/validate/dist/additional-methods.min.js',
     'resources/assets/vendor/datatables/js/jquery.dataTables.min.js',
    'resources/assets/vendor/datatables-plugins/dataTables.bootstrap.min.js',
    'resources/assets/vendor/datatables-responsive/dataTables.responsive.js',
    'resources/assets/vendor/datatables/buttons/js/dataTables.buttons.js',
    'resources/assets/vendor/datatables/buttons/js/buttons.print.js',
    "resources/assets/files/moment/min/moment.min.js",
	"resources/assets/files/fullcalendar/dist/fullcalendar.min.js",
    'resources/assets/js/patients.js',
    'resources/assets/js/doctor.js',
    'resources/assets/js/editor.js',
    'resources/assets/js/alledit.js',
    'resources/assets/js/tests.js',
    'resources/assets/js/add.js',
    'resources/assets/js/profiletest.js',
    'resources/assets/js/rangeunit.js',  
    'resources/assets/js/appoint.js',  
    'resources/assets/js/medication.js', 
    'resources/assets/js/precription.js',    
], 'public/js/all.js');//.copy('node_modules/bootstrap-sass/assets/fonts/bootstrap/','public/fonts/bootstrap');








