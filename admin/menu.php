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
$dirname        = basename(dirname(__DIR__));
$module_handler = xoops_getHandler("module");
$xoopsModule    = XoopsModule::getByDirname($dirname);
$moduleInfo     = $module_handler->get($xoopsModule->getVar("mid"));
$pathIcon32     = $moduleInfo->getInfo("icons32");
$adminmenu      = array();

$adminmenu[] = array(
	'title' => _MI_XTHEMES_ADMIN_HOME,
	'link'  => 'admin/index.php',
	'icon'  => $pathIcon32 . '/home.png'
);

$adminmenu[] = array(
	'title' => _MI_XTHEMES_ADMIN_SLIDE,
	'link'  => 'admin/admin_slide.php',
	'icon'  => $pathIcon32 . '/slideshow.png'
);

$adminmenu[] = array(
	'title' => _MI_XTHEMES_ADMIN_MENU,
	'link'  => 'admin/admin_menu.php',
	'icon'  => $pathIcon32 . '/category.png'
);

$adminmenu[] = array(
	'title' => _MI_XTHEMES_ADMIN_THEMES,
	'link'  => 'admin/admin_themes.php',
	'icon'  => $pathIcon32 . '/folder1_html.png'
);

$adminmenu[] = array(
	'title' => _MI_XTHEMES_ADMIN_ABOUT,
	'link'  => 'admin/about.php',
	'icon'  => $pathIcon32 . '/about.png'
);