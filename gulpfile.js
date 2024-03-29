// Require the modules.
var gulp = require("gulp");
var gutil = require("gulp-util");
var gulpSequence = require("gulp-sequence");
var gulpRequireTasks = require("gulp-require-tasks");
var minimist = require("minimist");
var config = require("./gulp/config.json");

var options = minimist(process.argv.slice(2));

//Set default material false
global.material = "";

if (options.material !== undefined) {
   if (options.material == "true") {
      material = "material-";
   }
}
// Global Variables
global.config = config;

gutil.log(gutil.colors.green("Starting Gulp!!"));

// Invoke the module with options.
gulpRequireTasks({
   // Specify path to your tasks directory.
   path: process.cwd() + "/gulp/gulp-tasks" // This is default!

   // Additionally pass any options to it from the table below.
   // ...
   // path	- './gulp-tasks'	Path to directory from which to load your tasks modules
   // separator -	:	Task name separator, your tasks would be named, e.g. foo:bar:baz for ./tasks/foo/bar/baz.js
   // arguments -	[]	Additional arguments to pass to your task function
   // passGulp	- true	Whether to pass Gulp instance as a first argument to your task function
   // passCallback -	true	Whether to pass task callback function as a last argument to your task function
   // gulp	- require('gulp')	You could pass your existing Gulp instance if you have one, or it will be required automatically
});

// JS Distribution Task.
gulp.task("dist-js", gulpSequence("clean:js", "copy:js", "uglify:min", "notify:js"));

// SASS Compile Task.
gulp.task("sass-compile", ["file-write:sass", "sass:main", "sass:core", "sass:pages", "sass:plugins", "sass:style"]);

// Full Distribution Task.
gulp.task("dist", ["sass-compile", "dist-js"]);

// Default Task.
gulp.task("default", ["dist"]);
