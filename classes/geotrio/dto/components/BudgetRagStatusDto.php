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

    /**
     * @var string
     */
    protected string $currDay;

    /**
     * @var string
     */
    protected string $yesterDay;

    /**
     * @var string
     */
    protected string $currWeek;

    /**
     * @var string
     */
    protected string $lastWeek;

    /**
     * @var string
     */
    protected string $currMth;

    /**
     * @var string
     */
    protected string $lastMth;

    /**
     * @var string
     */
    protected string $thisYear;

}