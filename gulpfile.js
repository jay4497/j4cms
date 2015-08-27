var gulp = require('gulp'),
    less = require('gulp-less'),
    minifyCss = require('gulp-minify-css'),
    minjs = require('gulp-uglify');

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

gulp.task('admin-less', function(){
 return gulp.src('resources/assets/less/admin.less')
     .pipe(less())
     .pipe(minifyCss())
     .pipe(gulp.dest('public/assets/admin/css'));
});

gulp.task('admin-minjs', function(){
    return gulp.src('resources/assets/js/admin.js')
        .pipe(minjs())
        .pipe(gulp.dest('public/assets/admin/js'));
});

gulp.task('less', function(){
 return gulp.src('resources/assets/less/style.less')
     .pipe(less())
     .pipe(minifyCss())
     .pipe(gulp.dest('public/assets/css'));
});

gulp.task('minjs', function(){
 return gulp.src('resources/assets/js/*.js')
     .pipe(minjs())
     .pipe(gulp.dest('public/assets/js'));
});
