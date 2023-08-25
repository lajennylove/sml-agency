<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitfd5ad0d351a4af192f6644e23af22422
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

        spl_autoload_register(array('ComposerAutoloaderInitfd5ad0d351a4af192f6644e23af22422', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitfd5ad0d351a4af192f6644e23af22422', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitfd5ad0d351a4af192f6644e23af22422::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}