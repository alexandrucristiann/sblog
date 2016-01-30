//exporting our grunt module
module.exports = function(grunt) {

grunt.registerTask('doc', function() {
console.log(
` 
	
=============== SBLOG WEB APP =========================

In order to participate in development of the project
please consult the README.md
We will include a special section for developers.

In order to have a fast development process we use this
task runner called grunt to automate our tasks.


Commands:
	grunt compile

	=== Compiles all the Sass and Jade files. We first concat
	every sass file into one file and after that we compile to css.
	All jade files are separate. (ex index.jade ==> index.html).
	Jade files are compiled to html.
	Using this template system we:
	 - write less clunky markup;
	 - maintaining is eazy;
	 - time saver;
`

);});
	
	//Basic configurations
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

		//CONCAT
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
	grunt.registerTask('compile', ['jade','concat', 'sass']);

	grunt.registerTask('default', ['doc']);
}//module.exports
