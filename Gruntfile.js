module.exports = function(grunt) {
	// Project configuration.
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		watch: {
			compass: {
				files: ['themes/**/scss/*.{scss,sass}'],
				tasks: ['compass:dev']
			},
			js: {
				files: ['themes/**/js/*.js'],
				tasks: ['uglify']
			}
		},
		compass: {
		 	dev: {
		 		options: {
		 			sassDir: ['themes/foundation/scss'],
		 			cssDir: ['themes/foundation/css'],
		 			environment: 'development'
		 		}
		 	},
			prod: {
				options: {
					sassDir: ['themes/foundation/sass'],
					cssDir: ['themes/foundation/css'],
					environment: 'production'
				},
			}
		},
		uglify: {
			all: {
				files: {
					'js/min/app.min.js': [
						'js/foundation/bower_components/jquery/dist/jquery.min.js', 
						'js/foundation/bower_components/foundation/js/foundation.min.js',
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