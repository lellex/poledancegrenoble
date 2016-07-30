module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    sass: {
      options: {
        includePaths: ['bower_components/foundation/scss']
      },
      dist: {
        options: {
          outputStyle: 'compressed'
        },
        files: {
          'css/app.css': 'scss/app.scss'
        }        
      }
    },

    copy: {
      scripts: {
        expand: true,
        cwd: 'bower_components/',
        src: '**/*.js',
        dest: 'js'
      },

      maps: {
        expand: true,
        cwd: 'bower_components/',
        src: '**/*.map',
        dest: 'js'
      }
    },

    jshint: {
      // define the files to lint
      files: ['Gruntfile.js', 'js/custom/*.js'],
      // configure JSHint (documented at http://www.jshint.com/docs/)
      options: {
          // more options here if you want to override JSHint defaults
        globals: {
          jQuery: true,
          console: true,
          module: true,
          matchMedia: true
        }
      }
    },

    concat: {
      options: {
        separator: ';'
      },
      pdg: {
        src: ['js/foundation/js/foundation/foundation.js', 'js/magnific-popup/dist/jquery.magnific-popup.js', 'js/custom/pdg.js'],
        dest: '.tmp/concat/pdg.js'
      },
      home: {
        src: ['js/custom/pdg-home.js'],
        dest: '.tmp/concat/pdg-home.js'
      }      
    },

    uglify: {
      dist: {
        options: {
          mangle: false
        },
        files: {
          'js/pdg.min.js': ['.tmp/concat/pdg.js'],
          'js/pdg-home.min.js': ['.tmp/concat/pdg-home.js']
        }
      }
    },

    watch: {
      grunt: { files: ['Gruntfile.js'] },

      sass: {
        files: 'scss/**/*.scss',
        tasks: ['sass'],
        options: {
          livereload: 35729
        }
      },

      js: {
        files: 'js/custom/*.js',
        options: {
          livereload: 35729
        },
        tasks: ['jshint', 'concat', 'uglify']
      },

      php: {
        files: '*.php',
        options: {
          livereload: 35729
        }
      },
    }
  });

  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-jshint');

  grunt.registerTask('build', ['sass', 'concat', 'uglify']);
  grunt.registerTask('default', ['copy', 'watch']);
};