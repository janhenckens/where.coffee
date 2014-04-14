<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Assets Folder Base Path
	|--------------------------------------------------------------------------
	|
	| This is where you can specify a custom path to your assets
	| directory. We've set a sensible default, but feel free to update it.
	|
	*/
	'assets_path' => 'app/assets',

	/*
	|--------------------------------------------------------------------------
	| Published Assets Folder Path
	|--------------------------------------------------------------------------
	|
	| This is where you can specify a custom path to your completed compiled,
	| minified and linted assets to be published to directory. We've set a 
	| sensible default, but feel free to update it.
	|
	*/
	'publish_path' => 'public/assets',

	/*
	|--------------------------------------------------------------------------
	| The CSS Path
	|--------------------------------------------------------------------------
	|
	| This is where you can specify a custom path to your CSS
	| directory. We've set a sensible default, but feel free to update it.
	|
	*/
	'css_path' => 'app/assets/css',

	/*
	|--------------------------------------------------------------------------
	| The CSS Output Name
	|--------------------------------------------------------------------------
	|
	| This is where you can specify a custom name to your CSS
	| file. We've set a sensible default, but feel free to update it.
	|
	*/
	'css_output_name' => 'style',

	/*
	|--------------------------------------------------------------------------
	| The CSS File Order
	|--------------------------------------------------------------------------
	|
	| This is where you can specify a custom order in which
	| CSS files will be concatenated, compiled and minified.
	| We've set a sensible default, but feel free to update it.
	|
	*/
	'css_files' => array(
		'app/assets/css/style_one.css',
		'app/assets/css/style_two.css'
	),

	/*
	|--------------------------------------------------------------------------
	| The JavaScript Path
	|--------------------------------------------------------------------------
	|
	| This is where you can specify a custom path to your JavaScript
	| directory. We've set a sensible default, but feel free to update it.
	|
	*/
	'js_path' => 'app/assets/js',

	/*
	|--------------------------------------------------------------------------
	| The JavaScript Output Name
	|--------------------------------------------------------------------------
	|
	| This is where you can specify a custom name to your JavaScript
	| file. We've set a sensible default, but feel free to update it.
	|
	*/
	'js_output_name' => 'script',

	/*
	|--------------------------------------------------------------------------
	| The JavaScript File Order
	|--------------------------------------------------------------------------
	|
	| This is where you can specify a custom order in which
	| JavaScript files will be concatenated, compiled and minified.
	| We've set a sensible default, but feel free to update it.
	|
	*/
	'js_files' => array(
		'app/assets/js/script_one.js',
		'app/assets/js/script_two.js'
	),

	/*
	|--------------------------------------------------------------------------
	| The SASS Path
	|--------------------------------------------------------------------------
	|
	| This is where you can specify a custom path to your SASS
	| directory. We've set a sensible default, but feel free to update it.
	|
	*/
	'sass_path' => 'app/assets/scss',

	/*
	|--------------------------------------------------------------------------
	| The Main SASS file
	|--------------------------------------------------------------------------
	|
	| This is where you can specify a custom path to your main SASS
	| file, which should include all imports to other SASS files.
	| We've set a sensible default, but feel free to update it.
	|
	*/
	'sass_file' => 'app/assets/scss/main.scss',

	/*
	|--------------------------------------------------------------------------
	| Bower Dependencies (vendor) Folder Path
	|--------------------------------------------------------------------------
	|
	| This is where you can specify a custom path for you bower dependencies to
	| reside in. We've set a sensible default, but feel free to update it.
	|
	*/
	"vendor_path" => "app/assets/vendor",

	/*
	|--------------------------------------------------------------------------
	| Bower Dependencies
	|--------------------------------------------------------------------------
	|
	| This is where you can specify your bower dependencies. We've set a 
	| sensible default, but feel free to update it.
	| 
	| **Note**: Please use key/value pair to represent dependency & version. Use 
	| the asterisk "*" if you require the latest version, or don't know a version
	| number
	|
	// */
	// "bower_dependencies" => array(
	// 	"jquery"    => "~1.10"
	// ),

);
