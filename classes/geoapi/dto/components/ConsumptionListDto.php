<?php

declare(strict_types=1);

namespace GeoTrioStats\classes\geoapi\dto\components;

use GeoTrioStats\classes\geoapi\dto\abstract\AbstractSettableDto;
use GeoTrioStats\classes\geoapi\dto\traits\CommodityTypeTrait;
use GeoTrioStats\classes\geoapi\dto\traits\ValueAvailableTrait;

final class ConsumptionListDto extends AbstractSettableDto
{
    use CommodityTypeTrait;
    use ValueAvailableTrait;

    /**
     * @var int
     */
    protected int $readingTime = 0;

    /**
     * @var float
     */
    protected float $totalConsumption = 0.0;
}
