const gulp = require( 'gulp' );
const del = require( 'del' );
const run = require( 'gulp-run' );
const zip = require( 'gulp-zip' );

gulp.task( 'bundle', function() {
	return gulp.src( [
		'**/*',
		'!bin/**/*',
		'!node_modules/**/*',
		'!vendor/**/*',
		'!composer.*',
		'!release/**/*',
		'!src/**/*',
		'!src',
		'!tests/**/*',
		'!phpcs.xml'
	] )
		.pipe( gulp.dest( 'release/user-profile-picture-social-networks' ) );
} );

gulp.task( 'remove:bundle', function() {
	return del( [
		'release/user-profile-picture-social-networks',
	] );
} );

gulp.task( 'wporg:prepare', function() {
	return run( 'mkdir -p release' ).exec();
} );

gulp.task( 'release:copy-for-zip', function() {
	return gulp.src('release/user-profile-picture-social-networks/**')
		.pipe(gulp.dest('user-profile-picture-social-networks'));
} );

gulp.task( 'release:zip', function() {
	return gulp.src('user-profile-picture-social-networks/**/*', { base: "." })
	.pipe(zip('user-profile-picture-social-networks.zip'))
	.pipe(gulp.dest('.'));
} );

gulp.task( 'cleanup', function() {
	return del( [
		'release',
		'user-profile-picture-social-networks'
	] );
} );

gulp.task( 'clean:bundle', function() {
	return del( [
		'release/user-profile-picture-social-networks/bin',
		'release/user-profile-picture-social-networks/node_modules',
		'release/user-profile-picture-social-networks/vendor',
		'release/user-profile-picture-social-networks/tests',
		'release/user-profile-picture-social-networks/trunk',
		'release/user-profile-picture-social-networks/gulpfile.js',
		'release/user-profile-picture-social-networks/Makefile',
		'release/user-profile-picture-social-networks/package*.json',
		'release/user-profile-picture-social-networks/phpunit.xml.dist',
		'release/user-profile-picture-social-networks/README.md',
		'release/user-profile-picture-enhanced/CHANGELOG.md',
		'release/user-profile-picture-social-networks/webpack.config.js',
		'release/user-profile-picture-social-networks/.editorconfig',
		'release/user-profile-picture-social-networks/.eslistignore',
		'release/user-profile-picture-social-networks/.eslistrcjson',
		'release/user-profile-picture-social-networks/.git',
		'release/user-profile-picture-social-networks/.gitignore',
		'release/user-profile-picture-social-networks/src/block',
		'package/prepare',
	] );
} );

gulp.task( 'default', gulp.series(
	'remove:bundle',
	'bundle',
	'wporg:prepare',
	'clean:bundle',
	'release:copy-for-zip',
	'release:zip',
	'cleanup'
) );
