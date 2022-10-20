<?php

declare(strict_types=1);

namespace GeoTrio\classes\geotrio\dto\components;

use GeoTrio\classes\geotrio\dto\abstract\AbstractSettableDto;
use GeoTrio\classes\geotrio\dto\traits\CommodityTypeTrait;
use GeoTrio\classes\geotrio\dto\traits\ValueAvailableTrait;

final class BillingModeDto extends AbstractSettableDto
{
    use CommodityTypeTrait;
    use ValueAvailableTrait;

    /**
     * @var string
     */
    protected string $billingMode;
}
