<?php

declare(strict_types=1);

namespace GeoTrio\classes\geoapi\dto\traits;

use GeoTrio\classes\geoapi\dto\enum\CommodityType;

trait CommodityTypeTrait
{
    protected string $commodityType = CommodityType::COMMODITY_TYPE_ELECTRICITY;
}
