<?php

declare(strict_types=1);

namespace GeoTrio\classes\geotrio\dto\traits;

use GeoTrio\classes\geotrio\dto\enum\CommodityType;

trait CommodityTypeTrait
{
    protected string $commodityType = CommodityType::COMMODITY_TYPE_ELECTRICITY;
}
