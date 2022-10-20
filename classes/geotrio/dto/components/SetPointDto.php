<?php

declare(strict_types=1);

namespace GeoTrio\classes\geotrio\dto\components;

use GeoTrio\classes\geotrio\dto\abstract\AbstractSettableDto;

final class SetPointDto extends AbstractSettableDto
{
    /**
     * @var int
     */
    protected int $temperatureSetPoint;

    /**
     * @var int
     */
    protected int $timeOfChange;
}
