module.exports = function(grunt) {
    // 1. All configuration goes here
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        jsconcat: {
            main: {
                src: [
                    'js/libs/*.js', // All JS in the libs folder
                    'js/components/*.js', // All JS in the components folder
                    'js/main.js'  // The pbig main file!
                ],
                dest: 'build/js/main.js'
            },
        },
        // JSHINT
        jshint: {
            options: {
                reporter: require('jshint-stylish')
            },
            target: ['../../build/js/main.js', 'js/*.js']
        },
        // SASS
        sass: {
            dist: {
                options: {
                    style: 'expanded'
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
            js: {
                options: {
                    message: 'JS task complete'
                }
            },
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
            sass: {
                files: ['sass/**/*.scss'],
                tasks: ['css', 'notify:sass']
            },
            js: {
                files: ['js/**/*.js'],
                tasks: ['js', 'notify:js'],
                options: {
                    spawn: false,
                },
            },
        }
    });

    require('load-grunt-tasks')(grunt);
    grunt.registerTask('default', ['build' , 'watch']);
    grunt.registerTask('css', ['sass']);
    grunt.registerTask('js', ['jshint' , 'jsconcat']);
    grunt.registerTask('build', ['css' , 'cssmin', 'jshint']);
};