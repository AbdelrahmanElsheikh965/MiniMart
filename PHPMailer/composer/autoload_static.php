<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb824f794176eafa5a0978d9146a99bac
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitb824f794176eafa5a0978d9146a99bac::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb824f794176eafa5a0978d9146a99bac::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb824f794176eafa5a0978d9146a99bac::$classMap;

        }, null, ClassLoader::class);
    }
}
