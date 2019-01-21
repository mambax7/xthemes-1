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

class XthemesConfig {
	public $name;
	public $paths = [];
	public $uploadFolders = [];
	public $copyBlankFiles = [];
	public $copyTestFolders = [];
	public $templateFolders = [];
	public $oldFiles = [];
	public $oldFolders = [];
	public $renameTables = [];
	public $modCopyright;

	public function __construct() {
		$xthemes_dir       = dirname( __DIR__ );
		$xthemes_dir_upper = strtoupper( $xthemes_dir );

		var_dump( $xthemes_dir );

		require_once $xthemes_dir . '/include/config.php';
		$config = xthemes_config();

		$this->name            = $config->name;
		$this->paths           = $config->paths;
		$this->uploadFolders   = $config->uploadFolders;
		$this->copyBlankFiles  = $config->copyBlankFiles;
		$this->copyTestFolders = $config->copyTestFolders;
		$this->templateFolders = $config->templateFolders;
		$this->oldFiles        = $config->oldFiles;
		$this->oldFolders      = $config->oldFolders;
		$this->renameTables    = $config->renameTables;
		$this->modCopyright    = $config->modCopyright;
	}
}