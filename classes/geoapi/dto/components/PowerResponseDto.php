<?php

declare(strict_types=1);

namespace GeoTrioStats\classes\geoapi\dto\components;

use GeoTrioStats\classes\geoapi\dto\abstract\AbstractSettableDto;
use GeoTrioStats\classes\geoapi\dto\enum\CommodityType;
use GeoTrioStats\classes\geoapi\dto\traits\ValueAvailableTrait;

final class PowerResponseDto extends AbstractSettableDto
{
    use ValueAvailableTrait;

    /**
     * @var string
     */
    protected string $type = CommodityType::COMMODITY_TYPE_ELECTRICITY;

    /**
     * @var int
     */
    protected int $watts = 0;
}
