module.exports = function( grunt ) {

  require( 'jit-grunt' )( grunt );

  grunt.initConfig( {

    pkg: grunt.file.readJSON( 'package.json' ),

    compress: {
      dist: {
        options: {
          archive: 'dist/<%= pkg.name %>-<%= pkg.version %>.zip'
        },
        files: [
          {
            expand: true,
            src: [
              '**/*',
              '!**/node_modules/**',
              '!**/dist/**',
              '!Gruntfile.js',
              '!package.json'
            ]
          }
        ]
      }
    },

    aws_s3: {
      dist: {
        options: {
          accessKeyId: 'AKIAJC4EGG4H7YL2ZAYQ',
          secretAccessKey: '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',
          bucket: 'themebright-downloads',
          differential: true
        },
        files: [
          {
            expand: true,
            cwd: 'dist/',
            src: [ '**' ],
            dest: '.'
          }
        ]
      }
    },

    clean: {
      dist: [ '**dist**' ]
    }

  } );

  grunt.registerTask( 'dist', [ 'compress:dist', 'aws_s3:dist', 'clean:dist' ] );

};