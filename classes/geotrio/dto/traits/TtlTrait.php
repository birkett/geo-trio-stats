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
     * @return string
     */
    public function getTtlAsTimeString(): string
    {
        return sprintf('+%d seconds', $this->getTtl());
    }

    /**
     * @return bool
     */
    public function hasValidTtl(): bool
    {
        return $this->ttl > 0;
    }
}
