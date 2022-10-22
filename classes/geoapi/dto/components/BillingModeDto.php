<?php

declare(strict_types=1);

namespace GeoTrioStats\classes\geoapi\dto\components;

use GeoTrioStats\classes\geoapi\dto\abstract\AbstractSettableDto;
use GeoTrioStats\classes\geoapi\dto\traits\CommodityTypeTrait;
use GeoTrioStats\classes\geoapi\dto\traits\ValueAvailableTrait;

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
