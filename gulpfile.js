// Require the Gulp task runner plugin
var gulp = require('gulp');
// Require the Sass pre-processor plugin
var sass = require('gulp-sass');
// Require the task sequencer plugin
var runSequence = require('run-sequence');
// Require the CSS minify-er plugin
var cleanCSS = require('gulp-clean-css');
// Require the file renaming plugin
var rename = require("gulp-rename");

// Process Sass files
gulp.task('sass', function(){
  return gulp.src('src/sass/**/*.scss') // Get everything in the src/sass directory
    .pipe(sass()) // Using gulp-sass
    .pipe(cleanCSS())
    .pipe(rename("main-min.css"))
    .pipe(gulp.dest('css')) // Put processed file in the css directory
});

// Watch files for changes
gulp.task('watch', function(){
  // Gulp watch syntax
  gulp.watch('src/sass/**/*.scss', ['sass']);
});

// Add tasks to the deafult Gulp task
gulp.task('default', function (callback) {
  runSequence(['sass','watch'],
    callback
  );
});
