const gulp = require( 'gulp' );
const babel = require( 'gulp-babel' );
const uglify = require( 'gulp-uglify' );
const tap = require( 'gulp-tap' );
const buffer = require( 'gulp-buffer' );
const browserify = require( 'browserify' );
const sass = require( 'gulp-sass' );
const autoprefixer = require( 'gulp-autoprefixer' );
const clean_css = require( 'gulp-clean-css' );
const rename = require( 'gulp-rename' );

const css_files = [
    './assets/css/**/*.scss'
];
const js_files = [
    './assets/js/**/*.js',
    '!./assets/js/**/*.min.js',
    '!./assets/js/modules/**/*.js'
];

const scripts = () => {
    return (
        gulp.src( js_files, {read: false} )
            .pipe( tap( ( file ) => {
                file.contents = browserify( file.path ).bundle();
            } ) )
            .pipe( buffer() )
            .pipe( babel( {
                presets: [
                    [
                        '@babel/env',
                    ]
                ]
            } ) )
            .pipe( uglify() )
            .pipe( rename( { suffix: '.min' } ) )
            .pipe( gulp.dest( ( file ) => file.base ) )
    )
}

exports.scripts = scripts;

const styles = () => {
    return (
        gulp.src( css_files )
            .pipe( sass() )
            .pipe( autoprefixer( {
                cascade: false
            } ) )
            .pipe( clean_css() )
            .pipe( rename( { suffix: '.min' } ) )
            .pipe( gulp.dest( ( file ) => file.base ) )
    )
}

exports.styles = styles;

const watch = () => {
    gulp.watch( js_files, scripts );
    gulp.watch( css_files, styles );
}

exports.watch = watch;

exports.default = gulp.series(
    gulp.parallel(
        scripts,
        styles,
    ),
    watch
);