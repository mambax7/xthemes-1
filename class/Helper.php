<?php

namespace XoopsModules\Xthemes;


/**
 * Created by PhpStorm.
 * User: 01096446383
 * Date: 21/01/2019
 * Time: 09:51
 */
class Helper extends \Xmf\Module\Helper
{
    public $debug;

    /**
     * Helper constructor.
     * @param bool $debug
     */
    public function __construct($debug = false)
    {
        $this->debug = $debug;
        $moduleDirName = basename(dirname(__DIR__));
        parent::__construct($moduleDirName);
    }

    /**
     * @param bool $debug
     *
     * @return \XoopsModules\Xthemes\Helper
     */
    public static function getInstance($debug = false)
    {
        static $instance;
        if (null === $instance) {
            $instance = new static($debug);
        }

        return $instance;
    }

    /**
     * @return string
     */
    public function getDirname()
    {
        return $this->dirname;
    }

    /**
     * Get an Object Handler
     *
     * @param string $name name of handler to load
     *
     * @return bool|\XoopsObjectHandler|\XoopsPersistableObjectHandler
     */
    public function getHandler($name)
    {
        $ret   = false;

        $class = '\\XoopsModules\\' . ucfirst(mb_strtolower(basename(dirname(__DIR__)))) . '\\' . $name . 'Handler';
        if (!class_exists($class)) {
            throw new \RuntimeException("Class '$class' not found");
        }
        /** @var \XoopsMySQLDatabase $db */
        $db     = \XoopsDatabaseFactory::getDatabaseConnection();
        $helper = self::getInstance();
        $ret    = new $class($db, $helper);
        $this->addLog("Getting handler '{$name}'");
        return $ret;
    }
}
