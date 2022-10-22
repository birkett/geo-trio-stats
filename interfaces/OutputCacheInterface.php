<?php

declare(strict_types=1);

namespace GeoTrio\interfaces;

interface OutputCacheInterface
{
    public const DEFAULT_CACHE_TIME = self::CACHE_TIME_30_SECONDS;

    public const CACHE_TIME_30_SECONDS = 30;
    public const CACHE_TIME_1_HOUR = 3600;

    /**
     * @param string $key
     *
     * @return string|null
     */
    public function get(string $key): ?string;

    /**
     * @param string $key
     * @param string $value
     * @param int $cacheTimeSeconds
     *
     * @return void
     */
    public function set(string $key, string $value, int $cacheTimeSeconds): void;
}
