<?php

declare(strict_types=1);

namespace GeoTrio\classes\geotrio\dto\components;

use GeoTrio\classes\geotrio\dto\abstract\AbstractSettableDto;
use GeoTrio\classes\geotrio\dto\traits\CommodityTypeTrait;

final class EnergyCostDto extends AbstractSettableDto
{
    use CommodityTypeTrait;

    /**
     * @var string
     */
    protected string $duration;

    /**
     * @var int
     */
    protected int $period;

    /**
     * @var float
     */
    protected float $costAmount;

    /**
     * @var float
     */
    protected float $energyAmount;
}
