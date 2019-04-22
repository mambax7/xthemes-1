<?php
/**
 * Extend XOOPS Themes
 *
 * @copyright           (c) 2019-2019 XOOPS Project (www.xoops.org)
 * @license                 GNU GPL 3 (https://www.gnu.org/licenses/gpl-3.0.html)
 * @package                 xthemes
 * @since                   1.0.0
 * @author                  Angelo Rocha
 * @author                  Angelo Rocha <contato@angelorocha.com.br>
 */
include dirname(__DIR__) . '/preloads/autoloader.php';

require  dirname(dirname(dirname(__DIR__))) . '/include/cp_header.php';
require_once dirname(__DIR__) . '/include/config.php';
require  dirname(__DIR__) . '/include/common.php';

/** @var \XoopsModules\Xthemes\Helper $helper */
$helper = \XoopsModules\Xthemes\Helper::getInstance();

/** @var \Xmf\Module\Admin $adminObject */
$adminObject = \Xmf\Module\Admin::getInstance();


$pathIcon16      = Xmf\Module\Admin::iconUrl('', 16);
$pathIcon32      = Xmf\Module\Admin::iconUrl('', 32);

//load handlers
$myts = MyTextSanitizer::getInstance();
if (!isset($xoopsTpl) || !is_object($xoopsTpl)) {
    include_once XOOPS_ROOT_PATH . '/class/template.php';
    $xoopsTpl = new XoopsTpl();
}

$xoopsTpl->assign('pathIcon16', $pathIcon16);
$xoopsTpl->assign('pathIcon32', $pathIcon32);
//Load languages
$helper->loadLanguage('admin');
$helper->loadLanguage('modinfo');
$helper->loadLanguage('main');

xoops_cp_header();
