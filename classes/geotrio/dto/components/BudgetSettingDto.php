<?php

declare(strict_types=1);

namespace GeoTrio\classes\geotrio\dto\components;

use GeoTrio\classes\geotrio\dto\abstract\AbstractSettableDto;
use GeoTrio\classes\geotrio\dto\traits\CommodityTypeTrait;
use GeoTrio\classes\geotrio\dto\traits\ValueAvailableTrait;

final class BudgetSettingDto extends AbstractSettableDto
{
    use CommodityTypeTrait;
    use ValueAvailableTrait;

    /**
     * @var float
     */
    protected float $energyAmount = 0.0;

    /**
     * @var float
     */
    protected float $costAmount = 0.0;

    /**
     * @var int
     */
    protected int $budgetToC = 0;
}
