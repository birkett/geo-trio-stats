<?php

declare(strict_types=1);

namespace GeoTrioStats\classes\geoapi\dto\traits;

use GeoTrioStats\classes\geoapi\dto\enum\CommodityType;

trait CommodityTypeTrait
{
    protected string $commodityType = CommodityType::COMMODITY_TYPE_ELECTRICITY;
}
