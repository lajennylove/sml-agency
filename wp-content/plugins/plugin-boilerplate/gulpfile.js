var gulp = require('gulp');
var livereload = require('gulp-livereload');
var uglify = require('gulp-uglifyjs');
var autoprefixer = require('gulp-autoprefixer');
var sass = require('gulp-sass')(require('sass'));
//var autoprefixer = require('autoprefixer');
var uglify = require ('gulp-uglify');
var plumber = require('gulp-plumber');
var sourcemaps = require('gulp-sourcemaps');
var imagemin = require('gulp-imagemin');
var pngquant = require('imagemin-pngquant');
const webp = require('gulp-webp');
var ngrok = require('ngrok');
var browserSync = require('browser-sync');


var config = browserSync({
    proxy: 'http://localhost:10017/',
    port: 2020,
    open: false,
    notify: false
});

gulp.task('webserver', function () {
    browserSync(config, function (err, bs) {
           ngrok.connect({
                    proto: 'http', // http|tcp|tls
                    addr: bs.options.get('port'), // port or network address
                }, function (err, url) {
                    gutil.log('[ngrok]', ' => ', gutil.colors.magenta.underline(url));
                });
        });
});

gulp.task('reload', async function() {
    gulp.src('src/js/*.js')
    .pipe(uglify('main.js'))
    .pipe(gulp.dest('dist/js'))
    .pipe(browserSync.reload({stream: true}))
});

gulp.task('imagemin', async function () {
    gulp.src('src/img/*')
        .pipe(imagemin({
            progressive: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()]
        }))
        .pipe(gulp.dest('dist/img/'));
});

gulp.task('imageminwep', () =>
    gulp.src('src/img/*.{jpg,png}')
        .pipe(webp())
        .pipe(gulp.dest('dist/img/'))
        .pipe(browserSync.reload({stream: true}))
);

gulp.task('sass', async function () {
   gulp.src('src/css/style.scss')
    .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 7', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest('dist/css/'))
    .pipe(browserSync.reload({stream: true}))
});

gulp.task('uglify', async function() {
  gulp.src('src/js/*.js')
    .pipe(uglify('main.js'))
    .pipe(plumber())
    .pipe(gulp.dest('dist/js'))
    .pipe(browserSync.reload({stream: true}))
});

gulp.task('watch', async function(){

    gulp.watch('src/img/*', gulp.series('imageminwep'));
    gulp.watch('src/css/**/*.scss', gulp.series('sass'));
    gulp.watch('src/js/*.js', gulp.series('uglify'));
    gulp.watch("**/*.php", gulp.series('reload'));
    gulp.watch(['dist/css/style.css', '**/*.php', 'dist/js/*.js', 'dist/img/*.*'], function (files){
        livereload.changed(files);
        browserSync.reload({stream: true})
    });
});