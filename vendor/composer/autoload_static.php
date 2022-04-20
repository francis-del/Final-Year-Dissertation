<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdbb55aaa047eade5c7af4070520ad14c
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Component\\Intl\\' => 23,
        ),
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Component\\Intl\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/intl',
        ),
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitdbb55aaa047eade5c7af4070520ad14c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdbb55aaa047eade5c7af4070520ad14c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitdbb55aaa047eade5c7af4070520ad14c::$classMap;

        }, null, ClassLoader::class);
    }
}
