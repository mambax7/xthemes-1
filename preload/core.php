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

defined( 'XOOPS_ROOT_PATH' ) || die( 'Restricted access' );

/**
 * Class XthemesCorePreload
 */

class XthemesCorePreload extends XoopsPreloadItem {

	/**
	 * @param $args
	 */
	public static function eventCoreIncludeCommonEnd( $args ) {
		require_once __DIR__ . '/autoloader.php';
	}
}
