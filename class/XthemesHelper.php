<?php
/**
 * Created by PhpStorm.
 * User: 01096446383
 * Date: 21/01/2019
 * Time: 09:51
 */

class XthemesHelper extends \Xmf\Module\Helper {
	public $debug;

	protected function __construct( $debug ) {
		$this->debug   = $debug;
		$moduleDirName = basename( dirname( __DIR__ ) );
		parent::__construct( $moduleDirName );
	}

	public static function getInstance( $debug = false ) {
		static $instance;
		if ( null === $instance ) {
			$instance = new static( $debug );
		}

		return $instance;
	}

	public function getDirname() {
		return $this->dirname;
	}

	/**
	 * Get an Object Handler
	 *
	 * @param string $name name of handler to load
	 *
	 * @return bool|\XoopsObjectHandler|\XoopsPersistableObjectHandler
	 */
	public function getHandler( $name ) {
		$ret   = false;
		$db    = \XoopsDatabaseFactory::getDatabaseConnection();
		$class = '\\XoopsModules\\' . ucfirst( mb_strtolower( basename( dirname( __DIR__ ) ) ) ) . '\\' . $name . 'Handler';
		$ret   = new $class( $db );

		return $ret;
	}
}