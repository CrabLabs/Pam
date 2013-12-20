module.exports = function(grunt) {
  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    jshint: {
      options: {
        curly: true,
        eqeqeq: true,
        eqnull: true,
        browser: true,
        globals: {
          jQuery: true
        },
      },
      all: ['public/js/*.js'],
      ignores: ['public/js/main.min.js']
    },
    compass: {
      dev: {
        options: {
          cssDir: 'public/css',
          sassDir: 'public/sass',
          imagesDir: 'img',
          javascriptsDir: 'js',
          cacheDir: 'public/.sass-cache'
        }
      }
    },
    watch: {
      txt: {
        files: 'app/**/*.php',
        options: {
          livereload: true
        }
      },
      css: {
        files: 'public/sass/**/*.scss',
        tasks: ['compass'],
        options: {
          livereload: true
        }
      }
    },
    uglify: {
      options: {
        banner: '/** <%= pkg.name %>\n * @author: <%= pkg.author %>\n * @date: <%= grunt.template.today("yyyy-mm-dd") %>\n */\n'
      },
      my_target: {
        files: [{
          expand: true,
          cwd: 'public/js',
          src: '**/*.js',
          dest: 'public/js/dist'
        }]
      }
    }
  });
  // Load the plugins that provides the "uglify", "jshint", "compass" and "watch" task.
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  // Default task(s).
  grunt.registerTask('default', [
    'jshint',
    'compass'
    // 'uglify'
  ]);
};
