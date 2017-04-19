var elixir = require('laravel-elixir');
var gulp = require('gulp');

/**
 * copy clean-blog less files
 *
 */
gulp.task("copyfiles", function(){
    gulp.src("bower_components/jquery/dist/jquery.js")
        .pipe(gulp.dest("resources/assets/js/"));

    gulp.src("bower_components/bootstrap/less/**")
        .pipe(gulp.dest("resources/assets/less/bootstrap"));

    gulp.src("bower_components/bootstrap/dist/js/bootstrap.js")
        .pipe(gulp.dest("resources/assets/js/"));

    gulp.src("bower_components/bootstrap/dist/fonts/**")
        .pipe(gulp.dest("public/assets/fonts"));

    gulp.src("bower_components/clean-blog/less/**")
        .pipe(gulp.dest("resources/assets/less/clean-blog"));
});

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
    mix.sass('app.scss');
    mix.scripts(['js/jquery.js', 'js/bootstrap.js'],
        'public/assets/js/admin.js',
        'resources/assets'
    );

    mix.less('admin.less', 'public/assets/css/admin.css');
    // mix.phpUnit();
});
