
module.exports = function(grunt) {
    // 1. All configuration goes here
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        //IMAGEMIN
        imagemin: {                          // Task
            dynamic: {  
                      // Another target
                files: [{
                    expand: true,                  // Enable dynamic expansion
                    cwd: 'img/',                   // Src matches are relative to this path
                    src: ['**/*.{png,jpg,gif}'],   // Actual patterns to match
                    dest: '../../public/assets/img/'                  // Destination path prefix
                    }]
                }
            },


        // JSHINT
        jshint: {
            all: ['js/**/*.js']
        },
        //CONCAT
        concat: {
          options: {
            separator: ';',
          },
          dist: {
            src: ['js/**/*.js'],
            dest: '../../build/js/main.js',
          },
        },
        //JSUGLIFY
        uglify: {
            options: {
                mangle: false
            },
            my_target: {
              files: {
                '../../public/assets/js/main.min.js': ['../../build/js/main.js']
              }
            }
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
    grunt.registerTask('css', ['sass' , 'cssmin']);
    grunt.registerTask('img', ['imagemin']);
    grunt.registerTask('js', ['jshint' , 'concat' , 'uglify']);
    grunt.registerTask('build', ['css' , 'js', 'img']);
};