<?php

declare(strict_types=1);

namespace GeoTrio\classes\geotrio\dto\interfaces;

interface TtlTraitInterface
{
    /**
     * @return int
     */
    public function getTtl(): int;

    /**
     * @return bool
     */
    public function hasValidTtl(): bool;
}
