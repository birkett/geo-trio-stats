<?php

declare(strict_types=1);

namespace GeoTrio\classes;

final class EnvVarLoader
{
    /**
     * @param string $path
     *
     * @return void
     */
    public static function load(string $path): void
    {
        if (!is_readable($path)) {
            return;
        }

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            if (str_starts_with(trim($line), '#')) {
                continue;
            }

            [$name, $value] = explode('=', $line, 2);

            $name = trim($name);
            $value = trim($value);

            putenv(sprintf('%s=%s', $name, $value));
        }
    }
}
