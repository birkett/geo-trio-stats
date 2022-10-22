<?php

declare(strict_types=1);

namespace GeoTrio\classes\geotrio\dto\components;

use GeoTrio\classes\geotrio\dto\abstract\AbstractSettableDto;
use GeoTrio\classes\geotrio\dto\enum\CommodityType;
use GeoTrio\classes\geotrio\dto\traits\ValueAvailableTrait;

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
