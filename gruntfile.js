//exporting our grunt module
module.exports = function(grunt) {
	configObject = {
		// SASS
		sass: {
			dist: {
				options: { 
					style: 'expanded',
					"sourcemap=none": ''
				},
				files: [{
					expand: true,
					cwd: 'src/sass',
					src: ['*sass'],
					dest: 'assets/css/',
					ext: '.css'
				}]
			}//dist
		}//sass
	};
	// baseconfig
	grunt.initConfig(configObject);
	// other
	grunt.loadNpmTasks('grunt-contrib-sass');

	//make grunt command
	grunt.registerTask('compile-sass',['sass']);
}
