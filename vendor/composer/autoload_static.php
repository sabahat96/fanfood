<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd5690862bea11e7593fe1335893c6111
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd5690862bea11e7593fe1335893c6111::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd5690862bea11e7593fe1335893c6111::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}