<?php
/**
 * Extend XOOPS Themes
 *
 * @copyright           (c) 2019-2019 XOOPS Project (www.xoops.org)
 * @license             GNU GPL 3 (https://www.gnu.org/licenses/gpl-3.0.html)
 * @package             xthemes
 * @since               1.0.0
 * @author              Angelo Rocha
 * @author              Angelo Rocha <contato@angelorocha.com.br>
 */

spl_autoload_register( function ( $class ) {

	// project-specific namespace prefix
	$prefix = 'XoopsModules\\' . ucfirst( basename( dirname( __DIR__ ) ) );

	// base directory for the namespace prefix
	$baseDir = dirname( __DIR__ ) . '/class/';

	// does the class use the namespace prefix?
	$len = mb_strlen( $prefix );

	if ( 0 !== strncmp( $prefix, $class, $len ) ) {
		return;
	}

	// get the relative class name
	$relativeClass = mb_substr( $class, $len );

	// replace the namespace prefix with the base directory, replace namespace
	// separators with directory separators in the relative class name, append
	// with .php
	$file = $baseDir . str_replace( '\\', '/', $relativeClass ) . '.php';


	// if the file exists, require it
	if ( file_exists( $file ) ) {
		require $file;
	}
} );