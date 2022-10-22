<?php

declare(strict_types=1);

namespace GeoTrio\classes\geoapi\dto\components;

use GeoTrio\classes\geoapi\dto\abstract\AbstractSettableDto;
use GeoTrio\classes\geoapi\dto\traits\CommodityTypeTrait;
use GeoTrio\classes\geoapi\dto\traits\ValueAvailableTrait;

final class BillingModeDto extends AbstractSettableDto
{
    use CommodityTypeTrait;
    use ValueAvailableTrait;

    public const BILLING_MODE_CREDIT = 'CREDIT';

    /**
     * @var string
     */
    protected string $billingMode = self::BILLING_MODE_CREDIT;
}
