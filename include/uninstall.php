<?php
/**
 * Extend XOOPS Themes
 *
 * @param \XoopsModule $module
 * @return bool
 * @package                 xthemes
 * @since                   1.0.0
 * @author                  Angelo Rocha
 * @author                  Angelo Rocha <contato@angelorocha.com.br>
 * @copyright           (c) 2019-2019 XOOPS Project (www.xoops.org)
 * @license                 GNU GPL 3 (https://www.gnu.org/licenses/gpl-3.0.html)
 */
function xoops_module_pre_uninstall_xthemes(XoopsModule $module)
{
    return true;
}

/**
 * @param \XoopsModule $module
 * @return bool
 */
function xoops_module_uninstall_xthemes(XoopsModule $module)
{
    return true;
}
