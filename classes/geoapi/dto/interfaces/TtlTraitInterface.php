<?php

declare(strict_types=1);

namespace GeoTrioStats\classes\geoapi\dto\interfaces;

interface TtlTraitInterface
{
    /**
     * @return int
     */
    public function getTtl(): int;
}
