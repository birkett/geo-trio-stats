<?php

declare(strict_types=1);

namespace GeoTrioStats\classes\geoapi\dto\components;

use GeoTrioStats\classes\geoapi\dto\abstract\AbstractSettableDto;
use GeoTrioStats\classes\geoapi\dto\traits\CommodityTypeTrait;
use GeoTrioStats\classes\geoapi\dto\traits\ValueAvailableTrait;

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
