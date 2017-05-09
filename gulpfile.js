// Require the gulp plugin
var gulp = require('gulp');
// Require the gulp-sass plugin
var sass = require('gulp-sass');
// Require the run-sequence plugin
var runSequence = require('run-sequence');

// Process Sass files
gulp.task('sass', function(){
  return gulp.src('src/sass/**/*.scss') // Get everything in the src/sass directory
    .pipe(sass()) // Using gulp-sass
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
