var gulp = require('gulp'),     
    sass = require('gulp-ruby-sass') ,
    notify = require('gulp-notify') ,
    imagemin = require('gulp-imagemin'),
    pngquant = require('imagemin-pngquant'),
    uglify = require('gulp-uglify'),
    uglifycss = require('gulp-uglifycss'),
    concat = require('gulp-concat'),
    inject = require('gulp-inject'),
    runSequence = require('run-sequence'),
    path = require('path'),
    rev = require('gulp-rev'),
    clean = require('gulp-clean'),
    mainBowerFiles = require('main-bower-files'),
    theme_directory = "<?php echo get_template_directory_uri() ?>";

var config= {
    sassPath: './source/sass/*',
    imgPath: './source/img/*',
    jsPath: './source/js/*',
    bowerDir: './bower_components',
    rootDir: __dirname
};

var watchFiles = [
    './source/js/*',
    './source/sass/*'
];

gulp.task('bowerCss', function(){
    return gulp.src(mainBowerFiles('**/*.css'))
        .pipe(gulp.dest('./assets/css/bower'));
});

gulp.task('bowerJs', function(){
    return gulp.src(mainBowerFiles('**/*.js'))
        .pipe(concat('bower.js'))
        .pipe(gulp.dest('./assets/js/bower'));
});

gulp.task('minifyCss', function() {
    return sass(config.sassPath, {style: 'compressed', loadPath: ['./source/sass', config.bowerDir + '/bootstrap-sass-official/assets/stylesheets']})
        .on("error", notify.onError( function(error) {
            return "Error: " + error.message;
        }))
        .pipe(gulp.dest('./assets/css')); 
});

gulp.task('minifyBowerCss', function() {
    return gulp.src('./assets/css/bower/*')
        .pipe(uglifycss({
            "uglyComments": true
        }))
        .pipe(gulp.dest('./assets/css/bower'));
});

gulp.task('minifyImg', function(){
    return gulp.src(config.imgPath)
        .pipe(imagemin({
            progressive:true,
            svgoPlugins:[{removeViewBox: false}],
            use: [pngquant()]
        }))
        .pipe(gulp.dest('./assets/img'));
});

gulp.task('minifyJs', function() {
    return gulp.src(config.jsPath)
        .pipe(uglify())
        .pipe(concat('app.js'))
        .pipe(gulp.dest('./assets/js'));
});

gulp.task('minifyBowerJs', function() {
    return gulp.src('./assets/js/bower/*')
        .pipe(uglify())
        .pipe(gulp.dest('./assets/js/bower'));
});

gulp.task('cleanBuild', function(){
    return gulp.src('./build', {read: false})
    .pipe(clean());
});

gulp.task('revFiles', function() {
    return gulp.src(['./assets/css/*.css', './assets/js/*.js'], {base: 'assets'})
        .pipe(rev())
        .pipe(gulp.dest('./build'));
});

gulp.task('revBowerFiles', function() {
    return gulp.src(['./assets/css/bower/*.css', './assets/js/bower/*.js'], {base: 'assets'})
        .pipe(rev())
        .pipe(gulp.dest('./build'));
});

gulp.task('injectCss', function() {
    return gulp.src(path.join(config.rootDir, 'header.php'))
        .pipe(inject(gulp.src('./build/css/*.css', {read: false}), {
            transform: function(filePath){
                return '<link rel="stylesheet" href="'+theme_directory+''+filePath+'" />';
            }
        }))
        .pipe(inject(gulp.src('./build/css/bower/*.css', {read: false}), {
            transform: function(filePath){
                return '<link rel="stylesheet" href="'+theme_directory+''+filePath+'" />';
            }, name: 'bower'}))
        .pipe(gulp.dest(config.rootDir));
});

gulp.task('injectJs', function(){
    return gulp.src(path.join(config.rootDir, 'footer.php'))
        .pipe(inject(gulp.src('./build/js/*.js', {read: false}), {
            transform: function(filePath){
                return '<script src="'+theme_directory+''+filePath+'"></script>';
            }
        }))
        .pipe(inject(gulp.src('./build/js/bower/*.js', {read: false}), {
            transform: function(filePath){
                return '<script src="'+theme_directory+''+filePath+'"></script>';
            }, name: 'bower'}))
        .pipe(gulp.dest(config.rootDir));
});

gulp.task('watch', function(){
    gulp.watch(watchFiles, ['default']);
});

gulp.task('build', function() {
    runSequence(['bowerCss', 'bowerJs'], ['minifyCss', 'minifyBowerCss', 'minifyImg', 'minifyJs', 'minifyBowerJs'], 'cleanBuild', 'revFiles', 'revBowerFiles', 'injectCss', 'injectJs');
});

gulp.task('default', ['build']);