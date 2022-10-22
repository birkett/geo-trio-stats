<?php

declare(strict_types=1);

namespace GeoTrio\classes\geoapi\dto\components;

use GeoTrio\classes\geoapi\dto\abstract\AbstractSettableDto;
use GeoTrio\classes\geoapi\dto\traits\CommodityTypeTrait;
use GeoTrio\classes\geoapi\dto\traits\ValueAvailableTrait;

final class BudgetRagStatusDto extends AbstractSettableDto
{
    use CommodityTypeTrait;
    use ValueAvailableTrait;

    public const STATUS_UNKNOWN = 'UNKNOWN';

    /**
     * @var string
     */
    protected string $currDay = self::STATUS_UNKNOWN;

    /**
     * @var string
     */
    protected string $yesterDay = self::STATUS_UNKNOWN;

    /**
     * @var string
     */
    protected string $currWeek = self::STATUS_UNKNOWN;

    /**
     * @var string
     */
    protected string $lastWeek = self::STATUS_UNKNOWN;

    /**
     * @var string
     */
    protected string $currMth = self::STATUS_UNKNOWN;

    /**
     * @var string
     */
    protected string $lastMth = self::STATUS_UNKNOWN;

    /**
     * @var string
     */
    protected string $thisYear = self::STATUS_UNKNOWN;
}
