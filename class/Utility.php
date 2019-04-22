<?php

namespace XoopsModules\Xthemes;


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
class Utility extends \XoopsObject
{
    /**
     * Check XOOPS Version
     *
     * @param \XoopsModule|null $module
     * @param null              $required_version
     *
     * @return bool
     */
    public static function version_check(\XoopsModule $module = null, $required_version = null)
    {
        $moduleDirName      = basename(dirname(dirname(__DIR__)));
        $moduleDirNameUpper = mb_strtoupper($moduleDirName);
        if (null === $module) {
            $module = \XoopsModule::getByDirname($moduleDirName);
        }
        xoops_loadLanguage('admin', $moduleDirName);

        //check for minimum XOOPS version
        $currentVer = mb_substr(XOOPS_VERSION, 6); // get the numeric part of string
        if (null === $required_version) {
            $required_version = '' . $module->getInfo('min_xoops'); //making sure it's a string
        }
        $success = true;

        if (version_compare($currentVer, $required_version, '<')) {
            $success = false;
            $module->setErrors(sprintf(constant('CO_' . $moduleDirNameUpper . '_ERROR_BAD_XOOPS'), $required_version, $currentVer));
        }

        return $success;
    }

    /**
     * Check PHP Version
     *
     *
     * @param \XoopsModule $module
     * @return bool
     */
    public static function check_php_version(\XoopsModule $module)
    {
        $moduleDirName      = basename(dirname(dirname(__DIR__)));
        $moduleDirNameUpper = mb_strtoupper($moduleDirName);
        xoops_loadLanguage('admin', $module->dirname());
        // check for minimum PHP version
        $success = true;
        $verNum  = PHP_VERSION;
        $reqVer  = $module->getInfo('min_php');
        if (false !== $reqVer && '' !== $reqVer) {
            if (version_compare($verNum, $reqVer, '<')) {
                $module->setErrors(sprintf(constant('CO_' . $moduleDirNameUpper . '_ERROR_BAD_PHP'), $reqVer, $verNum));
                $success = false;
            }
        }

        return $success;
    }

    /**
     * Get server info
     * @return string
     */
    public function server_status()
    {
        $moduleDirName      = basename(dirname(dirname(__DIR__)));
        $moduleDirNameUpper = mb_strtoupper($moduleDirName);
        xoops_loadLanguage('common', $moduleDirName);
        $html = '';
        $html .= "<fieldset><legend style='font-weight: bold; color: #900;'>" . constant('CO_' . $moduleDirNameUpper . '_IMAGEINFO') . "</legend>\n";
        $html .= "<div style='padding: 8px;'>\n";
        $html .= '<div>' . constant('CO_' . $moduleDirNameUpper . '_SPHPINI') . "</div>\n";
        $html .= "<ul>\n";

        $gdlib = function_exists('gd_info') ? '<span style="color: green;">' . constant('CO_' . $moduleDirNameUpper . '_GDON') . '</span>' : '<span style="color: red;">' . constant('CO_' . $moduleDirNameUpper . '_GDOFF') . '</span>';
        $html  .= '<li>' . constant('CO_' . $moduleDirNameUpper . '_GDLIBSTATUS') . $gdlib;
        if (function_exists('gd_info')) {
            if (true === ($gdlib = gd_info())) {
                $html .= '<li>' . constant('CO_' . $moduleDirNameUpper . '_GDLIBVERSION') . '<b>' . $gdlib['GD Version'] . '</b>';
            }
        }
        $downloads = ini_get('file_uploads') ? '<span style="color: green;">' . constant('CO_' . $moduleDirNameUpper . '_ON') . '</span>' : '<span style="color: red;">' . constant('CO_' . $moduleDirNameUpper . '_OFF') . '</span>';
        $html      .= '<li>' . constant('CO_' . $moduleDirNameUpper . '_SERVERUPLOADSTATUS') . $downloads;

        $html .= '<li>' . constant('CO_' . $moduleDirNameUpper . '_MAXUPLOADSIZE') . ' <b><span style="color: blue;">' . ini_get('upload_max_filesize') . "</span></b>\n";
        $html .= '<li>' . constant('CO_' . $moduleDirNameUpper . '_MAXPOSTSIZE') . ' <b><span style="color: blue;">' . ini_get('post_max_size') . "</span></b>\n";
        $html .= '<li>' . constant('CO_' . $moduleDirNameUpper . '_MEMORYLIMIT') . ' <b><span style="color: blue;">' . ini_get('memory_limit') . "</span></b>\n";
        $html .= "</ul>\n";
        $html .= "<ul>\n";
        $html .= '<li>' . constant('CO_' . $moduleDirNameUpper . '_SERVERPATH') . ' <b>' . XOOPS_ROOT_PATH . "</b>\n";
        $html .= "</ul>\n";
        $html .= "<br>\n";
        $html .= constant('CO_' . $moduleDirNameUpper . '_UPLOADPATHDSC') . "\n";
        $html .= '</div>';
        $html .= '</fieldset><br>';

        return $html;
    }

    /**
     * Module Files
     *
     * @param $folder
     */
    public static function module_create_folder($folder)
    {
        try {
            if (!file_exists($folder)) {
                if (!is_dir($folder) && !mkdir($folder) && !is_dir($folder)) {
                    throw new \RuntimeException(sprintf('Unable to create the %s directory', $folder));
                }

                file_put_contents($folder . '/index.html', '<script>history.go(-1);</script>');
            }
        }
        catch (\Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n", '<br>';
        }
    }

    /**
     * @param $file
     * @param $folder
     *
     * @return bool
     */
    public static function module_copy_file($file, $folder)
    {
        return copy($file, $folder);
    }

    /**
     * @param $src
     * @param $mod_file
     */
    public static function module_copy_recursive($src, $mod_file)
    {
        $dir = opendir($src);
        //        @mkdir($mod_file);
        if (!@mkdir($mod_file) && !is_dir($mod_file)) {
            throw new \RuntimeException('The directory ' . $mod_file . ' could not be created.');
        }
        while (false !== ($file = readdir($dir))) {
            if (('.' !== $file) && ('..' !== $file)) {
                if (is_dir($src . '/' . $file)) {
                    self::module_copy_recursive($src . '/' . $file, $mod_file . '/' . $file);
                } else {
                    copy($src . '/' . $file, $mod_file . '/' . $file);
                }
            }
        }
        closedir($dir);
    }
}
