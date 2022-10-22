<?php

declare(strict_types=1);

namespace GeoTrio\classes\geoapi\dto\components;

use GeoTrio\classes\geoapi\dto\abstract\AbstractSettableDto;
use GeoTrio\classes\geoapi\dto\traits\CommodityTypeTrait;
use GeoTrio\classes\geoapi\dto\traits\ValueAvailableTrait;

final class SeasonalAdjustmentDto extends AbstractSettableDto
{
    use CommodityTypeTrait;
    use ValueAvailableTrait;

    /**
     * @var bool
     */
    protected bool $adjustment = false;

    /**
     * @var int
     */
    protected int $timeOfChange = 0;
}
