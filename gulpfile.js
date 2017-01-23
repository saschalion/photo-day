var gulp = require('gulp');
var stylus = require('gulp-stylus');
var watch = require('gulp-watch');
var nib = require('nib');
var rename = require('gulp-rename');
var concat = require('gulp-concat');
var autoprefixer = require('gulp-autoprefixer');
var sourcemaps = require('gulp-sourcemaps');

var dirPath = './styles';

gulp.task('css', function() {
    gulp.src([
        dirPath + '/bpl-normalize.styl',
        dirPath + '/**/*.styl',
        dirPath + '/responsive.styl'
    ])
        .pipe(concat('main.styl'))
        .pipe(stylus({
            use: [
                nib()
            ],
            compress: true
        }))
        .pipe(autoprefixer({
            cascade: false
        }))
        .pipe(gulp.dest(dirPath));
});

gulp.task('watch', function() {
    watch(dirPath + '/**/*.styl', function() {
        return gulp.src([
            dirPath + '/bpl-normalize.styl',
            dirPath + '/**/*.styl',
            dirPath + '/responsive.styl'
        ])
            .pipe(sourcemaps.init({loadMaps: true}))
            .pipe(concat('main.styl'))
            .pipe(stylus({
                use: [
                    nib()
                ]
            }))
            .pipe(autoprefixer({
                cascade: false
            }))
            .pipe(sourcemaps.write())
            .pipe(gulp.dest(dirPath));
    });
});

gulp.task('default', ['build']);
gulp.task('build', ['css']);

gulp.task('default', ['watch']);