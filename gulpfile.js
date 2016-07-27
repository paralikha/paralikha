var gulp = require('gulp'),
    sass = require('gulp-ruby-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    cssnano = require('gulp-cssnano'),
    jshint = require('gulp-jshint'),
    uglify = require('gulp-uglify'),
    imagemin = require('gulp-imagemin'),
    rename = require('gulp-rename'),
    concat = require('gulp-concat'),
    notify = require('gulp-notify'),
    cache = require('gulp-cache'),
    livereload = require('gulp-livereload'),
    del = require('del');

/*
| # Scss
|
| The sass files to be converted as css
| and saved to different folders.
|
| @run  gulp sass
|
| @destination
|       - ./css/
|       - ./com/wp-content/themes/paraluman/
*/
gulp.task('sass', function() {
    return sass('resources/scss/app.scss', { style: 'expanded' })
        .pipe(autoprefixer('last 2 version'))
        .pipe(gulp.dest('css'))
        .pipe(rename({suffix: '.min'}))
        .pipe(cssnano())
        .pipe(gulp.dest('com/wp-content/themes/paraluman'))
        .pipe(gulp.dest('css'))
        .pipe(notify({ message: 'Completed compiling SASS files' }));
});

/*
| # Scripts
|
| The js files to be concatinated
| and saved to different folders.
|
| @run  gulp scripts
|
| @destination
|       - ./js/
|       - ./com/wp-content/themes/paraluman/js/
*/
gulp.task('scripts', function() {
    return gulp.src('resources/scripts/**/*.js')
        // .pipe(jshint('.jshintrc'))
        // .pipe(jshint.reporter('default'))
        .pipe(concat('scripts.js'))
        .pipe(gulp.dest('js'))
        .pipe(rename({suffix: '.min'}))
        .pipe(uglify())
        .pipe(gulp.dest('js'))
        .pipe(gulp.dest('com/wp-content/themes/paraluman/js'))
        .pipe(notify({ message: 'Completed compiling scripts' }));
});

/*
| # Images
|
| The img files to be optimized
| and saved to different folders.
|
| @run  gulp images
|
| @destination
|       - ./img/
|       - ./com/wp-content/themes/paraluman/img/
*/
gulp.task('images', function() {
    return gulp.src('resources/images/**/*')
        .pipe(cache(imagemin({ optimizationLevel: 5, progressive: true, interlaced: true })))
        .pipe(gulp.dest('img'))
        .pipe(gulp.dest('com/wp-content/themes/paraluman/img'))
        .pipe(notify({ message: 'Images optimization complete' }));
});

/*
| # Clean
|
| @run  gulp clean
*/
gulp.task('clean', function() {
    return del(['css', 'js', 'img']);
});

/*
| # Default Task
|
| @run  gulp default
*/
gulp.task('default', ['clean'], function() {
    gulp.start('sass', 'scripts', 'images');
});

/*
| # Watcher
|
| @run  gulp watch
*/
gulp.task('watch', function() {
    // Create LiveReload server
    // livereload.listen();
    // Watch any files in , reload on change
    // gulp.watch(['**']).on('change', livereload.changed);

    // Watch .scss files
    gulp.watch('resources/sass/**/*.scss', ['sass']);
    // Watch .js files
    gulp.watch('resources/scripts/**/*.js', ['scripts']);
    // Watch image files
    gulp.watch('resources/images/**/*', ['images']);
});