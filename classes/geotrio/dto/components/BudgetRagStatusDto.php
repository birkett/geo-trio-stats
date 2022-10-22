<?php

declare(strict_types=1);

namespace GeoTrio\classes\geotrio\dto\components;

use GeoTrio\classes\geotrio\dto\abstract\AbstractSettableDto;
use GeoTrio\classes\geotrio\dto\traits\CommodityTypeTrait;
use GeoTrio\classes\geotrio\dto\traits\ValueAvailableTrait;

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
