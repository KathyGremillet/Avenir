module.exports = function(grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        // configuration des tâches grunt        
        uglify: {
            build: {
                src: 'js/production.js',
                dest: 'js/production.min.js'
            }
        },
        sass: {
            dist: {
                options: {
                    style: 'compressed'
                },
                files: {
                    'css/global.css': 'css/starter.scss'
                }
            }
        },
        watch: {
            scripts: {
                files: ['js/production.js'],
                tasks: ['uglify'],
                options: {
                    spawn: false,
                }
            },
            css: {
                files: ['css/*.scss'],
                tasks: ['sass'],
                options: {
                    spawn: false,
                }
            }
        }
    });

    //Load contrib
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');

    // Les tâches sont enregistrées ici
    grunt.registerTask('default', ['uglify', 'sass', 'watch']);

};