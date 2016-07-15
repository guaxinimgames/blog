<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite49b043eb3c054526b522931683d78a9
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Curl\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Curl\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-curl-class/php-curl-class/src/Curl',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite49b043eb3c054526b522931683d78a9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite49b043eb3c054526b522931683d78a9::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}