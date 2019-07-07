const mix = require('laravel-mix');

const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

require('dotenv').config();

const route = process.env.APP_URL_BASE;

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

// Vendors - Plugins on the "resources/vendor" folder. Any asset from this folder should be placed here
/*JS*/
mix.scripts([
    'resources/assets/backend/vendors/js/vendors.min.js',
    'resources/assets/backend/vendors/js/extensions/noty/noty.min.js',
    'node_modules/sweetalert2/dist/sweetalert2.all.min.js'
], 'public/backend/vendors/js/vendors.min.js');
mix.copy('resources/assets/backend/vendors/js/pickers/dateTime/moment-with-locales.min.js', 'public/backend/vendors/js/pickers/dateTime/moment-with-locales.min.js');
mix.js('resources/assets/backend/vendors/js/pickers/daterange/daterangepicker.js', 'public/backend/vendors/js/pickers/daterange/daterangepicker.js');
mix.scripts([
    'resources/assets/backend/vendors/js/pickers/pickadate/picker.js',
    'resources/assets/backend/vendors/js/pickers/pickadate/picker.date.js',
], 'public/backend/vendors/js/pickers/pickadate/pickadate.js');
mix.copy('resources/assets/backend/vendors/js/forms/select/select2.full.min.js', 'public/backend/vendors/js/forms/select/select2.full.min.js');
mix.copy('resources/assets/backend/vendors/js/forms/repeater/jquery.repeater.min.js', 'public/backend/vendors/js/forms/repeater/jquery.repeater.min.js');
mix.copy('resources/assets/backend/js/scripts/forms/form-repeater.js', 'public/backend/vendors/js/forms/repeater/form-repeater.js');
mix.copy('resources/assets/backend/vendors/js/tables/datatable/datatables.min.js', 'public/backend/vendors/js/tables/datatable/datatables.min.js');
mix.copy('resources/assets/backend/vendors/custom/js/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js', 'public/backend/vendors/custom/js/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js');
mix.copy('resources/assets/backend/vendors/js/forms/toggle/bootstrap-switch.min.js', 'public/backend/vendors/js/forms/toggle/bootstrap-switch.min.js');
mix.copy('resources/assets/backend/vendors/js/forms/toggle/switchery.min.js', 'public/backend/vendors/js/forms/toggle/switchery.min.js');
mix.copy('resources/assets/backend/vendors/js/forms/toggle/bootstrap-checkbox.min.js', 'public/backend/vendors/js/forms/toggle/bootstrap-checkbox.min.js');
mix.copy('resources/assets/backend/js/scripts/forms/switch.js', 'public/backend/vendors/js/forms/switch.js');
mix.js('resources/assets/backend/vendors/custom/js/zabuto-calendar/zabuto_calendar.js', 'public/backend/vendors/custom/js/zabuto-calendar/zabuto_calendar.js');
mix.js('resources/assets/backend/vendors/custom/js/clock-picker/jquery-clockpicker.js', 'public/backend/vendors/custom/js/clock-picker/jquery-clockpicker.js')

/*CSS*/
mix.styles([
    'resources/assets/backend/vendors/css/vendors.min.css',
    'resources/assets/backend/vendors/css/extensions/noty/noty.css',
    'node_modules/sweetalert2/dist/sweetalert2.min.css'
], 'public/backend/vendors/css/vendors.min.css');
mix.css('resources/assets/backend/vendors/css/pickers/daterange/daterangepicker.css', 'public/backend/vendors/css/pickers/daterange/daterangepicker.css');
mix.styles([
    'resources/assets/backend/vendors/css/pickers/pickadate/default.css',
    'resources/assets/backend/vendors/css/pickers/pickadate/pickadate.css',
    'resources/assets/backend/vendors/css/pickers/pickadate/default.time.css'
], 'public/backend/vendors/css/pickers/pickadate/pickadate.css');
mix.copy('resources/assets/backend/vendors/css/forms/selects/select2.min.css', 'public/backend/vendors/css/forms/selects/select2.min.css');
mix.copy('resources/assets/backend/vendors/css/tables/datatable/datatables.min.css', 'public/backend/vendors/css/tables/datatable/datatables.min.css');
mix.copy('resources/assets/backend/vendors/css/forms/toggle/bootstrap-switch.min.css', 'public/backend/vendors/css/forms/toggle/bootstrap-switch.min.css');
mix.copy('resources/assets/backend/vendors/css/forms/toggle/switchery.min.css', 'public/backend/vendors/css/forms/toggle/switchery.min.css');
mix.copy('resources/assets/backend/css/plugins/forms/switch.css', 'public/backend/css/plugins/forms/switch.css');
mix.copyDirectory('resources/assets/backend/vendors/custom/css/bootstrap-datetimepicker', 'public/backend/vendors/custom/css/bootstrap-datetimepicker');
mix.css('resources/assets/backend/vendors/custom/css/zabuto-calendar/zabuto_calendar.css', 'public/backend/vendors/custom/css/zabuto-calendar/zabuto_calendar.css');
mix.css('resources/assets/backend/vendors/custom/css/zabuto-calendar/custom_date.css', 'public/backend/vendors/custom/css/zabuto-calendar/custom_date.css');
mix.css('resources/assets/backend/vendors/custom/css/clock-picker/jquery-clockpicker.css', 'public/backend/vendors/custom/css/clock-picker/jquery-clockpicker.css')

/*Custom*/
mix.copyDirectory('resources/assets/backend/vendors/custom', 'public/backend/vendors/custom');

//Raw - Raw assets used by the theme and other plugins
mix.copyDirectory('resources/assets/backend/fonts', 'public/backend/fonts');
mix.copyDirectory('resources/assets/backend/images', 'public/backend/images');

//JS - JavaScript used by the template or by plugins
mix.js([
    'resources/assets/backend/js/core/app.js',
    'resources/assets/backend/js/core/app-menu.js'
], 'public/backend/js/base.admin.js');


//CSS - CSS used by the template or by plugins
mix.styles([
    'resources/assets/backend/css/bootstrap.css',
    'resources/assets/backend/css/bootstrap-extended.css',
    'resources/assets/backend/css/components.css',
    'resources/assets/backend/css/colors.css',
    'resources/assets/backend/css/plugins/forms/validation/form-validation.css'
], 'public/backend/css/base.admin.css');
mix.copy(
    'resources/assets/backend/css/pages/login-register.css',
    'public/backend/css/base.auth.css'
);
mix.copy(
    'resources/assets/backend/css/core/menu/menu-types/vertical-menu-modern.css',
    'public/backend/css/core/menu/menu-types/vertical-menu-modern.css'
);

//Custom - Any extra CSS and JS created in development
mix.copyDirectory('resources/assets/backend/custom', 'public/backend/custom');

mix.webpackConfig({
    plugins: [
        new BrowserSyncPlugin({
            notify: false,
            proxy    : {
                target: "http://"+route
            },
            host     : route,
            open     : 'local',
            files : [
                'public/**/*',
                'resources/views/**/*',
                'routes/**/*'
            ]
        })
    ]
});