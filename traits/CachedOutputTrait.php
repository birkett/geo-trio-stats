<?php

declare(strict_types=1);

namespace GeoTrio\traits;

use GeoTrio\interfaces\OutputCacheInterface;

trait CachedOutputTrait
{
    /**
     * @var int
     */
    private int $cacheTime = OutputCacheInterface::DEFAULT_CACHE_TIME;

    /**
     * @var OutputCacheInterface|null
     */
    private ?OutputCacheInterface $outputCache;

    /**
     * @var bool
     */
    private bool $useOutputCache = true;

    /**
     * @param OutputCacheInterface $outputCache
     *
     * @return void
     */
    protected function setOutputCache(OutputCacheInterface $outputCache): void
    {
        $this->outputCache = $outputCache;
    }

    /**
     * @return int
     */
    protected function getCacheTime(): int
    {
        return $this->cacheTime;
    }

    /**
     * @param int $cacheTimeSeconds
     *
     * @return void
     */
    protected function setCacheTime(int $cacheTimeSeconds): void
    {
        $this->cacheTime = $cacheTimeSeconds;
    }

    /**
     * @param string $key
     *
     * @return string|null
     */
    protected function cacheGet(string $key): ?string
    {
        return $this->useOutputCache && $this->outputCache instanceof OutputCacheInterface
            ? $this->outputCache->get($key)
            : null;
    }

    /**
     * @param string $key
     * @param string $value
     *
     * @return void
     */
    protected function cacheSet(string $key, string $value): void
    {
        if ($this->useOutputCache && $this->outputCache instanceof OutputCacheInterface) {
            $this->outputCache->set($key, $value, $this->cacheTime);
        }
    }
}
