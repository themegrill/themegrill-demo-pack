/* jshint node:true */
module.exports = function( grunt ){
	'use strict';

	// Register tasks
	grunt.registerTask( 'default', function () {
		grunt.log.writeln( "\n ################################################## " );
		grunt.log.writeln( " ######### ThemeGrill Demo Pack Generator ######### " );
		grunt.log.writeln( " ################################################## \n" );
		grunt.log.writeln( " # Commands: \n" );
		grunt.log.writeln( " grunt compress = Gets the demo data files and generates zip files " );
	});

	grunt.registerTask( 'compress', function() {
		var fs    = require( 'fs' ),
			files = fs.readdirSync( 'resources/' ),
			done  = this.async();

		files.forEach( function( file ) {
			grunt.log.writeln( file );
		});

		done();
	});
};
