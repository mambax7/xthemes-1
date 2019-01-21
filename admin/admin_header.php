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

include_once dirname(dirname(dirname(__DIR__))) . '/mainfile.php';
include_once XOOPS_ROOT_PATH . '/include/cp_header.php';
include_once dirname(__DIR__) . '/include/config.php';

$thisDirname = $GLOBALS['xoopsModule']->getVar('dirname');

$pathIcon16      = '../' . $xoopsModule->getInfo('icons16');
$pathIcon32      = '../' . $xoopsModule->getInfo('icons32');
$pathModuleAdmin = $GLOBALS['xoopsModule']->getInfo('dirmoduleadmin');
//load handlers

$myts = MyTextSanitizer::getInstance();
if (!isset($xoopsTpl) || !is_object($xoopsTpl)) {
	include_once(XOOPS_ROOT_PATH . "/class/template.php");
	$xoopsTpl = new XoopsTpl();
}

$xoopsTpl->assign('pathIcon16', $pathIcon16);
$xoopsTpl->assign('pathIcon32', $pathIcon32);
//Load languages
xoops_loadLanguage('admin', $thisDirname);
xoops_loadLanguage('modinfo', $thisDirname);
xoops_loadLanguage('main', $thisDirname);
// Locad admin menu class
include_once $GLOBALS['xoops']->path($pathModuleAdmin . '/moduleadmin.php');

xoops_cp_header();

$adminMenu = new ModuleAdmin();
