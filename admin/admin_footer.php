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

echo "<div class='adminfooter'>\n"
     . "<div class='center'>\n"
     . "<a href='http://www.xoops.org' rel='external' target='_blank'>"
     . "<img src='" . Xmf\Module\Admin::iconUrl('xoopsmicrobutton.gif', '32') . "' "
     . "alt='XOOPS' title='XOOPS'></a>\n"
     . "</div>\n"
     . _AM_MODULEADMIN_ADMIN_FOOTER . "\n"
     . "</div>\n";

xoops_cp_footer();