var elixir = require('laravel-elixir');

/*
|--------------------------------------------------------------------------
| Elixir Asset Management
|--------------------------------------------------------------------------
|
| Elixir provides a clean, fluent API for defining some basic Gulp tasks
| for your Laravel application. By default, we are compiling the Sass
| file for our application, as well as publishing vendor resources.
|
*/

elixir(function(mix) {
    mix.less('app.less', 'public/css/app.css');
    mix.less('general.less', 'public/css/general.css');
    mix.less('admin.less', 'public/css/admin.css');

    mix.scripts([
        '../bower/jquery/dist/jquery.min.js',
        '../bower/material-design-lite/material.min.js'
    ], 'public/js/scripts.js')

    mix.version([
        'public/css/app.css',
        'public/css/admin.css',
        'public/css/general.css',

        'public/js/scripts.js'
    ]);

});
