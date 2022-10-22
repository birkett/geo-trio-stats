<?php

declare(strict_types=1);

namespace GeoTrio\classes\geotrio\dto\traits;

trait TtlTrait
{
    /**
     * @var int
     */
    protected int $ttl = 0;

    /**
     * @return int
     */
    public function getTtl(): int
    {
        return $this->ttl;
    }

    /**
     * @return bool
     */
    public function hasValidTtl(): bool
    {
        return $this->ttl > 0;
    }
}
