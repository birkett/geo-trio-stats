<?php

declare(strict_types=1);

namespace GeoTrioStats\classes;

use RuntimeException;

final class Autoloader
{
    /**
     * Autoloader for classes, controllers and models.
     *
     * @throws RuntimeException Standard exception if the class is not found.
     */
    public static function init(array $namespaces): void
    {
        $autoLoadFn = static function (string $class) use ($namespaces) {
            $found = false;
            $baseDir = '';
            $classLen = 0;

            foreach ($namespaces as $prefix => $path) {
                $len = strlen($prefix);

                if (strncmp($prefix, $class, $len) === 0) {
                    $found = true;
                    $baseDir = $path;
                    $classLen = $len;
                }
            }

            // Namespace is not registered.
            if (!$found) {
                return;
            }

            $relativeClass = substr($class, $classLen);

            $endPath = str_replace('\\', '/', $relativeClass) . '.php';
            $file = $baseDir . $endPath;

            if (file_exists($file)) {
                include $file;

                return;
            }

            throw new RuntimeException('Class ' . $class . ' not found.');
        };

        spl_autoload_register($autoLoadFn);
    }
}
