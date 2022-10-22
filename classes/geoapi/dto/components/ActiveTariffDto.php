<?php

declare(strict_types=1);

namespace GeoTrio\classes\geoapi\dto\components;

use GeoTrio\classes\geoapi\dto\abstract\AbstractSettableDto;
use GeoTrio\classes\geoapi\dto\traits\CommodityTypeTrait;
use GeoTrio\classes\geoapi\dto\traits\ValueAvailableTrait;

final class ActiveTariffDto extends AbstractSettableDto
{
    use CommodityTypeTrait;
    use ValueAvailableTrait;

    /**
     * @var int
     */
    protected int $nextTariffStartTime = 0;

    /**
     * @var float
     */
    protected float $activeTariffPrice = 0.0;

    /**
     * @var float
     */
    protected float $nextTariffPrice = 0.0;

    /**
     * @var bool
     */
    protected bool $nextPriceAvailable = false;
}
