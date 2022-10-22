<?php

declare(strict_types=1);

namespace GeoTrio\classes\geoapi\dto\components;

use GeoTrio\classes\geoapi\dto\abstract\AbstractSettableDto;
use GeoTrio\classes\geoapi\dto\enum\CommodityType;
use GeoTrio\classes\geoapi\dto\traits\ValueAvailableTrait;

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
