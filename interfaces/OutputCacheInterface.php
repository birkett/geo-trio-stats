<?php

declare(strict_types=1);

namespace GeoTrio\interfaces;

interface OutputCacheInterface
{
    public const DEFAULT_CACHE_TIME = self::CACHE_TIME_24_HOURS;

    public const CACHE_TIME_24_HOURS = '+24 hour';

    /**
     * @param string $key
     *
     * @return string|null
     */
    public function get(string $key): ?string;

    /**
     * @param string $key
     * @param string $value
     * @param string $expiryTime
     *
     * @return void
     */
    public function set(string $key, string $value, string $expiryTime): void;
}
