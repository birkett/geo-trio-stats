<?php

declare(strict_types=1);

namespace GeoTrio\classes\geotrio\dto\components;

use GeoTrio\classes\geotrio\dto\abstract\AbstractSettableDto;
use GeoTrio\classes\geotrio\dto\traits\CommodityTypeTrait;
use GeoTrio\classes\geotrio\dto\traits\ValueAvailableTrait;

final class BillToDateListDto extends AbstractSettableDto
{
    use CommodityTypeTrait;
    use ValueAvailableTrait;

    /**
     * @var float
     */
    protected float $billToDate;

    /**
     * @var int
     */
    protected int $validUTC;

    /**
     * @var int
     */
    protected int $startUTC;

    /**
     * @var int
     */
    protected int $duration;
}
