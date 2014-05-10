module.exports = function(grunt) {
	// Project configuration.
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		compass: {
		 	dev: {
		 		options: {
		 			sassDir: ['scss'],
		 			cssDir: ['css'],
		 			environment: 'development'
		 		}
		 	},
			prod: {
				options: {
					sassDir: ['scss'],
		 			cssDir: ['css'],
					environment: 'production'
				},
			}
		},
		watch: {
			compass: {
				files: ['scss/*.{scss,sass}'],
				tasks: ['compass:dev']
			},
			js: {
				files: ['js/*.js'],
				tasks: ['uglify']
			}
		},
		uglify: {
			all: {
				files: {
					'js/min/app.min.js': [
						'../../js/foundation/bower_components/modernizr/modernizr.js',
						'../../js/foundation/bower_components/jquery/dist/jquery.min.js', 
						'../../js/foundation/bower_components/foundation/js/foundation.min.js',
						'js/src/main.js'
					]
				}
			},
		}
	});

	// Dependent plugins.
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-compass');
	grunt.loadNpmTasks('grunt-contrib-uglify');


	// Default task(s).
	grunt.registerTask('default', ['compass:dev' , 'uglify' , 'watch']);
 };