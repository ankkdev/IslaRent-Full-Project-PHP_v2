<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit9253bf47ac90f2d482ea211cc5ed3d2c
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit9253bf47ac90f2d482ea211cc5ed3d2c', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit9253bf47ac90f2d482ea211cc5ed3d2c', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit9253bf47ac90f2d482ea211cc5ed3d2c::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
