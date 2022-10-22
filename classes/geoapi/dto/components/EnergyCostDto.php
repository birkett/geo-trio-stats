<?php

declare(strict_types=1);

namespace GeoTrioStats\classes\geoapi\dto\components;

use GeoTrioStats\classes\geoapi\dto\abstract\AbstractSettableDto;
use GeoTrioStats\classes\geoapi\dto\traits\CommodityTypeTrait;

final class EnergyCostDto extends AbstractSettableDto
{
    use CommodityTypeTrait;

    public const DURATION_DAY = 'DAY';
    public const DURATION_WEEK = 'WEEK';
    public const DURATION_MONTH = 'MONTH';

    /**
     * @var string
     */
    protected string $duration = self::DURATION_DAY;

    /**
     * @var int
     */
    protected int $period = 0;

    /**
     * @var float
     */
    protected float $costAmount = 0.0;

    /**
     * @var float
     */
    protected float $energyAmount = 0.0;
}
