var gulp = require('gulp')
var sass = require('gulp-sass')

var src = ['./views/src/sass/**/*.scss', './views/src/sass/*.scss']
var dist = './views/public/styles'

gulp.task('sass', function () {
    return gulp
        .src(src)
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest(dist))
})

gulp.task('default', function () {
    gulp.watch(src, gulp.series('sass'))
})
