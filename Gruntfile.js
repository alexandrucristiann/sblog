//exporting our grunt module
module.exports = function(grunt) {
	configObject = {
		// SASS
		sass: {
			compile: {
				options: { 
					style: 'expanded',
					"sourcemap=none": ''
				},
				files: {
					'assets/css/main.css': 'assets/sass/main.sass'
				}
				/*
				files: [ {
					expand: true,
					cwd: 'assets/sass',
					src: ['*sass'],
					dest: 'assets/css/',
					ext: '.css'
				}  ]*/
			}//dist
		},//sass

		// JADE
		jade: {
			compile: {
				options: {
					client: false,
					pretty: true
				},
				files: [ {
					cwd: "assets/jade",
					src: "**/*.jade",
					dest: "./",
					expand: true,
					ext: ".html"
				} ]
			}//compile
		},

		concat: {
			jade: {
				src: 'assets/sass/*.sass',
				dest: 'assets/sass/main.sass'
			}

		}
	};// configObject


	// baseconfig
	grunt.initConfig(configObject);
	// other
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-jade');
	grunt.loadNpmTasks('grunt-contrib-concat');
	//make grunt command
	grunt.registerTask('default', ['jade','concat', 'sass']);

}//module.exports
