require('es6-promise').polyfill();

/*==============================================================================
Gulp
==============================================================================*/

var gulp = require( 'gulp' ),
	gulpLoadPlugins = require( 'gulp-load-plugins' ),
	p = gulpLoadPlugins();

function handleError( err ) {
	console.log( err.toString() );
	this.emit( 'end' );
}

/*==============================================================================
Clean
==============================================================================*/

gulp.task( 'clean', function() {
	gulp.src( [ 'css', 'js', 'images', 'fonts' ], { 
			read: false
		})
		.pipe( p.rimraf() )
		.pipe( p.notify( 'Gulp Clean Task Complete' ) );
});

/*==============================================================================
Styles
==============================================================================*/

/*gulp.task( 'styles', function() {
	return gulp.src( 'src/scss/imports.scss' )
		.pipe( p.rubySass( {
			style: 'expanded'
		}))
		.on( 'error', handleError)
		.pipe( p.rename( 'main.css' ) )
		.pipe( gulp.dest( 'rock-star-gallery/css' ) )
		.pipe( p.autoprefixer() )
		.pipe( p.combineMediaQueries() )
		.pipe( p.minifyCss( { advanced: false } ) )
		.pipe( p.rename( 'main.min.css' ) )
		.pipe( gulp.dest( 'rock-star-gallery/css' ) )
		.pipe( p.notify( 'Gulp CSS Task Completed' ) );
});*/

// gulp.task( 'styles-wp', function() {
// 	p.rubySass( 'src/scss/wp-admin.scss', {
// 			//container: 'gulp-ruby-sass-wp-admin',
// 			style: 'compressed'
// 		})
// 		.on( 'error', handleError)
// 		.pipe( p.autoprefixer() )
// 		.pipe( gulp.dest( 'rock-star-gallery/css' ) );

// 	return p.rubySass( 'src/scss/wp-login.scss', {
// 			//container: 'gulp-ruby-sass-wp-login',
// 			style: 'compressed'
// 		})
// 		.on( 'error', handleError)
// 		.pipe( p.autoprefixer() )
// 		.pipe( gulp.dest( 'rock-star-gallery/css' ) );
// });

gulp.task( 'styles', function() {
	return p.rubySass( 'src/scss/main.scss', {
			//container: 'gulp-ruby-sass-imports',
			style: 'expanded'
		})
		.on( 'error', handleError)
		.pipe( p.rename( 'main.css' ) )
		.pipe( gulp.dest( 'rock-star-gallery/css' ) )
		.pipe( p.autoprefixer() )
		.pipe( p.groupCssMediaQueries() )
		.pipe( p.minifyCss( { advanced: false } ) )
		.pipe( p.rename( 'main.min.css' ) )
		.pipe( gulp.dest( 'rock-star-gallery/css' ) )
		.pipe( p.notify( 'Gulp Styles Task Completed' ) );
});

/*==============================================================================
Scripts
==============================================================================*/

gulp.task( 'scripts1', function() {
	return gulp.src( [ 'src/js/*.js', '!src/js/imports.js',] )
		.pipe( p.jshint() )
		.pipe( p.jshint.reporter( 'default') );
});

gulp.task( 'scripts2', [ 'scripts1' ], function() {
	return gulp.src( 'src/js/lib/imports.js' )
		.pipe( p.imports() )
		.pipe( p.uglify() )
		.pipe( p.rename( 'imports.lib.min.js' ) )
		.pipe( gulp.dest( 'temp' ) );
});

gulp.task( 'scripts3', [ 'scripts2' ], function() {
	return gulp.src( 'src/js/imports.js' )
		.pipe( p.imports() )
		.pipe( p.uglify() )
		.on( 'error', handleError )
		.pipe( p.rename( 'imports.min.js' ) )
		.pipe( gulp.dest( 'temp' ) );
});

gulp.task( 'scripts4', [ 'scripts3' ], function() {
	return gulp.src( [ 'temp/imports.lib.min.js', 'temp/imports.min.js' ] )
		.pipe( p.concat( 'main.min.js') )
		.pipe( gulp.dest( 'rock-star-gallery/js' ) );
});

gulp.task( 'scripts5', [ 'scripts4' ], function() {
	return gulp.src( 'temp', {
			read: false
		})
		.pipe( p.rimraf() );
});

gulp.task( 'scripts', [ 'scripts5' ], function() {
	return gulp.src( 'src/js/lib/modernizr.min.js' )
		.pipe( gulp.dest( 'rock-star-gallery/js' ) )
		.pipe( p.notify( 'Gulp Scripts Task Complete' ) );
});

/*==============================================================================
Images
==============================================================================*/

gulp.task( 'images', function() {
	gulp.src( 'src/img/**/*' )
		.pipe( p.changed( 'rock-star-gallery/img' ) )
		.pipe( p.imagemin( { optimizationLevel: 3, progressive: true, interlaced: true } ) )
		.pipe( gulp.dest( 'rock-star-gallery/img' ) )
		.pipe( p.notify( 'Gulp Images Task Completed' ) );
});

/*==============================================================================
Fonts
==============================================================================*/

gulp.task( 'fonts', function() {
	gulp.src('src/fonts/**/*' )
		.pipe( gulp.dest( 'rock-star-gallery/fonts' ) )
		.pipe( p.notify( 'Gulp Fonts Task Completed' ) );
});

/*==============================================================================
Watch
==============================================================================*/

gulp.task('watch', function() {
	gulp.watch( 'src/scss/**/*', [ 'styles' ] );
	gulp.watch( 'src/js/**/*.js', [ 'scripts' ] );
	gulp.watch( 'src/img/**/*', [ 'images' ] );
	gulp.watch( 'src/fonts/**/*', [ 'fonts' ] );
});

/*==============================================================================
Default
==============================================================================*/

gulp.task( 'default', [ 'styles', 'scripts', 'images', 'fonts' ], function() {
	gulp.start( 'watch' );
});