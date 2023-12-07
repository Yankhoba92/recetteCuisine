<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb24733d0ce6cbfcc752effffa74b6505
{
    public static $prefixLengthsPsr4 = array (
        'Y' => 
        array (
            'Yankhoba\\RecetteCuisine\\' => 24,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Yankhoba\\RecetteCuisine\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb24733d0ce6cbfcc752effffa74b6505::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb24733d0ce6cbfcc752effffa74b6505::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb24733d0ce6cbfcc752effffa74b6505::$classMap;

        }, null, ClassLoader::class);
    }
}
