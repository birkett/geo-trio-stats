<?php

declare(strict_types=1);

namespace GeoTrio\classes\geotrio\dto\components;

use GeoTrio\classes\geotrio\dto\abstract\AbstractSettableDto;
use GeoTrio\classes\geotrio\dto\traits\CommodityTypeTrait;
use GeoTrio\classes\geotrio\dto\traits\ValueAvailableTrait;

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
