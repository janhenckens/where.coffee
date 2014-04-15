module.exports = function(grunt) {
    // 1. All configuration goes here
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),


        // SASS
        sass: {
            dist: {
                options: {
                    style: 'compressed'
                },
                files: {
                    '../../build/css/main.css': 'sass/main.scss'
                }
            }
        },
        // CSSMIN
        cssmin: {
             minify: {
                 expand: true,
                 cwd: '../../build/css/',
                 src: ['*.css', '!*.min.css'],
                 dest: '../../public/assets/css/',
                 ext: '.min.css'
             }
         },
        // NOTIFY
        notify: {
            sass: {
                options: {
                    message: 'SASS compiled successfully'
                }
            }  
        },
        // WATCH
       watch: {
           options: {
               livereload: true
           },
           css: {
               files: ['sass/**/*.scss'],
               tasks: ['css', 'notify:css'],
               options: {
                   spawn: true,
               }
           }
       }
    });

    // 2. Where we tell Grunt we plan to use this plug-in.
    require('load-grunt-tasks')(grunt);

    // 3. Where we tell Grunt what to do when we type "grunt" into the terminal.
    grunt.registerTask('default', ['build']);
    grunt.registerTask('css', ['sass']);
    grunt.registerTask('build', ['css' , 'cssmin']);
};