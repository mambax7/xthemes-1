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
include_once __DIR__ . '/admin_header.php';

//xoops_cp_header();

$adminObject->displayNavigation(basename(__FILE__));
$adminObject::setPaypal('angelo.ofp@gmail.com');
$adminObject->displayAbout(false);

include  __DIR__ . '/admin_footer.php';
