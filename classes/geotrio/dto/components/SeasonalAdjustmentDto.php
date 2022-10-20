<?php

declare(strict_types=1);

namespace GeoTrio\classes\geotrio\dto\components;

use GeoTrio\classes\geotrio\dto\abstract\AbstractSettableDto;
use GeoTrio\classes\geotrio\dto\traits\CommodityTypeTrait;
use GeoTrio\classes\geotrio\dto\traits\ValueAvailableTrait;

final class SeasonalAdjustmentDto extends AbstractSettableDto
{
    use CommodityTypeTrait;
    use ValueAvailableTrait;

    /**
     * @var bool
     */
    protected bool $adjustment;

    /**
     * @var int
     */
    protected int $timeOfChange;
}
