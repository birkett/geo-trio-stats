<?php

declare(strict_types=1);

namespace GeoTrioStats\classes\geoapi\dto\components;

use GeoTrioStats\classes\geoapi\dto\abstract\AbstractSettableDto;
use GeoTrioStats\classes\geoapi\dto\traits\CommodityTypeTrait;

final class SupplyStatusDto extends AbstractSettableDto
{
    use CommodityTypeTrait;

    public const SUPPLY_STATUS_ON = 'SUPPLYON';

    /**
     * @var string
     */
    protected string $supplyStatus = self::SUPPLY_STATUS_ON;
}
