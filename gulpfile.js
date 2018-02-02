const gulp = require("gulp");
const {generateParentTasks} = require("./parent/tasks");

// Generates all gulp tasks for the parent. You can change the prefix or the 
// output location here.
generateParentTasks("parent", "./build/modular-wordpress-parent");

gulp.task("default", ["parent-build-theme"]);