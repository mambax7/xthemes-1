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

use XoopsModules\Xthemes;

/**
 * @param \XoopsModule $module
 * @return bool
 */
function xoops_module_pre_install_xthemes(\XoopsModule $module)
{
    $utility      = new Xthemes\Utility();
    $xoopsSuccess = $utility::version_check($module);
    $phpSuccess   = $utility::check_php_version($module);

    if (false !== $xoopsSuccess && false !== $phpSuccess) {
        $moduleTables = &$module->getInfo('tables');
        foreach ($moduleTables as $table) {
            $GLOBALS['xoopsDB']->queryF('DROP TABLE IF EXISTS ' . $GLOBALS['xoopsDB']->prefix($table) . ';');
        }
    }

    return $xoopsSuccess && $phpSuccess;
}

/**
 * @param \XoopsModule $module
 * @return bool
 */
function xoops_module_install_xthemes(XoopsModule $module)
{
    require dirname(dirname(dirname(__DIR__))) . '/mainfile.php';
    require dirname(__DIR__) . '/include/config.php';

    $xthemes_dir = basename(dirname(__DIR__));

    /** @var \XoopsModules\Xthemes\Helper $helper */
    $helper       = Xthemes\Helper::getInstance();
    $utility      = new Xthemes\Utility();
    $configurator = new Xthemes\Config();
    // Load language files
    $helper->loadLanguage('admin');
    $helper->loadLanguage('modinfo');

    // default Permission Settings ----------------------
    global $xoopsModule;
    $moduleId  = $xoopsModule->getVar('mid');
    $moduleId2 = $helper->getModule()->mid();
    /** @var \XoopsGroupPermHandler $grouppermHandler */
    $grouppermHandler = xoops_getHandler('groupperm');
    // access rights ------------------------------------------
    $grouppermHandler->addRight($xthemes_dir . '_approve', 1, XOOPS_GROUP_ADMIN, $moduleId);
    $grouppermHandler->addRight($xthemes_dir . '_submit', 1, XOOPS_GROUP_ADMIN, $moduleId);
    $grouppermHandler->addRight($xthemes_dir . '_view', 1, XOOPS_GROUP_ADMIN, $moduleId);
    $grouppermHandler->addRight($xthemes_dir . '_view', 1, XOOPS_GROUP_USERS, $moduleId);
    $grouppermHandler->addRight($xthemes_dir . '_view', 1, XOOPS_GROUP_ANONYMOUS, $moduleId);

    //  ---  CREATE FOLDERS ---------------
    if (count($configurator->uploadFolders) > 0) {
        //    foreach (array_keys($GLOBALS['uploadFolders']) as $i) {
        foreach (array_keys($configurator->uploadFolders) as $i) {
            $utility::module_create_folder($configurator->uploadFolders[$i]);
        }
    }

    //  ---  COPY blank.png FILES ---------------
    if (count($configurator->copyBlankFiles) > 0) {
        $file = dirname(__DIR__) . '/assets/images/blank.png';
        foreach (array_keys($configurator->copyBlankFiles) as $i) {
            $dest = $configurator->copyBlankFiles[$i] . '/blank.png';
            $utility::module_copy_file($file, $dest);
        }
    }

    $sql = 'DELETE FROM ' . $GLOBALS['xoopsDB']->prefix('tplfile') . " WHERE `tpl_module` = '" . $xoopsModule->getVar('dirname', 'n') . "' AND `tpl_file` LIKE '%.html%'";
    $GLOBALS['xoopsDB']->queryF($sql);

    return true;
}
