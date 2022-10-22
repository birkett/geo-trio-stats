<?php

declare(strict_types=1);

namespace GeoTrioStats\classes\geoapi\dto\components;

use GeoTrioStats\classes\geoapi\dto\abstract\AbstractSettableDto;

final class SetPointDto extends AbstractSettableDto
{
    /**
     * @var int
     */
    protected int $temperatureSetPoint = 0;

    /**
     * @var int
     */
    protected int $timeOfChange = 0;
}
