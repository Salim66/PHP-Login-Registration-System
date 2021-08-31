<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit907b3ffbbd9068e1371411740ef0ee7f
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit907b3ffbbd9068e1371411740ef0ee7f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit907b3ffbbd9068e1371411740ef0ee7f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit907b3ffbbd9068e1371411740ef0ee7f::$classMap;

        }, null, ClassLoader::class);
    }
}
