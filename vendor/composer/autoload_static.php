<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd1b455aa63ed1daf64b7e85e2839a26e
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInitd1b455aa63ed1daf64b7e85e2839a26e::$classMap;

        }, null, ClassLoader::class);
    }
}
