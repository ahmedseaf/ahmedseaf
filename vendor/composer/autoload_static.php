<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite94a9ee4ae071b3c099657d9999bc560
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'Whoops\\' => 7,
        ),
        'S' => 
        array (
            'System\\' => 7,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Whoops\\' => 
        array (
            0 => __DIR__ . '/..' . '/filp/whoops/src/Whoops',
        ),
        'System\\' => 
        array (
            0 => __DIR__ . '/..' . '/System',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite94a9ee4ae071b3c099657d9999bc560::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite94a9ee4ae071b3c099657d9999bc560::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
