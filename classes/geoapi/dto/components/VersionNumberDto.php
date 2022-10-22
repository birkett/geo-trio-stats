<?php

declare(strict_types=1);

namespace GeoTrioStats\classes\geoapi\dto\components;

use GeoTrioStats\classes\geoapi\dto\abstract\AbstractSettableDto;

final class VersionNumberDto extends AbstractSettableDto
{
    /**
     * @var int
     */
    protected int $major = 0;

    /**
     * @var int
     */
    protected int $minor = 0;
}
