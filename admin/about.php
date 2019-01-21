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

include_once __DIR__ . '/admin_header.php';

//xoops_cp_header();

$aboutAdmin = new ModuleAdmin();

echo $aboutAdmin->addNavigation('about.php');
echo $aboutAdmin->renderAbout('angelo.ofp@gmail.com', false);

include 'admin_footer.php';