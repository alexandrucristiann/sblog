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

*	grunt compile

	=== Compiles all the Sass and Jade files. We first concat
	every sass file into one file and after that we compile to css.
	All jade files are separate. (ex index.jade ==> index.html).
	Jade files are compiled to html.
	Using this template system we:
	 - write less clunky markup;
	 - maintaining is eazy;
	 - time saver;



*	grunt see
	
	=== It does all the things that grunt compile command does 
	but it reruns automatically for every modification on any 
	template, js files in assets/ folder



*	grunt live
	
	=== Start a http server to live reload all pages in the browser
	whenever something changes.
	NOTE this dosen't work for livereloading PHP files.In order to
	see the result in the browser please install and use xampp/apache
	/nginx etc.
`

);});
	
	//Basic configurations
	configObject = {
		pkg: grunt.file.readJSON('package.json'),
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
				src: 'assets/sass/modules/*.sass',
				dest: 'assets/sass/main.sass'
			}
		},
		//BROWSERIFY
		browserify: {
			dist: {
				files:{
					'assets/js/main.js': ['assets/js/modules/*.js']
				},
				options: {
					//transform: ["hbsfy"],
					browserifyOptons: {
						debug: true
					}
				}
			}
		},
		budo: {
			options: {
				debug: true,
				live: true
			},
			src: ['assets/js/main.js']
		},
		//WATCH
		watch: {
			configFiles: {
				files:['Gruntfile.js'],
				options: {
					reload: true
				}
			},

			sass: {
				files:['assets/sass/modules/*.sass'],
				tasks:['concat', 'sass']
			},

			jade: {
				files:['assets/jade/*.jade'],
				tasks:['jade']
			},

			js: {
				files:['assets/js/modules/*.js'],
				tasks:['browserify']
			}
		}

};// configObject

	// baseconfig
	grunt.initConfig(configObject);

	// other
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-jade');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-browserify');	
	grunt.loadNpmTasks('grunt-budo');

	//make grunt command
	grunt.registerTask('compile', ['jade', 'concat', 'sass', 'browserify']);
	grunt.registerTask('live',['budo']);
	grunt.registerTask('see', ['watch']);
	//doc
	grunt.registerTask('default', ['doc']);
}//module.exports
