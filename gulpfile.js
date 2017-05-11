// Require the Gulp task runner plugin
var gulp = require('gulp');
// Require the Sass pre-processor plugin
var sass = require('gulp-sass');
// Require the task sequencer plugin
var runSequence = require('run-sequence');
// // Require the source mapping plugin
var sourcemaps = require('gulp-sourcemaps');
// Require the CSS minify-er plugin
var cleanCSS = require('gulp-clean-css');
// Require the file renaming plugin
var rename = require("gulp-rename");

// Process Sass files
gulp.task('sass', function(){
  // Get everything in the src/sass directory
  return gulp.src('src/sass/**/*.scss')
    // Using gulp-sass
    .pipe(sass())
    // Initialize the sourcemap plugin
    .pipe(sourcemaps.init())
    // minify CSS
    .pipe(cleanCSS())
    // Append the sourcemap to the bottom of the minified CSS file
    .pipe(sourcemaps.write())
    // Rename our dist CSS with -min
    .pipe(rename("main-min.css"))
    // Put processed file in the correct directory
    .pipe(gulp.dest('./dist/css'))
});

// Watch files for changes
gulp.task('watch', function(){
  // Watch for changes in the Sass folder
  gulp.watch('src/sass/**/*.scss', ['sass']);
});

// Add tasks to the deafult Gulp task
gulp.task('default', function (callback) {
  // Do our tasks in the correct order so we don't miss anything
  runSequence(['sass','watch'],callback);
});
