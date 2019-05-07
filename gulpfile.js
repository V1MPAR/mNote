const gulp = require('gulp');
const sass = require('gulp-sass');

gulp.task('sass', () => {
    return gulp.src('./build/sass/main.scss')
        .pipe(sass({ outputStyle: 'compressed' }))
        .pipe(gulp.dest('./public/css'))
});

gulp.task('watch', function () {
    gulp.watch('./build/sass/*.scss', gulp.series('sass'));
});

gulp.task('sass-auth', () => {
    return gulp.src('./build/sass/auth.scss')
        .pipe(sass({ outputStyle: 'compressed' }))
        .pipe(gulp.dest('./public/css'))
});

gulp.task('watch-auth', function () {
    gulp.watch('./build/sass/*.scss', gulp.series('sass-auth'));
});