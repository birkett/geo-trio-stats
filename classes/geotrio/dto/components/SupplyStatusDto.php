<?php

declare(strict_types=1);

namespace GeoTrio\classes\geotrio\dto\components;

use GeoTrio\classes\geotrio\dto\abstract\AbstractSettableDto;
use GeoTrio\classes\geotrio\dto\traits\CommodityTypeTrait;

final class SupplyStatusDto extends AbstractSettableDto
{
    use CommodityTypeTrait;

    /**
     * @var string
     */
    protected string $supplyStatus;
}
