<?php

declare(strict_types=1);

namespace GeoTrio\classes\geoapi\dto\components;

use GeoTrio\classes\geoapi\dto\abstract\AbstractSettableDto;
use GeoTrio\classes\geoapi\dto\traits\CommodityTypeTrait;
use GeoTrio\classes\geoapi\dto\traits\ValueAvailableTrait;

final class BillToDateListDto extends AbstractSettableDto
{
    use CommodityTypeTrait;
    use ValueAvailableTrait;

    /**
     * @var float
     */
    protected float $billToDate = 0.0;

    /**
     * @var int
     */
    protected int $validUTC = 0;

    /**
     * @var int
     */
    protected int $startUTC = 0;

    /**
     * @var int
     */
    protected int $duration = 0;
}
