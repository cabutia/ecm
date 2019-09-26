<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit594acfb31e9d7a0f51b4e62422ef3c2d
{
    public static $prefixLengthsPsr4 = array (
        'E' => 
        array (
            'Ecm\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Ecm\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit594acfb31e9d7a0f51b4e62422ef3c2d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit594acfb31e9d7a0f51b4e62422ef3c2d::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}