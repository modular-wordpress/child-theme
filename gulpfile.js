const gulp = require("gulp");
const {generateParentTasks, generateChildTasks} = require("./parent/tasks");

// Generates all gulp tasks for the parent. You can change the prefix or the
// output location here.
generateParentTasks("parent", "./build/modular-wordpress-parent");
generateChildTasks("child", "./build/modular-wordpress-child");

gulp.task("default", [
    "parent-build-theme",
    "child-copy-modules",
    "child-copy-src"
]);
