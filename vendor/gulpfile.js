/**
 * Created by 3529588 on 26/04/2017.
 */

var gulp = require('gulp');
var bower = require('gulp-bower');
var sass = require('gulp-sass');
var notify = require('gulp-notify');

var config = {
    sassPath: '../resources/sass/',
    bowerDir: 'bower-components/'
};

gulp.task('bower', function() {
   return bower()
       .pipe(gulp.dest(config.bowerDir))
});
// gulp.task('icons', function() {
//     return gulp.src(config.bowerDir + 'bootstrap-sass/assets//fontawesome/fonts/**.**')
//         .pipe(gulp.dest('../public/fonts'));
// });

gulp.task('styles', function() {
   return gulp.src('../resources/sass/main.scss')
       .pipe(sass())
       .pipe(gulp.dest('../public/css/'))
});

gulp.task('css', function () {
    return gulp.src(config.sassPath + '/main.scss')
        .pipe(sass({
            style: 'compressed',
            loadPath: [
                '../resources/sass',
                config.bowerDir + '/bootstrap-sass/assets/stylesheets'
            ]
                .on("error", notify.onError(function (error) {
                    return "error: " + error.message;
                }))
                .pipe(gulp.dest('../public/css'))
        }))
});