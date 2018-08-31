var gulp = require('gulp');
var prefixer = require('gulp-autoprefixer');
var less = require('gulp-less');
var glob = require("glob");
var frontend = require("./@gulp-entry-points");
var uglifycss = require("gulp-uglifycss");
var googleWebFonts = require("gulp-google-webfonts");

gulp.task('default', function(){
	compileLess();
	var source;
	for(source in frontend){
		gulp.watch(source + '/**/*.less', function(event){
			compileLess();
		});
	}
});

gulp.task('build', function(){
	copyFonts();
	compileLess();
});

gulp.task('fonts', function(){
	copyFonts();
});

function copyFonts(){
	gulp.src('node_modules/@fortawesome/fontawesome-pro/webfonts/*').pipe(gulp.dest('public/dist/fonts/fontawesome'));

	for(var folder in frontend){
		var options = {
			fontsDir: 'dist/fonts/google-fonts/',
			cssDir: 'dist/'+frontend[folder]+'/',
			cssFilename: 'google-fonts.css',
			outBaseDir: '',
			relativePaths: true,
		};

		gulp.src(folder+'/google-fonts')
		.pipe(googleWebFonts(options))
		.pipe(gulp.dest('public'));
	}
}

function compileLess(){
	var entries = getEntries();
	var source;
	for(source in entries){
		gulp
		.src(source)
		.pipe(less())
		.pipe(uglifycss({
			"maxLineLen": 80,
			"uglyComments": true
		}))
		.pipe(prefixer('last 2 versions', 'ie 9'))
		.pipe(gulp.dest('./public/dist/' + entries[source]));
	}
}

function getEntries(){
	var entries = {};
	var folder;
	for(folder in frontend){
		Object.assign(entries, getFolderEntries(folder, frontend[folder]));
	}
	return entries;
}

function getFolderEntries(folder, target){
	var items = {};
	var sources = glob.sync(folder + "/*.less");
	for(var source of sources){
		items[source] = target;
	}
	return (items);
}