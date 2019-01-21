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

function xthemes_config() {
	$xthemes_dir       = basename( dirname( __DIR__ ) );
	$xthemes_dir_upper = strtoupper( $xthemes_dir );

	return (object) [
		'name'           => strtoupper( $xthemes_dir ) . ' Module Configurator',
		'paths'          => [
			'dirname'    => $xthemes_dir,
			'admin'      => XOOPS_ROOT_PATH . '/modules/' . $xthemes_dir . '/admin',
			'modPath'    => XOOPS_ROOT_PATH . '/modules/' . $xthemes_dir,
			'modUrl'     => XOOPS_URL . '/modules/' . $xthemes_dir,
			'uploadPath' => XOOPS_UPLOAD_PATH . '/' . $xthemes_dir,
			'uploadUrl'  => XOOPS_UPLOAD_URL . '/' . $xthemes_dir,
		],
		'uploadFolders'  => [
			XOOPS_UPLOAD_PATH . '/' . $xthemes_dir,
			XOOPS_UPLOAD_PATH . '/' . $xthemes_dir . '/styles',
			XOOPS_UPLOAD_PATH . '/' . $xthemes_dir . '/theme_images',
		],
		'copyBlankFiles' => [
			XOOPS_UPLOAD_PATH . '/' . $xthemes_dir,
			XOOPS_UPLOAD_PATH . '/' . $xthemes_dir . '/styles',
			XOOPS_UPLOAD_PATH . '/' . $xthemes_dir . '/theme_images',
		],

		'copyTestFolders' => [
			# do something...
		],

		'templateFolders' => [
			'/templates/',
			'/templates/blocks/',
			'/templates/admin/',
		],
		'oldFiles'        => [
			'/class/request.php',
			'/class/registry.php',
			'/class/utilities.php',
			'/class/util.php',
			'/ajaxrating.txt',
		],
		'oldFolders'      => [
			'/images',
			'/css',
			'/js',
			'/tcpdf',
			'/images',
		],
		'renameTables'    => [
			# do something...
		],
		'modCopyright'    => "<a href='https://xoops.org' title='XOOPS Project' target='_blank'>
                     <img src='" . constant( $xthemes_dir_upper . '_AUTHOR_LOGOIMG' ) . '\' alt=\'XOOPS Project\'></a>',
	];
}