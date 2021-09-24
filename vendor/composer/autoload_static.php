<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6b27dfd99c24448f6b25828d196625dc
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6b27dfd99c24448f6b25828d196625dc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6b27dfd99c24448f6b25828d196625dc::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6b27dfd99c24448f6b25828d196625dc::$classMap;

        }, null, ClassLoader::class);
    }
}
