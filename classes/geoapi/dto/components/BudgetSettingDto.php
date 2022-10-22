<?php

declare(strict_types=1);

namespace GeoTrioStats\classes\geoapi\dto\components;

use GeoTrioStats\classes\geoapi\dto\abstract\AbstractSettableDto;
use GeoTrioStats\classes\geoapi\dto\traits\CommodityTypeTrait;
use GeoTrioStats\classes\geoapi\dto\traits\ValueAvailableTrait;

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
